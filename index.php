<?php
require('connections/connect.php');

$url = $_SERVER['REQUEST_URI'];

$route = '/page/(?<catSlug>[a-z0-9_-]+)';
if (preg_match("#$route#", $url, $params)) {
	$flag = true;
	$page = include 'view/page/category.php';
}

$route = '/page/(?<catSlug>[a-z0-9_-]+)/(?<pageSlug>[a-z0-9_-]+)';
if (preg_match("#$route#", $url, $params)){
	$flag = true;
	$page = include 'view/page/view.php';
}

$route = '/page/(add/new)';
if (preg_match("#$route#", $url, $params)){
	$flag = true;
	$page = include 'view/page/add/new.php';
}

if (empty($flag)) {
	$page = include 'view/page/all.php';
}
	
$layout = file_get_contents('layout.php');
$layout = str_replace('{{ title }}', $page['title'], $layout);
$layout = str_replace('{{ header }}', $page['header'], $layout);
$layout = str_replace('{{ content }}', $page['content'], $layout);
$layout = str_replace('{{ footer }}', $page['footer'], $layout);

echo $layout;
?>