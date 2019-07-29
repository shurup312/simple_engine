<?php

namespace App\System\View;

interface ViewInterface
{
    public function make($path, $data = [ ]);
}
