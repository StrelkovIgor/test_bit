<?php
/**
 * Created by PhpStorm.
 * User: crash
 * Date: 29.10.2019
 * Time: 21:02
 */

$r = Rout::class;

$r::match([$r::GET, $r::POST],'/','\Controller\Index@index');

$r::get('/login','\Controller\Users@login');
$r::get('/loginout','\Controller\Users@loginOut');
$r::post('/login','\Controller\Users@loginPost');

$r::get('/writeoff','\Controller\Index@writeoff');
$r::post('/writeoff','\Controller\Index@writeoffPost');
