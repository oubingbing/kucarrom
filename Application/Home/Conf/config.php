<?php
if (!defined('THINK_PATH')) exit();
$config	=	require './myConfig.php';
$array=array(
	'Money_weeken'=>'7',//周末兼职费
	'Money'      => '6',//非周末兼职费
	'Ohter_money'=>'1',//替班的额外奖励
);
return array_merge($config,$array);
?>