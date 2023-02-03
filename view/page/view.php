<?
$catSlug = $params['catSlug'];
$pageSlug = $params['pageSlug'];

$query = "
    SELECT author, text FROM announcements WHERE theme='$pageSlug'
";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$data = mysqli_fetch_assoc($result);

$content = "
    <div>Автор $data[author]</div>
	<div>$data[text]</div>
";

$page = [
    'title' => $pageSlug,
	'header' => 'Объявление '.$pageSlug,
	'content' => $content,
	'footer' => '<p><a href="/">Главная</a></p>'
];
return $page;
?>