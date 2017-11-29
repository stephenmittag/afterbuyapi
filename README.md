# WkAfterbuyApiBundle

[![Build Status](https://travis-ci.org/asgoodasnu/afterbuyapi.png?branch=master)](https://travis-ci.org/asgoodasnu/afterbuyapi) [![Total Downloads](https://poser.pugx.org/asgoodasnu/afterbuyapi/d/total.png)](https://packagist.org/packages/asgoodasnu/afterbuyapi) [![Latest Stable Version](https://poser.pugx.org/asgoodasnu/afterbuyapi/v/stable.png)](https://packagist.org/packages/asgoodasnu/afterbuyapi) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/9a1fccba-a214-46bf-bd44-c6288a049a91/mini.png)](https://insight.sensiolabs.com/projects/9a1fccba-a214-46bf-bd44-c6288a049a91)

The WkAfterbuyApiBundle provides a Symfony2 service to interact with the [Afterbuy XML API](http://xmldoku.afterbuy.de/dokued/) using Guzzle.

Installation
----------------------------------------------------------------

Require the bundle and its dependencies with composer:

    $ composer require asgoodasnu/afterbuyapi
    
 
Usage
----------------------------------------------------------------

#### Retrieving a list of sold items from Afterbuy:

```php
$client = new Client(
    $config['afterbuy']['userId'],
    $config['afterbuy']['userPw'],
    $config['afterbuy']['partnerId'],
    $config['afterbuy']['partnerPw'],
    'EN'
);
$soldItems = $client->getSoldItems($filters, $orderDirection, $maxSoldItems, $detailLevel);
```

The response will be an instance of `Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\GetSoldItemsResponse` and provides methods to traverse the XML sent back from Afterbuy such as fetching the orders:

```php
$orders = $soldItems->getResult()->getOrders();
```

Provide an array of filters defined in Afterbuy, for example a DateFilter or a DefaultFilter. The models for these filters can be found in `Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Filter`.

```php
$dateFilter = (new DateFilter(DateFilter::FILTER_AUCTION_END_DATE))
                ->setDateFrom(new DateTime('2000-01-01 00:00:00'))
                ->setDateTo(new DateTime('2000-01-10 00:00:00'));
            
$defaultFilter = new DefaultFilter(DefaultFilter::FILTER_COMPLETED_AUCTIONS);
```

#### Updating sold items on Afterbuy:

```php
$order = new \Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems\Order();
$order->setOrderId(1234567890)
      ->setUserDefinedFlag(12345)
      ->setInvoiceMemo("You didn't read the memo? You are fired!");
$client->updateSoldItems(array($orders));
```

The response will be an instance of `Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems\UpdateSoldItemsResponse`.

Dependencies
----------------------------------------------------------------
* `jms/serializer` - Allows you to easily serialize, and deserialize data of any complexity
* `guzzlehttp/guzzle` - Guzzle is a PHP HTTP client library

PHPUnit Tests
----------------------------------------------------------------
You can run the tests using the following command:

    $ vendor/bin/phpunit

Resources
----------------------------------------------------------------
Afterbuy XML Interface Documentation:
> [http://xmldoku.afterbuy.de/dokued/](http://xmldoku.afterbuy.de/dokued/)
