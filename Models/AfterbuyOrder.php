<?php

namespace Wk\AfterbuyApi\Models;

use Symfony\Component\Yaml\Yaml;
use Wk\AfterbuyApi\Models\Base\BaseAfterbuyOrder;

/**
 * Class Item
 */
class AfterbuyOrder extends BaseAfterbuyOrder
{
    const PAYMENT_PAYPAL = 'paypal';
    const PAYMENT_DIRECTEBANKING = 'directebanking';
    const PAYMENT_TRANSFER = 'transfer';

    /**
     * @var array
     */
    private $countries = array();

    /**
     * @var array
     */
    private $payments = array();

    /**
     * @param Article $article
     */
    public function addArticle($article)
    {
        $this->articles[] = $article;
    }

    /**
     * @param float $number
     *
     * @return string
     */
    private function formatNumber($number)
    {
        return number_format($number, 2, ',', '');
    }

    /**
     * read config values
     *
     * @throws \Exception
     */
    private function readConfig()
    {
        $configFile = __DIR__ . '/../Resources/config/afterbuy.yml';

        if (!file_exists($configFile)) {
            throw new \Exception('Config file does not exist');
        }

        $config = Yaml::parse(file_get_contents($configFile));

        $this->setCountries(isset($config['countries']) ? $config['countries'] : array());
        $this->setPayments(isset($config['payments']) ? $config['payments'] : array());
    }

    /**
     * @return array
     */
    public function getCountries()
    {
        return $this->countries;
    }

    /**
     * @param array $countries
     */
    public function setCountries($countries)
    {
        $this->countries = $countries;
    }

    /**
     * @return array
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param array $payments
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $this->readConfig();

        $data = array();

        $data['VID'] = $this->id;
        $data['CheckVID'] = $this->checkId ? 1 : 0;
        $data['BuyDate'] = $this->buyDate->format('d.m.Y H:i:s');
        $data['Kbenutzername'] = $this->customerUsername;
        $data['Kemail'] = $this->customerEmail;
        $data['NoFeedback'] = $this->noFeedback;
        $data['Kundenerkennung'] = $this->customerRecognition;
        $data['NoeBayNameAktu'] = $this->noEbayNameUpdate;
        $data['MarkierungID'] = $this->markerId;
        $data['Versandkosten'] = $this->formatNumber($this->shippingCost);
        $data['Versandart'] = $this->shippingMethod;
        $data['PosAnz'] = sizeof($this->articles);
        $data['SetPay'] = $this->paid ? 1 : 0;
        $data['Kommentar'] = $this->comment;

        if (isset($this->payments[$this->paymentMethod])) {
            $data['ZFunktionsID'] = $this->payments[$this->paymentMethod]['id'];
            $data['Zahlart'] = $this->payments[$this->paymentMethod]['name'];
        }

        if ($this->billingAddress) {
            $data['KVorname'] = $this->billingAddress->getFirstName();
            $data['KNachname'] = $this->billingAddress->getLastName();
            $data['KFirma'] = $this->billingAddress->getCompany();
            $data['KStrasse'] = $this->billingAddress->getStreet();
            $data['KStrasse2'] = $this->billingAddress->getStreet2();
            $data['KPLZ'] = $this->billingAddress->getZipCode();
            $data['KOrt'] = $this->billingAddress->getCity();
            $data['KLand'] = isset($this->countries[$this->billingAddress->getCountry()])
                ? $this->countries[$this->billingAddress->getCountry()]
                : '';
            $data['Ktelefon'] = $this->billingAddress->getPhone();
        }

        if ($this->shippingAddress) {
            $data['Lieferanschrift'] = 1;
            $data['KLVorname'] = $this->shippingAddress->getFirstName();
            $data['KLNachname'] = $this->shippingAddress->getLastName();
            $data['KLFirma'] = $this->shippingAddress->getCompany();
            $data['KLStrasse'] = $this->shippingAddress->getStreet();
            $data['KLStrasse2'] = $this->shippingAddress->getStreet2();
            $data['KLPLZ'] = $this->shippingAddress->getZipCode();
            $data['KLOrt'] = $this->shippingAddress->getCity();
            $data['KLLand'] = isset($this->countries[$this->shippingAddress->getCountry()])
                ? $this->countries[$this->shippingAddress->getCountry()]
                : '';
            $data['KLTelefon'] = $this->shippingAddress->getPhone();
        }

        $taxable = false;
        foreach ($this->articles as $i => $article) {
            $data['Artikelnr_' . ($i + 1)] = $article->getId();
            $data['Artikelname_' . ($i + 1)] = html_entity_decode($article->getName());
            $data['ArtikelEPreis_' . ($i + 1)] = $this->formatNumber($article->getPrice());
            $data['ArtikelMenge_' . ($i + 1)] = $article->getQuantity();
            $data['ArtikelGewicht_' . ($i + 1)] = $this->formatNumber($article->getWeight() / 1000);
            $data['AlternArtikelNr1_' . ($i + 1)] = $article->getAlternativeId1();
            $data['AlternArtikelNr2_' . ($i + 1)] = $article->getAlternativeId2();
            $data['ArtikelMwSt_' . ($i + 1)] = $this->formatNumber($article->getTax());
            $taxable = $article->getTax() ? true : false;
        }

        $data['MwStNichtAusweisen'] = $taxable ? 0 : 1;

        return $data;
    }
}