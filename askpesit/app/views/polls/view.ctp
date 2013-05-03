<!--<? if(!empty( $poll))print_r( $poll);?><br><br><br>-->
<h3><? if(!empty( $police))  echo $police; ?></h3>


<? if(!empty($poll)){?>


<h2><?php echo $poll['Poll']['title'];?></h2>

<? if($poll['Poll']['user_id'] == $session->read('Auth.User.id') && $poll['Poll']['status'] != 'closed') {?>
				<div class="checkmark">
					<?=$html->link(
							'',
							'/polls/close'.'/'.$poll['Poll']['id']
						);
					?>
				</div>
				<? } if($poll['Poll']['status'] == 'closed') {
					echo $html->image('checkmark_green.png');
				} ?>
 <?=$html->link(
					$poll['User']['username'],
					'/users/' . $poll['User']['public_key'] . '/' . $poll['User']['username']
				);
			?>
 <?php echo $html->link( $thumbnail->get(array(
						        'save_path' => WWW_ROOT . 'img/thumbs',
						        'display_path' => $this->webroot.  'img/thumbs',
						        'error_image_path' => $this->webroot. 'img/answerAvatar.png',
						        'src' => WWW_ROOT .  $poll['User']['image'],
						        'w' => 25,
								'h' => 25,
								'q' => 100,
		                        'alt' => $poll['User']['username'] . 'picture' )
			),'/users/' .$poll['User']['public_key'].'/'.$poll['User']['username'], array('escape' => false));?>
<?php echo $this->Form->create('Poll', array('action'=>'add'));?>
            <?php echo $this->Form->hidden('poll_id', array('value'=>$poll['Poll']['id']));?>
                <table cellpadding = "0" cellspacing = "0">        
                <?php
                    $i = 0;
                    foreach ($poll['Choice'] as $choice):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                    ?>
                    <tr<?php echo $class;?>>
						
                        <td><?if(($poll['Poll']['status'] != 'closed')&&(!isset($police))){?>
							<?php echo $this->Form->radio('choice_id', array($choice['id']=>$choice['name']), array('hiddenField'=>false, 'legend'=>false));?>
							<?}else{?>
							<?echo $choice['name'];?>
							<?}?>
							
						</td>
						<td><?if($poll['Poll']['status'] == 'closed'){?>
							<?echo $choice['answer_count'];?>
							<?}?>
						</td>                
                    </tr>
                <?php endforeach; ?>
                </table>
                
               <?if((!isset($police))&&($poll['Poll']['status'] != 'closed')){?>
                <div class="submit">
                    <?php echo $this->Form->submit('Submit', array('div'=>false));?>
                    &nbsp;
                   
                </div><?}?>
                
                
            <?php echo $this->Form->end();?>
<?}?>
