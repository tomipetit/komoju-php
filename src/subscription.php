<?php

namespace Tomipetit\Komoju;

use Tomipetit\Komoju\Constants\Resource;

class Subscription extends BaseClass
{
    protected $apiPath = Resource::BASE_URL . Resource::SUBSCRIPTIONS;

    public function list($params)
    {
        return $this->get($this->apiPath, $params);
    }
    public function show($id)
    {
        return $this->get($this->apiPath . "/{$id}");
    }

    public function create($params)
    {
        return $this->post($this->apiPath, $params);
    }

    public function delete($id)
    {
        return $this->delete($this->apiPath . "/{$id}");
    }
}
