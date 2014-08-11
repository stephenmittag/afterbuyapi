<?php

namespace Wk\AfterbuyApi\Services;

use Monolog\Logger;
use Wk\AfterbuyApi\Models\AfterbuyOrder;

/**
 * Class AfterbuyShopApi
 */
class AfterbuyShopApi
{
    /** @var AfterbuyConnection $afterbuyConnection */
    private $afterbuyConnection;

    /** @var \Monolog\Logger */
    private $logger;

    /**
     * List of error messages that are OK to accept the response from Afterbuy
     */
    private $errorMessagesOk = array(
        'Diese Bestellung wurde bereits erfasst.',
        'Diese Bestellung wurde bereits erfasst, oder wird gerade bearbeitet.',
    ); // TODO move to config

    /**
     * @param Logger $logger
     */
    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param AfterbuyConnection $afterbuyConnection
     */
    public function setAfterbuyConnection($afterbuyConnection)
    {
        $this->afterbuyConnection = $afterbuyConnection;
    }

    /**
     * Parse the response from Afterbuy
     *
     * @param \SimpleXMLElement $xmlResponse
     *
     * @return array
     */
    private function getResponse($xmlResponse)
    {
        $domDoc = dom_import_simplexml($xmlResponse);
        $xpath = new \DOMXpath($domDoc->ownerDocument);

        $success = $xpath->query('//result/success')->item(0)->textContent;
        $error = $xpath->query('//result/errorlist/error')->length > 0 ? $xpath->query(
            '//result/errorlist/error'
        )->item(0)->textContent : null;

        try {
            if ($success || in_array($error, $this->errorMessagesOk)) {
                return array(
                    'success' => true,
                    'message' => 'success',
                );
            } else {
                return array(
                    'success' => false,
                    'message' => $error,
                );
            }
        } catch (\Exception $e) {
            return array(
                'success' => false,
                'message' => $e->getMessage(),
            );
        }
    }

    /**
     * @param AfterbuyOrder $order
     *
     * @return bool
     */
    public function createOrder(AfterbuyOrder $order)
    {
        $orderParams = $order->toArray();

        $this->logger->addInfo("\n\n" . date(DATE_RFC822) . "\nOrder ID: " . $order->getId());
        $this->logger->addInfo("\nItem to create: \n" . print_r($orderParams, true));

        $result = $this->afterbuyConnection->executeCommand('createOrder', $orderParams);

        /** @var \SimpleXMLElement $xmlResponse */
        $xmlResponse = $result['message']->xml();

        $this->logger->addInfo("\n\nAfterbuy Response Data:\n" . $xmlResponse->asXML());

        return $this->getResponse($xmlResponse);
    }
} 