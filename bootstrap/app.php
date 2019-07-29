<?php
/**
 * User: Oleg Prihodko
 * Mail: shurup@e-mind.ru
 * Date: 29.07.2019
 * Time: 11:43
 */


define ("BASEPATH", dirname(__DIR__));

$app = \App\System\App::getInstance(BASEPATH);

return $app;
