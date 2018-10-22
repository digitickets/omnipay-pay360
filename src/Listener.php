<?php

namespace DigiTickets\Pay360;

interface Listener
{
    public function update($action, $data);
}