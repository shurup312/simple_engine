<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 29.07.2019
 * Time: 14:39
 */

namespace App\System\Controller;

interface ControllerInterface
{
    public function render($path, $data = []);
}
