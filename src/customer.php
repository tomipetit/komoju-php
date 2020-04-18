<?php

namespace Tomipetit;

use tomipetit\Constants\Resource;

class Customer extends BaseClass
{
    protected $apiPath = Resource::BASE_URL . Resource::CUSTOMERS;

    public function list($params)
    {
        return $this->get($this->apiPath, $params);
    }
    public function get($id)
    {
        return $this->get($this->apiPath . "/{$id}");
    }

    public function create($params)
    {
        return $this->post($this->apiPath, $params);
    }

    public function update($id, $params)
    {
        return $this->patch($this->apiPath . "/{$id}", $params);
    }

    public function delete($id)
    {
        return $this->delete($this->apiPath . "/{$id}");
    }
}
