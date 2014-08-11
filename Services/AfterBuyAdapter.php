<?php

namespace Wk\AfterBuyApi\Services;

/**
 * Class AfterBuyAdapter
 */
class AfterBuyAdapter
{
    /**
     * List of error messages that are OK to accept the response from AfterBuy
     */
    private $errorMessagesOk = array(
        'Diese Bestellung wurde bereits erfasst.',
        'Diese Bestellung wurde bereits erfasst, oder wird gerade bearbeitet.',
    );

    /**
     * Parse the response from AfterBuy
     *
     * @param \SimpleXMLElement $xmlResponse
     *
     * @return array
     */
    public function getResponse($xmlResponse)
    {
        $domDoc = dom_import_simplexml($xmlResponse);
        $xpath = new \DOMXpath($domDoc->ownerDocument);

        $success = $xpath->query('//result/success')->item(0)->textContent;
        $error = $xpath->query('//result/errorlist/error')->length > 0 ? $xpath->query('//result/errorlist/error')->item(0)->textContent : null;

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
        } catch (\Exception $ex) {
            return array(
                'success' => false,
                'message' => $ex->getMessage(),
            );
        }
    }

    /**
     * Build the xml string for getting the AfterBuy sold items
     *
     * @param array $params
     *
     * @return string
     */
    public function buildAfterBuySoldItemsXmlString(array $params)
    {

        $xmlString = isset($params['allItem']) ? "<RequestAllItems>" . intval(
            $params['allItem']
        ) . "</RequestAllItems>" : "";
        $xmlString .= isset($params['maxSoldItems']) ? "<MaxSoldItems>" . intval(
            $params['maxSoldItems']
        ) . "</MaxSoldItems>" : "";

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
     *
     * @param array $params
     *
     * @return string
     */
    public function buildUpdateAfterBuySoldItemsXmlString(array $params)
    {

        $xmlString = "<Orders><Order>";
        $xmlString .= "<OrderID>" . $params['orderId'] . "</OrderID>";
        $xmlString .= "<ItemID>" . $params['itemId'] . "</ItemID>";

        foreach ($params['fields'] as $field) {
            foreach ($field as $key => $value) {
                $xmlString .= "<" . ucfirst($key) . "><![CDATA[" . $value . "]]></" . ucfirst($key) . ">";
            }
        }

        $xmlString .= "</Order></Orders>";

        return $xmlString;
    }

} 