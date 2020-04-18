<?php

namespace Tomipetit;

use tomipetit\Constants\Resource;

class Event extends BaseClass
{
    protected $apiPath = Resource::BASE_URL . Resource::EVENTS;

    public function list($params)
    {
        return $this->get($this->apiPath, $params);
    }
    public function get($id)
    {
        return $this->get($this->apiPath . "/{$id}");
    }
}
