<h2>Suggest</h2>
<?php 
echo $form->create('Suggestion',array('action'=>'add'));
echo $form->input('title');
echo $form->input('body');
echo $form->end('Suggest');
?>
