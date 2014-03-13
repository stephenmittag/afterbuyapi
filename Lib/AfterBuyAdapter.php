<?php

namespace Wk\AfterBuyBundle\Lib;

/**
 * Class AfterBuyAdapter
 */
class AfterBuyAdapter
{

    /**
     * Parse the response from AfterBuy and sets it to the response attribute
     * @param string $xmlResponse
     *
     * @return array
     */
    public function getResponse ($xmlResponse)
    {

        $dom = new \DOMDocument();
        try {
            $dom->loadXML($xmlResponse);
            if (($dom->getElementsByTagName('success')->length > 0) && $dom->getElementsByTagName('success')->item(0)->nodeValue) {
                return array(
                    'success' => true,
                    'message' => 'success',
                );
            } else {
                $error = ($dom->getElementsByTagName('error')->length > 0) ? $dom->getElementsByTagName('error')->item(0)->nodeValue : "";

                return array(
                    'success' => false,
                    'message' => $error,
                );
            }
        } catch (Exception $ex) {
            return array(
                'success' => false,
                'message' => $ex->getMessage(),
            );
        }
    }

    /**
     * Method for parsing the content from shopify and transforms it for the fields afterbuy needs
     * @param array $order
     *
     * @return array
     */
    public function parseOrder(array $order)
    {
        // associative array with countries and their AfterBuy's codes
        $countries = array(
            'Germany' => 'D',
            'Austria' => 'A',
            'Poland' => 'PL',
            'United States' => 'US',
        );

        $result = array();
        $name = '';

        $result['VID'] = $order['order_number'];
        $result['Kbenutzername'] = $order['email'];
        $result['Kemail'] = $order['email'];
        $result['NoFeedback'] = 2;

        // billing info
        if (isset($order['billing_address'])) {
            $result['KVorname'] = empty($order['billing_address']['first_name']) ? "-" : html_entity_decode($order['billing_address']['first_name']);
            $result['KNachname'] = empty($order['billing_address']['last_name']) ? "-" : html_entity_decode($order['billing_address']['last_name']);
            $result['KFirma'] = html_entity_decode($order['billing_address']['company']);
            $result['KStrasse'] = html_entity_decode($order['billing_address']['address1']);
            $result['KStrasse2'] = html_entity_decode($order['billing_address']['address2']);
            $result['KPLZ'] = html_entity_decode($order['billing_address']['zip']);
            $result['KOrt'] = html_entity_decode($order['billing_address']['city']);
            $result['KLand'] = $countries[$order['billing_address']['country']];
            $result['Versandart'] = "DHL_Paket_".$order['billing_address']['country_code'];
            $result['Ktelefon'] = html_entity_decode($order['billing_address']['phone']);

            $name = html_entity_decode($order['billing_address']['name']);
        }
        // shipping info
        if (isset($order['shipping_address'])) {
            if ($order['shipping_address']['address1'] != $result['KStrasse'] || $order['shipping_address']['name'] != $name) {
                $result['Lieferanschrift'] = 1;
                $result['KLVorname'] = empty($order['shipping_address']['first_name']) ? "-" : html_entity_decode($order['shipping_address']['first_name']);
                $result['KLNachname'] = empty($order['shipping_address']['last_name']) ? "-" : html_entity_decode($order['shipping_address']['last_name']);
                $result['KLFirma'] = html_entity_decode($order['shipping_address']['company']);
                $result['KLStrasse'] = html_entity_decode($order['shipping_address']['address1']);
                $result['KLStrasse2'] = html_entity_decode($order['shipping_address']['address2']);
                $result['KLPLZ'] = html_entity_decode($order['shipping_address']['zip']);
                $result['KLOrt'] = html_entity_decode($order['shipping_address']['city']);
                $result['KLLand'] = $countries[$order['shipping_address']['country']];
                $result['Versandart'] = 'DHL_Paket_'.$order['shipping_address']['country_code'];
                $result['KLTelefon'] = html_entity_decode($order['shipping_address']['phone']);
            }
        }
        // taxes
        foreach ($order['tax_lines'] as $tax) {
            $taxrate = $tax['rate'];
        }
        // delivery costs
        foreach ($order['shipping_lines'] as $costs) {
            $result['Versandkosten'] = number_format($costs['price'], 2, ',', '');
        }

        // tiems
        $i = 0;
        foreach ($order['line_items'] as $item) {
            $i++;
            $result['Artikelnr_'.$i] = $result['VID'];
            $result['Artikelname_'.$i] = html_entity_decode($item['name'].' '.$item['sku']);
            $result['ArtikelEPreis_'.$i] = number_format($item['price'], 2, ',', '');
            $result['ArtikelMenge_'.$i] = $item['quantity'];
            $result['ArtikelGewicht_'.$i] = number_format(($item['grams']/1000), 2, ',', '');
            if (strpos($item['sku'], '-M')) {
                $price = $item['price'];
                $result['ArtikelMwSt_'.$i] = number_format($taxrate*100, 2, ',', '');
            } else {
                $result['ArtikelMwSt_'.$i] = "0,00";
                $result['MwStNichtAusweisen'] = 1;
            }
        }

        $result['PosAnz'] = $i;

        // discounts
        foreach ($order['discount_codes'] as $discount) {
            $i++;
            if (isset($discount['amount'])) {
                $result['Artikelnr_'.$i] = $result['VID'];
                $result['Artikelname_'.$i] = "Gutschein ".$discount['code'];
                $result['ArtikelEPreis_'.$i] = "-".number_format($discount['amount'], 2, ',', '');
                $result['ArtikelMenge_'.$i] = 1;  // amount of articles
                $result['ArtikelGewicht_'.$i] = "0,00"; // weight
                $result['ArtikelMwSt_'.$i] = "0,00"; // sales tax
                $result['PosAnz'] = $i;
            }
        }

        // financial data
        switch($order['financial_status'])
        {
            case 'pending':
                if (strpos($order['gateway'], "Vorkasse") !== false) {
                    $result['ZFunktionsID'] = 1;
                    $result['Zahlart'] = 'Vorkasse';
                }
                break;
            case 'paid':
                if ($order['gateway'] == 'directebanking') {
                    $result['ZFunktionsID'] = 12;
                    $result['SetPay'] = 1;
                    $result['Zahlart'] = 'Sofortüberweisung';
                } elseif ($order['gateway'] == 'paypal') {
                    $result['ZFunktionsID'] = 5;
                    $result['SetPay'] = 1;
                    $result['Zahlart'] = 'PayPal';
                }
                break;
        }

        // afterbuy customer matching
        $result['Kundenerkennung'] = 1;
        $result['NoeBayNameAktu'] = 1;

        return $result;
    }

