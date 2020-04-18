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

    public function create($type, $params)
    {
        $params->type = $type;
        if (!property_exists($params, "currency")) {
            $params->currency = "JPY";
        }
        if (!(property_exists($params, "payment_details") || property_exists($params, "customer"))) {
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
