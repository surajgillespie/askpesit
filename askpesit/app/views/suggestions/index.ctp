<html>
<h2> View all Posts</h2>

<table>
  <tr>
    <th>title</th>
    <th>body</th>
    <th>action</th>
  </tr>
  <?php foreach($suggestions as $suggestion): ?> 
    <tr>
     <td><?php echo $html->link($suggestion['Suggestion']['title'],array('action'=>'view',$suggestion['Suggestion']['id'])); ?></td>
     <td><?php echo $suggestion['Suggestion']['body']; ?></td>
     <!--<td><?php echo $html->link('Edit',array('action'=>'edit',$suggestion['Suggestion']['id'])); ?>!-->
	 <td><?php echo $html->link('Delete',array('action'=>'delete',$suggestion['Suggestion']['id']),NULL,'Are You sure you want to delete the Suggestion?'); ?>    
     </td>
    </tr>
   
  <?php endforeach; ?>
  </table>
    
</html>
