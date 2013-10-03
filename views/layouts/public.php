<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Public Page</title>
	<link href='http://fonts.googleapis.com/css?family=Cantora+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo APP_ROOT.'views'.DS.'assets'.DS.'main.css'; ?>">
</head>
<body>
    <header>
	<a href="<?php echo APP_ROOT.'pages'; ?>"><span id ="pageHeader"><h1>Public Page</h1></span></a>
	<a href="<?php echo APP_ROOT.'pages'.DS.'toggle' ; ?>" ><p>Click <span class="orange">here</span> to go to Admin mode and make changes to the <span class="blue">Site</span></p>
    </header></a>
    <section id = "content" class="cf">
    <nav>
    <?php $main_links = array(); ?>   <!-- functionality for footer maybe -->
	<?php navigation_public($subjects, $params); ?>
    </nav>
	<?php $current_page = current_page(); ?>
	<?php $current_subject = current_subject(); ?>
	<?php include_once(VIEW_PATH.$route['controller'].DS.$route['view'].'.php'); ?>
	
	<footer>
	<p>Created by me</p>
	</footer>



</body>
</html>