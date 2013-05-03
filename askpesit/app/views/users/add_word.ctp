<!--<form action="?" method="post">
<input type="text" name="data[Setting][word]" />
<input type="submit" value="Add this word" />
</form>-->

<? 	echo $this->Form->create('User',array('action'=>'add_word'));
	echo $this->Form->input('Setting.word',array('label'=>'Word to be banned','hiddenvalue'=>false));
	echo $this->Form->submit('ADD THIS WORD');
?>

