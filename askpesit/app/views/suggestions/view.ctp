<h2><?php echo $suggestion['Suggestion']['title'] ; ?></h2>
<p><?php echo $suggestion['Suggestion']['body']; ?></p>
<p><small>Created on <?php echo $suggestion['Suggestion']['created']; ?></br>Last modified on <?php echo $suggestion['Suggestion']['modified'];?> </small></p>
<br/>

<p>
<?php echo $html->link('Back',array('action'=>'index')); ?>
 <?php //echo $html->link('Edit',array('action'=>'edit',$suggestion['Suggestion']['id'])); ?>
  <?php echo $html->link('Delete',array('action'=>'delete',$suggestion['Suggestion']['id'])); ?>
</p>
