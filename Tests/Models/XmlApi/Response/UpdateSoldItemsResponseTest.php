<?php

namespace Wk\AfterbuyApi\Tests\Models\XmlApi\Request;

use JMS\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Wk\AfterbuyApi\Models\XmlApi\Response\UpdateSoldItemsResponse;

/**
 * Class UpdateSoldItemsResponseTest
 */
class UpdateSoldItemsResponseTest extends WebTestCase
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * set up client
     */
    public function setUp()
    {
        $client = static::createClient();
        $this->serializer = $client->getContainer()->get('jms_serializer');
    }

    /**
     * test deserialization of a response on success
     */
    public function testDeserializationFromXmlOnSuccess()
    {
        $updateSoldItemsResponse = $this->deserializeResponse('UpdateSoldItemsResponseOnSuccess.xml');

        $this->assertEquals('Success', $updateSoldItemsResponse->getCallStatus());
        $this->assertEquals('UpdateSoldItems', $updateSoldItemsResponse->getCallName());
        $this->assertEquals(8, $updateSoldItemsResponse->getVersionId());
        $this->assertEmpty($updateSoldItemsResponse->getResult()->getErrors());
    }

    /**
     * test deserialization of a response on error
     */
    public function testDeserializationFromXmlOnError()
    {
        $updateSoldItemsResponse = $this->deserializeResponse('UpdateSoldItemsResponseOnError.xml');

        $this->assertEquals('Error', $updateSoldItemsResponse->getCallStatus());
        $this->assertEquals('UpdateSoldItems', $updateSoldItemsResponse->getCallName());
        $this->assertEquals(8, $updateSoldItemsResponse->getVersionId());

        $errorList = $updateSoldItemsResponse->getResult()->getErrors();

        $this->assertEquals(2, sizeof($errorList));
        $this->assertEquals(11, $errorList[0]->getErrorCode());
        $this->assertEquals('something failed', $errorList[0]->getErrorDescription());
        $this->assertEquals('something really failed', $errorList[0]->getErrorLongDescription());
        $this->assertEquals(22, $errorList[1]->getErrorCode());
        $this->assertEquals('another error', $errorList[1]->getErrorDescription());
        $this->assertEquals('another error', $errorList[1]->getErrorLongDescription());
    }

    /**
     * @param string $fileName
     *
     * @return UpdateSoldItemsResponse
     */
    private function deserializeResponse($fileName) {
        $responseBody = file_get_contents(__DIR__ . '/../../Data/Response/' . $fileName);

        return $this->serializer->deserialize($responseBody, UpdateSoldItemsResponse::class, 'xml');
    }
}