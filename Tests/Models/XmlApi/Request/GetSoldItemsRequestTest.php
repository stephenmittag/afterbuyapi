<?php

namespace Wk\AfterbuyApi\Tests\Models\XmlApi\Request;

use JMS\Serializer\Serializer;
use Wk\AfterbuyApi\Models\XmlApi\Request\AbstractRequest;
use Wk\AfterbuyApi\Models\XmlApi\Request\Filter\DateFilter;
use Wk\AfterbuyApi\Models\XmlApi\Request\Filter\DefaultFilter;
use Wk\AfterbuyApi\Models\XmlApi\Request\Filter\ShopIdFilter;
use Wk\AfterbuyApi\Models\XmlApi\Request\Filter\UserDefinedFlagFilter;
use Wk\AfterbuyApi\Models\XmlApi\Request\Filter\UserEmailFilter;
use Wk\AfterbuyApi\Models\XmlApi\Request\Filter\UserIdFilter;
use Wk\AfterbuyApi\Models\XmlApi\Request\GetSoldItemsRequest;
use Wk\AfterbuyApi\Models\XmlApi\Request\Filter\OrderIdFilter;
use Wk\AfterbuyApi\Models\XmlApi\Request\Filter\PlatformFilter;
use Wk\AfterbuyApi\Models\XmlApi\Request\Filter\RangeIdFilter;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use \DateTime;

/**
 * Class GetSoldItemsRequestTest
 */
class GetSoldItemsRequestTest extends WebTestCase
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
     * @return array
     */
    public function provideSerializationToXml()
    {
        return array(
            array($this->createExemplaryGetSoldItemsRequest1(), 'GetSoldItemsRequest1.xml'),
            array($this->createExemplaryGetSoldItemsRequest2(), 'GetSoldItemsRequest2.xml')
        );
    }

    /**
     * @param GetSoldItemsRequest $getSoldItemsRequest
     * @param string              $deserializedObjectFile
     *
     * @dataProvider provideSerializationToXml
     */
    public function testSerializationToXml(GetSoldItemsRequest $getSoldItemsRequest, $deserializedObjectFile)
    {
        $serializedGetSoldItemsRequest = $this->serializer->serialize($getSoldItemsRequest, 'xml');

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../../Data/Request/' . $deserializedObjectFile, $serializedGetSoldItemsRequest);
    }

    /**
     * @return GetSoldItemsRequest
     */
    private function createExemplaryGetSoldItemsRequest1()
    {
        $rangeIdFilter1 = (new RangeIdFilter())
            ->setValueFrom(2)
            ->setValueTo(4);
        $rangeIdFilter2 = (new RangeIdFilter())
            ->setValueFrom(6);
        $dateFilter1 = (new DateFilter(DateFilter::FILTER_AUCTION_END_DATE))
            ->setDateFrom(new DateTime('2003-02-01 01:02:03'))
            ->setDateTo(new DateTime('2004-03-02 02:03:04'));
        $dateFilter2 = (new DateFilter(DateFilter::FILTER_FEEDBACK_DATE))
            ->setDateFrom(new DateTime('2005-04-03 03:04:05'));

        $getSoldItems = (new GetSoldItemsRequest('user id', 'user password', 12, 'partner password', 'de'))
            ->setRequestAllItems(true)
            ->setMaxSoldItems(10)
            ->setOrderDirectionAscending()
            ->addFilter(new OrderIdFilter(123))
            ->addFilter($rangeIdFilter1)
            ->addFilter($rangeIdFilter2)
            ->addFilter($dateFilter1)
            ->addFilter($dateFilter2);

        return $getSoldItems;
    }

    /**
     * @return GetSoldItemsRequest
     */
    private function createExemplaryGetSoldItemsRequest2()
    {
        $getSoldItems = (new GetSoldItemsRequest('user id2', 'user password2', 123, 'partner password2', 'en'))
            ->setDetailLevel(GetSoldItemsRequest::DETAIL_LEVEL_PAYMENT_DATA)
            ->setRequestAllItems(true)
            ->setMaxSoldItems(10)
            ->setOrderDirectionDescending()
            ->addFilter(new DefaultFilter(DefaultFilter::FILTER_COMPLETED_AUCTIONS))
            ->addFilter(new PlatformFilter('ebay'))
            ->addFilter(new PlatformFilter('ebay', true))
            ->addFilter(new UserIdFilter(123))
            ->addFilter(new UserDefinedFlagFilter(456))
            ->addFilter(new UserEmailFilter('test@test.de'))
            ->addFilter(new ShopIdFilter(789));

        return $getSoldItems;
    }
}