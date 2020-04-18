<?php

namespace Tomipetit\Komoju;

use Tomipetit\Komoju\Constants\Resource;

class Event extends BaseClass
{
    protected $apiPath = Resource::BASE_URL . Resource::EVENTS;

    public function list($params)
    {
        return $this->get($this->apiPath, $params);
    }
    public function show($id)
    {
        return $this->get($this->apiPath . "/{$id}");
    }
}
