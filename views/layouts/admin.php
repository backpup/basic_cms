<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
	<link href='http://fonts.googleapis.com/css?family=Cantora+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo APP_ROOT.'views'.DS.'assets'.DS.'main.css'; ?>">
   
</head>
<body>
    <header class="cf">
	<a href="<?php echo APP_ROOT.'pages'; ?>"><span id ="pageHeader"><h1>Admin Page</h1></span></a>
	<a href="<?php echo APP_ROOT.'pages'.DS.'toggle' ; ?>" ><p>Click <span class="orange">here</span> to go to Public mode and view how the site looks to the <span class="blue">public</span></p></a>
    </header>
    <section id = "content" class="cf">
    <nav>
	<?php navigation($subjects, $params); ?>
    </nav>
	<?php $current_page = current_page(); ?>
	<?php $current_subject = current_subject(); ?>
	<?php include_once(VIEW_PATH.$route['controller'].DS.$route['view'].'.php'); ?>
	
	<footer>
	<p>Created by me</p>
	</footer>

<script src = "<?php echo APP_ROOT.'views'.DS.'assets'.DS.'validation.js'; ?>"></script>
</body>
</html>
