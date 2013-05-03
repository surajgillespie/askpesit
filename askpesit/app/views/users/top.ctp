 <html>
<h2>Reputed Users </h2>

<table>
  <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Reputation</th>
    </th>
  </tr>
  <?php foreach($users as $user): ?> 
    <tr>
     <td>
		 <?php echo $html->link( $thumbnail->get(array(
						        'save_path' => WWW_ROOT . 'img/thumbs',
						        'display_path' => $this->webroot.  'img/thumbs',
						        'error_image_path' => $this->webroot. 'img/answerAvatar.png',
						        'src' => WWW_ROOT .  $user['User']['image'],
						        'w' => 25,
								'h' => 25,
								'q' => 100,
		                        'alt' => $user['User']['username'] . 'picture' )
			),'/users/' .$user['User']['public_key'].'/'.$user['User']['username'], array('escape' => false));?>
	</td>
	<td>		

		 <?=$html->link(
					$user['User']['username'],
					'/users/' . $user['User']['public_key'] . '/' . $user['User']['username']
				);
			?></td>
     <td><?php echo $user['User']['reputation']; ?></td>
    </tr>
   
  <?php endforeach; ?>
  </table>
   
</html>

 
 
 
