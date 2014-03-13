afterbuyapi
==========
[![Composer Downloads](https://poser.pugx.org/asgoodasnu/afterbuyapi/d/total.png)](https://packagist.org/packages/asgoodasnu/afterbuyapi) [![Build Status](https://travis-ci.org/asgoodasnu/afterbuyapi.png?branch=master)](https://travis-ci.org/asgoodasnu/afterbuyapi) [![Dependency Status](https://www.versioneye.com/php/asgoodasnu:afterbuyapi/dev-master/badge.png)](https://www.versioneye.com/php/asgoodasnu:afterbuyapi/dev-master)

this bundle implements the afterbuy xmp- and shop-api as described here http://xmldoku.afterbuy.de/dokued/ and here http://shopdoku.afterbuy.de/shopdoku/
by using great guzzle/guzzle webservice description, leading to a cool restful interface.

to "talk" with afterbuy you'll need to set following parameters in your parameters.yml

    afterbuy_shop_uri: 'https://api.afterbuy.de/afterbuy/ShopInterfaceUTF8.aspx'
    afterbuy_xml_uri: 'https://api.afterbuy.de/afterbuy/ABInterface.aspx'
    afterbuy_partner_id: [YOUR_PARTNER_ID]
    afterbuy_partner_pass: [YOUR_PARTNER_PASS]
    afterbuy_user_id: [YOUR_USER_ID]
    afterbuy_user_password: [YOUR_USER_PASS]
    afterbuy_marker_id: [YOUR_MARKER_ID]
    afterbuy_check_vid: 1
    afterbuy_detail_level: 0
    afterbuy_error_language: DE
