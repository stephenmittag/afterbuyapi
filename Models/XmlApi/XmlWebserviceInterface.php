<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

interface XmlWebserviceInterface
{
    public function getData ($credentials = array('partner_id' => '',
                                                  'partner_pass'=> '',
                                                  'user_id' => '',
                                                  'user_pass' => ''));

}