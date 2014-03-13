shopifyapi
==========
[![Composer Downloads](https://poser.pugx.org/asgoodasnu/shopifyapi/d/total.png)](https://packagist.org/packages/asgoodasnu/shopifyapi) [![Build Status](https://travis-ci.org/asgoodasnu/shopifyapi.png?branch=master)](https://travis-ci.org/asgoodasnu/shopifyapi) [![Dependency Status](https://www.versioneye.com/php/asgoodasnu:shopifyapi/dev-master/badge.png)](https://www.versioneye.com/php/asgoodasnu:shopifyapi/dev-master)

this bundle implements the shopify product api as described here http://docs.shopify.com/api/product 
by using great guzzle/guzzle webservice description, leading to a cool restful interface.

to "talk" with shopify you'll need private api key and password of your shopify shop and add it as "shopify_base_url" to your parameters.yml
http://docs.shopify.com/api/tutorials/creating-a-private-app

an example call to get the number of products in your shop would look like this...
curl http://localhost/shopify/product/count/
