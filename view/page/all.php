<?php
$query = "SELECT name FROM categories";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

$content = '';
foreach ($data as $elem){
	$content .= '
	<div>
	<a href="/page/'.$elem['name'].'">'.$elem['name'].'</a>
	</div>
	';
}

$page = [
    'title' => 'Список всех рубрик',
	'header' => 'Список всех рубрик',
	'content' => $content,
	'footer' => '<p><a href="/page/add/new">Новое объявление</a></p>'
];
return $page;
?>