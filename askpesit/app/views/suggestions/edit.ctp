<h2>Edit a Post</h2>
<?php 
echo $form->create('Suggestion',array('action'=>'edit'));
echo $form->input('title');
echo $form->input('body');
echo $form->input('id',array('type'=>'hidden'));
echo $form->end('Edit Post');
?>
