
<?php if(!isset($params['pid'])): ?>
	<section id = "forms">
	<h2>Create Subject</h2>
	<form id = "form1" action="<?php echo APP_ROOT.'pages'.DS.$params['subject'].DS.'create' ; ?>" method = "post">

    <label for="menu">Menu name:</label>
	<input id="subjectMenu" type="text" name = "post[menu]"/>
	<span id="subjectMenu_error" class ="error"></span>
    <label for="position">Position</label>
	<select name="post[position]">
	<?php 
		$rows = Subject::num_count();
		for($i = 1; $i<=$rows+1; $i++){
			if($i==$rows+1){
				echo "<option value = \"$i\" selected>$i</option>";
			}else{
				echo "<option value = \"$i\">$i</option>";
			}
		}
	 ?>
	</select> 
	
        <label for="visible">Visible:</label>
		<input type="radio" name = "post[visible]" value = "0" />No&nbsp;
		<input type="radio" name = "post[visible]" value = "1" checked /><span class="liner">Yes</span>
	
<!-- 	<input type="submit" value = "submit"> -->

	</form>
	<a href="#" id ="editBtn" class= "subject"onclick="form1.submit()">Submit</a>
	</section><!--for forms section-->
	</section> <!--for section id content-->

<?php endif; ?>

<?php if(isset($params['pid'])): ?>
	<section id = "forms">
	<h2>Create page</h2>
	<form action="<?php echo APP_ROOT.'pages'.DS.$params['subject'].DS.
	$params['pid'].DS.'create' ; ?>" method = "post">
	
	<input type="hidden" name = "post[subject_id]" 
	value = "<?php echo $current_subject->id ?>">
    
    <label for="menu">Menu name:</label>
    <input id="pageMenu" type="text" name = "post[menu]"/>
    <span id="pageMenu_error" class ="error">&nbsp;</span>
    <label for="position">Position</label>
	<select name="post[position]">
	<?php 
		$rows = Page::num_count($current_subject->id);
		for($i = 1; $i<=$rows+1; $i++){
			if($i==$rows+1){
				echo "<option value = \"$i\" selected>$i</option>";
			}else{
				echo "<option value = \"$i\">$i</option>";
			}
		}
	 ?>
	</select> 
	
    <label for="visible">Visible:</label>
    <input type="radio" name = "post[visible]" value = "0" />No&nbsp;
	<input type="radio" name = "post[visible]" value = "1" checked /><span class="liner">Yes</span>

    <label for="content">Content:</label>
	<textarea id="pageContent" name="post[content]" cols="50" rows="10"></textarea>
	<span id="pageContent_error" class ="error">&nbsp;</span>
	
	<!-- <input type="submit" value = "submit"> -->

	</form>
	<a href="#" id = "editBtn" class= "page"onclick="form1.submit()">Submit</a>
	</section><!--for forms section-->
	</section> <!--for section id content-->
<?php endif; ?>