    /**
     * Build the xml string for getting the AfterBuy sold items
     * @param array $params
     *
     * @return string
     */
    public function buildAfterBuySoldItemsXmlString (array $params)
    {

        $xmlString = isset($params['allItem']) ? "<RequestAllItems>" . intval($params['allItem']) ."</RequestAllItems>" : "";
        $xmlString .= isset($params['maxSoldItems']) ? "<MaxSoldItems>" . intval($params['maxSoldItems']) ."</MaxSoldItems>" : "";

        if (!empty($params['filters'])) {

            $xmlString .= "<DataFilter>";

            foreach ($params['filters'] as $filter) {

                if ("date" === $filter['type']) {
                    $xmlString .= "<Filter>";
                    $xmlString .= "<FilterName>DateFilter</FilterName>";
                    $xmlString .= "<FilterValues>";
                    $xmlString .= "<DateFrom>" . $filter['from'] . "</DateFrom>";
                    $xmlString .= "<DateTo>" . $filter['to'] . "</DateTo>";
                    $xmlString .= "</FilterValues>";
                    $xmlString .= "</Filter>";

                } elseif ("default" === $filter['type']) {
                    $xmlString .= "<Filter>";
                    $xmlString .= "<FilterName>DefaultFilter</FilterName>";
                    $xmlString .= "<FilterValues>";
                    $xmlString .= "<FilterValue>" . $filter['name'] . "</FilterValue>";
                    $xmlString .= "</FilterValues>";
                    $xmlString .= "</Filter>";

                } elseif ("order" === $filter['type']) {
                    $xmlString .= "<Filter>";
                    $xmlString .= "<FilterName>OrderID</FilterName>";
                    $xmlString .= "<FilterValues>";
                    $xmlString .= "<FilterValue>" . $filter['id'] . "</FilterValue>";
                    $xmlString .= "</FilterValues>";
                    $xmlString .= "</Filter>";
                }
            }

            $xmlString .= "</DataFilter>";
        }

        return $xmlString;
    }

    /**
     * Build the xml string for updating the AfterBuy sold items
     * @param array $params
     *
     * @return string
     */
    public function buildUpdateAfterBuySoldItemsXmlString (array $params)
    {

        $xmlString = "<Orders><Order>";
        $xmlString .= "<OrderID>" . $params['orderId'] ."</OrderID>";
        $xmlString .= "<ItemID>" . $params['itemId'] ."</ItemID>";

        foreach ($params['fields'] as $field) {
            foreach ($field as $key => $value) {
                $xmlString .= "<" . ucfirst($key) . "><![CDATA[" . $value ."]]></" . ucfirst($key) . ">";
            }
        }

        $xmlString .= "</Order></Orders>";

        return $xmlString;
    }

} 