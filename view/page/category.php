<?php
$catSlug = $params['catSlug'];

$query = "
    SELECT announcements.theme
	FROM announcements
	LEFT JOIN categories
	ON categories.id=announcements.category_id
	WHERE categories.name='$catSlug'
";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

$content = '';
foreach($data as $elem){
	$content .= '
	<div>
	<a href="/page/'.$catSlug.'/'.$elem['theme'].'">'.$elem['theme'].'</a>
	</div>
	';
}

$page = [
    'title' => 'Список объявлений категории ' . $catSlug,
	'header' => 'Список объявлений категории ' . $catSlug,
	'content' => $content,
	'footer' => '<p><a href="/">Главная</a></p>'
];
return $page;
?>