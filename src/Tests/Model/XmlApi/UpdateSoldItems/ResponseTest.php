<?php

namespace Wk\AfterbuyApiBundle\Tests\Model\XmlApi\UpdateSoldItems;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems\UpdateSoldItemsResponse;
use Wk\AfterbuyApiBundle\Services\Xml\Client;

/**
 * Class ResponseTest
 */
class ResponseTest extends WebTestCase
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
        $this->serializer = Client::getDefaultSerializer();
    }

    /**
     * test deserialization of a response on success
     */
    public function testDeserializationFromXmlOnSuccess()
    {
        $updateSoldItemsResponse = $this->deserializeResponse('ResponseOnSuccess.xml');

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
        $updateSoldItemsResponse = $this->deserializeResponse('ResponseOnError.xml');

        $this->assertEquals('Error', $updateSoldItemsResponse->getCallStatus());
        $this->assertEquals('UpdateSoldItems', $updateSoldItemsResponse->getCallName());
        $this->assertEquals(8, $updateSoldItemsResponse->getVersionId());

        $errorList = $updateSoldItemsResponse->getResult()->getErrors();

        $this->assertCount(2, $errorList);
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
    private function deserializeResponse($fileName)
    {
        $responseBody = file_get_contents(__DIR__ . '/../../../Data/UpdateSoldItems/' . $fileName);

        return $this->serializer->deserialize($responseBody, UpdateSoldItemsResponse::class, 'xml');
    }
}