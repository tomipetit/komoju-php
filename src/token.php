<?php

namespace Tomipetit\Komoju;

use Tomipetit\Komoju\Constants\Resource;

class Token extends BaseClass
{
    protected $apiPath = Resource::BASE_URL . Resource::TOKENS;

    public function create(String $type, array $detail, String $currency = "JPY")
    {
        if ($type = "credit_card") {
            return $this->error([
                "message" => "You cannot make tokens for credit cards.",
                "code" => "cannnot_make",
                "param" => "type"
            ]);
        }
        $detail["type"] = $type;
        $params = [
            "payment_details" => $detail,
            "currency" => $currency,
        ];
        return $this->post($this->apiPath, $params);
    }
}
