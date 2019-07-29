<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 29.07.2019
 * Time: 14:47
 */

namespace App\System\View;

interface ViewInterface
{
    public function make($path, $data = [ ]);
}
