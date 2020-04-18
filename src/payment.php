<?php

namespace Tomipetit\Komoju;

use Tomipetit\Komoju\Constants\Resource;

class Payment extends BaseClass
{
    protected $apiPath = Resource::BASE_URL . Resource::PAYMENTS;

    public function list($params)
    {
        return $this->get($this->apiPath, $params);
    }
    public function get($id)
    {
        return $this->get($this->apiPath . "/{$id}");
    }

    public function create(string $type, array $params)
    {
        $params["type"] = $type;
        if (!array_key_exists("currency", $params)) {
            $params["currency"] = "JPY";
        }
        if (!(array_key_exists("payment_details", $params) || array_key_exists("customer", $params))) {
            return $this->error([
                "message" => "A required parameter payment_details or customer is missing",
                "code" => "missing_parameter",
                "param" => "payment_details or customer"
            ]);
        }
        return $this->post($this->apiPath, $params);
    }

    // 更新（description and metadata only）
    public function update($id, $params)
    {
        return $this->patch($this->apiPath . "/{$id}", $params);
    }

    // 返金(クレジットカード,ビットキャッシュ,NET CASH)
    public function refund($id, $params = null)
    {
        return $this->post($this->apiPath . "/{$id}/refund", $params);
    }

    // 支払のキャンセル(コンビニ,銀行振込,PAYEASY)
    public function cancel($id)
    {
        return $this->post($this->apiPath . "/{$id}/cancel");
    }
}
