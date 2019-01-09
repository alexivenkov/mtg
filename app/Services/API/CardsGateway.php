<?php

namespace App\Services\API;

use mtgsdk\Card;

class CardsGateway extends Card
{
    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }

        return null;
    }

    public function toArray()
    {
        return $this->data;
    }
}