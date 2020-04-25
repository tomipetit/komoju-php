<?php

namespace Tomipetit\Komoju;

class Komoju
{
    protected $secretKey;
    protected $event;

    public function __construct($secretKey)
    {
        $this->secretKey = $secretKey;
        $this->event = $this->_dispatch("Event");
        $this->customer = $this->_dispatch("Customer");
        $this->payment = $this->_dispatch("Payment");
        $this->subscription = $this->_dispatch("Customer");
        $this->token = $this->_dispatch("Token");
    }

    private function _dispatch($className)
    {
        $ref = new \ReflectionClass("Tomipetit\\Komoju\\" . ucfirst($className));
        return $ref->newInstance($this->secretKey);
    }
}
