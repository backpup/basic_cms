
<?php if(!isset($params['pid'])){ ?>

<section id ="forms">
<h2>Edit Menu</h2>
<form id="form1" action="<?php echo APP_ROOT.'pages'.DS.$params['subject'].DS.'editing' ?>" method = "post">
<!-- Sending in Hidden value to determine what to process-->
<input type="hidden" name = "direction" value = "subject"  />
    <label for="menu">Menu name:</label>
	<input id="subjectMenu" type="text" name = "post[menu]" value = "<?php 
	echo $current_subject->menu ; ?>"  />
	<span id="subjectMenu_error" class ="error"></span>

    <label for="position">Position:</label>
    <?php $count = Subject::num_count(); ?>
	<select name="post[position]">
	<?php for($i=1; $i<=$count; $i++){
		if($current_subject->position==$i){
			echo "<option value = \"$i\" selected>$i</option>";
		}else{
			echo "<option value = \"$i\">$i</option>";
		}
	} 
	?>
	 </select>

    <label for="visible">Visible</label>
	<input type="radio" name = "post[visible]" value="0" <?php 
		if($current_subject->visible==0){echo "checked";}
	 ?> />No
	 <input type="radio" name = "post[visible]" value = "1" <?php
	 	if($current_subject->visible==1){echo "checked";} 
	  ?> />Yes

	<!-- <input type="submit" value = "submit" /> -->
</form>&nbsp;

<form id = "form2" action="<?php echo APP_ROOT.'pages'.DS.$params['subject'].DS.'deleting' ?>" method = "post" />
	<input type="hidden" name = 'direction' value = "delete_subject" />
	<input type="hidden" name = 'subject_id' value="<?php echo $current_subject->id ;?>"  />
	<!-- <input type="submit" value = "Delete" /> -->
</form>
	<a href="#" id="editBtn" class= "page"onclick="form1.submit()">Submit</a>
	<a href="#" id="deleteBtn" class ="subject" onclick="if(confirm('Are you sure?')){form2.submit();}">Delete</a>
</section><!--for forms section-->
</section> <!--for section id content-->
<?php } ?>



<!--  Editing Pages 
Reminder that since we use params['pid'] to determine current_page, here we'll need to send it with
a hidden value]
-->



<?php if(isset($params['pid'])){ ?>
<section id ="forms">
<h2>Edit Page</h2>
<form id="form1" style = "display:inline;" action="<?php echo APP_ROOT.'pages'.DS.$params['subject'].DS.'editing' ?>" method = "post">
<!-- Sending in Hidden value to determine what to process-->
<input type="hidden" name = "direction" value = "page"  />
<input type="hidden" name = "current_page_id" value = "<?php echo $current_page->id ?>"  />
<input type="hidden" name = "post[subject_id]" value = "<?php echo $current_subject->id ?>" />
    <label for="menu">Menu name:</label>
	<input id="pageMenu" type="text" name = "post[menu]" value = "<?php 
	echo $current_page->menu ; ?>"  />
	<span id="pageMenu_error" class ="error"></span>
<?php $count = Page::num_count($current_subject->id); ?>
    <label for="position">Position:</label>
	<select name="post[position]">
	<?php for($i=1; $i<=$count; $i++){
		if($current_page->position==$i){
			echo "<option value = \"$i\" selected>$i</option>";
		}else{
			echo "<option value = \"$i\">$i</option>";
		}
	} 
	?>
	 </select>
    <label for="visible">Visible:</label>
	<input type="radio" name = "post[visible]" value="0" <?php 
		if($current_page->visible==0){echo "checked";}
	 ?> />No
	 <input type="radio" name = "post[visible]" value = "1" <?php
	 	if($current_page->visible==1){echo "checked";} 
	  ?> />Yes
    <label for="content">Content</label>
	<textarea id="pageContent" name="post[content]" cols="50" rows="10"
	><?php echo $current_page->content ; ?></textarea>
	<span id="pageContent_error" class ="error"></span>

	<!-- <input type="submit" value = "submit" /> -->
</form>&nbsp;

<form id = "form2" action="<?php echo APP_ROOT.'pages'.DS.$params['subject'].DS.'deleting' ?>" method = "post" />
	<input type="hidden" name = 'direction' value = "delete_page" />
	<input type="hidden" name = 'page_id' value="<?php echo $current_page->id ;?>"  />
	<!-- <input type="submit" value = "Delete" /> -->
</form>

<a href="#" id="editBtn" class= "page">Submit</a>
<a href="#" id="deleteBtn" class ="subject" onclick="if(confirm('Are you sure?')){form2.submit();}">Delete</a>

</section><!--for forms section-->
</section> <!--for section id content-->

<?php } ?>







