<?php

namespace App\System\Controller;

interface ControllerInterface
{
    public function render($path, $data = []);
}
