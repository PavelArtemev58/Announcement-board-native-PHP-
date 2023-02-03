<?php
if(!empty($_POST['submit'])){
	$author = $_POST['author'];
	$category_id = $_POST['category'];
	$theme = $_POST['theme'];
	$text = $_POST['text'];
	
	$query = "INSERT INTO announcements SET author='$author', theme='$theme', text='$text', category_id='$category_id'";
	mysqli_query($link, $query) or die(mysqli_error($link));
	
	header('Location: /');
	die();
} else {
	$query = "SELECT * FROM categories";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
	
	$content = '
	    <form action="" method="POST">
		    <div>Автор<input name="author"></div>
		    <div>Категория<select name="category">';
	foreach($data as $elem){
		$content .= '<option value="'.$elem['id'].'">'.$elem['name'].'</option>';
	}
	$content .='
	    </select></div>
		    <div>Тема<input name="theme"></div>
		    <div>Текст<textarea name="text"></textarea></div>
		    <div><input type="submit" name="submit"></div>
		</form>';
	
	$page = [
	    'title' => 'Новое объявление',
		'header' => 'Новое объявление',
		'content' => $content
	];
}
return $page;
?>