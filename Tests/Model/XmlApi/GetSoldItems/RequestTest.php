<?php

namespace Wk\AfterbuyApi\Tests\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AfterbuyGlobal;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Filter\DateFilter;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Filter\DefaultFilter;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Filter\ShopIdFilter;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Filter\UserDefinedFlagFilter;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Filter\UserEmailFilter;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Filter\UserIdFilter;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\GetSoldItemsRequest;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Filter\OrderIdFilter;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Filter\PlatformFilter;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Filter\RangeIdFilter;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use \DateTime;

/**
 * Class RequestTest
 */
class RequestTest extends WebTestCase
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
            array($this->createExemplaryRequest1(), 'Request1.xml'),
            array($this->createExemplaryRequest2(), 'Request2.xml')
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

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../../Data/GetSoldItems/' . $deserializedObjectFile, $serializedGetSoldItemsRequest);
    }

    /**
     * @return GetSoldItemsRequest
     */
    private function createExemplaryRequest1()
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

        $afterbuyGlobal = (new AfterbuyGlobal('user id', 'user password', 12, 'partner password', 'de'));

        $getSoldItems = (new GetSoldItemsRequest($afterbuyGlobal))
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
    private function createExemplaryRequest2()
    {
        $afterbuyGlobal = (new AfterbuyGlobal('user id2', 'user password2', 123, 'partner password2', 'en'))
            ->setDetailLevel(AfterbuyGlobal::DETAIL_LEVEL_PAYMENT_DATA);

        $getSoldItems = (new GetSoldItemsRequest($afterbuyGlobal))
            ->setDetailLevel(AfterbuyGlobal::DETAIL_LEVEL_PAYMENT_DATA)
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