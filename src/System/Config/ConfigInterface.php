<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 29.07.2019
 * Time: 17:57
 */

namespace App\System\Config;

interface ConfigInterface
{
    public function addConfig($file);
    public function get($keyValue);
}
