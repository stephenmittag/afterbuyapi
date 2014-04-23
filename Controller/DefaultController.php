<?php

namespace Wk\AfterBuyApi\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{
    /**
     * GetAfterBuyTime action.
     * @return Response
     */
    public function getTimeAction()
    {
        /** @var Wk\AfterBuyApi\Lib\AfterBuyConnection $connection */
        $connection = $this->container->get('wk_afterbuy.afterbuy.connection');
        $connection->setBaseUrl('xml');

        try {
            $result = $connection->executeCommand('getTime', array(
                "Request" => $connection->getAfterBuyTimeRequest(),
            ));
        } catch(\Exception $e) {
            $result = null;
        }

        return $this->generateResponse($result);
    }

    /**
     * GetSoldItems action
     * @param Request $request
     *
     * @return Response
     */
    public function getSoldItemsAction(Request $request)
    {
        $parameters = $request->getContent();

        if ($parameters) {
            $parameters = json_decode($parameters, true);

            if (!is_null($parameters)) {
                /** @var Wk\AfterBuyApi\Lib\AfterBuyConnection $connection */
                $connection = $this->container->get('wk_afterbuy.afterbuy.connection');
                $connection->setBaseUrl('xml');

                try {
                    $result = $connection->executeCommand('getSoldItems', array(
                        "Request" => $connection->getAfterBuySoldItems($parameters),
                    ));
                } catch(\Exception $e) {
                    $result = null;
                }

                return $this->generateResponse($result);
            }
        }

        return $this->generateResponse(null);
    }

    /**
     * UpdateSoldItems action
     * @param Request $request
     *
     * @return Response
     */
    public function updateSoldItemsAction(Request $request)
    {
        $parameters = $request->getContent();

        if ($parameters) {
            $parameters = json_decode($parameters, true);

            if (!is_null($parameters)) {
                /** @var Wk\AfterBuyApi\Lib\AfterBuyConnection $connection */
                $connection = $this->container->get('wk_afterbuy.afterbuy.connection');
                $connection->setBaseUrl('xml');

                try {
                    $result = $connection->executeCommand('updateSoldItems', array(
                        "Request" => $connection->updateAfterBuySoldItems($parameters),
                    ));
                } catch(\Exception $e) {
                    $result = null;
                }

                return $this->generateResponse($result);
            }
        }

        return $this->generateResponse(null);
    }

    /**
     * Create an order in AfterBuy
     * @param Request $request
     *
     * @return Response
     */
    public function createOrderAction(Request $request)
    {
        $parameters = $request->getContent();

        if ($parameters) {
            $parameters = json_decode($parameters, true);

            if (!is_null($parameters)) {
                /** @var Wk\AfterBuyApi\Lib\AfterBuyConnection $connection */
                $connection = $this->container->get('wk_afterbuy.afterbuy.connection');

                try {
                    $result = $connection->sendNotification($parameters);
                } catch(\Exception $e) {
                    $result = null;
                }

                return $this->generateResponse($result);
            }
        }

        return $this->generateResponse(null);
    }

    /**
     * @param mixed $content
     * @param int   $responseCode
     *
     * @return Response
     */
    private function generateResponse ($content, $responseCode = Response::HTTP_OK)
    {
        $response = new Response();
        $response->setStatusCode(!empty($content) ? $responseCode : Response::HTTP_NOT_FOUND);
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(!empty($content) ? json_encode($content) : json_encode(new \stdClass()));

        return $response;
    }
}
