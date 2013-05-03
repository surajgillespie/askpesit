 <h2>Create a Poll</h2>
<?
echo $form->create('Poll',array('action'=>'create'));
echo $form->input('title');
echo $form->input('content');
echo $form->input('option1');
echo $form->input('option2');
echo $form->input('option3');
echo $form->input('option4');
echo $form->end('Create a poll');
?>
