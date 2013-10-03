<?php 
	//$_SESSION['message']="hello world";
 ?>
<?php if($current_page){ ?>

<article id = "mainArticle" class="cf">
<h2><?php echo htmlentities($current_page->menu); ?></h2>
<p><?php echo htmlentities($current_page->content); ?></p>


<?php }else { 
	if($session->logged_in){?>
		<article>
		<h2>Welcome</h2>
		<p>You are in the admin page now. Here you can make changes to contents of your site. Be aware that 
		to see some of the changes you have to be in the public page. For example if you turn the visibility of pages or subjects off
		here, you'll still see them. Those changes will only be reflected in the public page.</p>
		</article>
	
	<?php 
	}else{  ?>
	<article>
		<h2>Welcome</h2>
		<p>You are in the public page now. Here you can see the effects of the changes you made in the admin page.
		</p>
	</article>

	<?php } 
 } ?>
</article>
<section id = "controls" class="cf">
<?php 
	if(isset($params['subject']) && $session->logged_in == true):?>
	<a class="subject" href="<?php echo APP_ROOT.'pages'.DS.$params['subject'].DS.'edit' ; ?>"
	>Edit Subject</a>
	<?php
    if(isset($params['subject'])): ?>
        <a class="subject" href="<?php echo APP_ROOT.'pages'.DS.$params['subject'].DS.'new'; ?>"
        >New Subject</a>
	<?php endif; ?>
	<a class="page" href="<?php echo APP_ROOT.'pages'.DS.$params['subject'].DS.'1'.DS.'new' ; ?>"
	>New Page</a>
<?php endif; ?>


<?php if(isset($params['pid']) && $session->logged_in == true): ?>
	<a class="page" href="<?php echo APP_ROOT.'pages'.DS.$params['subject'].DS.$current_page->id.DS.'edit' ; ?>"
	>Edit page </a>

<?php endif; ?>
</section>

<?php if($session->logged_in): ?><!--messages/ error or success messages-->
<section id ="message">
	<?php 
		if($session->message && strlen($session->message)>3){
			echo "<p>".$session->message."</p>";
		}
	?>
</section>
<?php endif; ?>

</section>

