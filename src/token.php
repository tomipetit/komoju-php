<?php

namespace Tomipetit\Komoju;

use Tomipetit\Komoju\Constants\Resource;

class Token extends BaseClass
{
    protected $apiPath = Resource::BASE_URL . Resource::TOKENS;

    public function create($detail, $currency = "JPY")
    {
        $params = (object) [
            "payment_details" => $detail,
        ];
        if ($currency) {
            $params->currency = $currency;
        }
        return $this->post($this->apiPath, $params);
    }
}
