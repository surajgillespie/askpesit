<!--<?print_r($test);?>-->
<fieldset>
	
<?=$form->create('Post', array('action' => 'search'));?>

<?$options=array('recent'=>'RECENT','popular'=>'POPULAR');
  $attributes=array('legend'=>'SEARCH TYPE','separator'=>'<br>','default'=>'recent');
  echo $this->Form->radio('Search.type',$options,$attributes);
?>

<?$options=array('unsolved'=>'UNSOLVED','solved'=>'SOLVED','both'=>'BOTH');
  $attributes=array('legend'=>'SEARCH STATUS','separator'=>'<br>','default'=>'both');
  echo $this->Form->radio('Search.status',$options,$attributes);
?>

<?$options=array('OR'=>'OR','AND'=>'AND');
  $attributes=array('legend'=>'AND OR','separator'=>'<br>','default'=>'OR');
  echo $this->Form->radio('Search.andor',$options,$attributes);
?>

<fieldset>
<legend><?php __('BRANCHES');?></legend>
<?=$form->checkbox('Search.CSIS', array('hiddenField' => false));?>CS AND IS<br>
<?=$form->checkbox('Search.ECTE', array('hiddenField' => false));?>EC AND TE<br>
<?=$form->checkbox('Search.MECH', array('hiddenField' => false));?>MECHANICAL<br>
<?=$form->checkbox('Search.ELECT', array('hiddenField' => false));?>ELECTRICAL<br>
<?=$form->checkbox('Search.BIOT', array('hiddenField' => false));?>BIOTECH<br>
<?=$form->checkbox('Search.SANDH', array('hiddenField' => false));?>SCIENCE AND HUMANITIES<br>
<?=$form->checkbox('Search.MATH', array('hiddenField' => false));?>MATHEMATICS<br>
<?=$form->checkbox('Search.PESIT', array('hiddenField' =>false));?>PESIT<br>
<?=$form->checkbox('Search.PESITEVENTS', array('hiddenField' => false));?>PESIT EVENTS<br>
</fieldset>

<fieldset>
	<?echo $form->input('Search.keywords',array('hiddenField' =>false));?>
</fieldset>

<?=$form->end('submit');?>
</fieldset>

<?if(!empty($questions)){?>

<?php
foreach($questions as $question){ ?>
<div class="list_question wrapper">
	<?php //var_dump($question); die(count($question['Answer'])); ?>
	<div class="wrapper" style="float: left;">
	<div class="list_answers <?= (count($question['Answer']) < 1) ? 'list_answers_unanswered' : 'list_answers_answered';?>">
		<span class="large_text"><?=count($question['Answer']);?></span>
		<span><?php __n('answer','answers',count($question['Answer']))?></span>
	</div>
	<div class="list_views quiet">
		<span class="large_text"><?=$question['Post']['views'];?></span>
		<span><?php __n('view','views',$question['Post']['views']);?></span>
	</div>
	</div>
	
	
	<div class="wrapper list_detail_text">
		<div class="list_title  wrapper">
		<?=$html->link(
				$question['Post']['title'],
				'/questions/' . $question['Post']['public_key'] . '/' . $question['Post']['url_title']
			);
		?>
		</div>
		<div class="wrapper">
			<div style="float: right;">
				<div class="thumb_with_border">
		
				<?php echo $html->link( $thumbnail->get(array(
						        'save_path' => WWW_ROOT . 'img/thumbs',
						        'display_path' => $this->webroot.  'img/thumbs',
						        'error_image_path' => $this->webroot. 'img/answerAvatar.png',
						        'src' => WWW_ROOT .  $question['User']['image'],
						        'w' => 25,
								'h' => 25,
								'q' => 100,
		                        'alt' => $question['User']['username'] . 'picture' )
			),'/users/' .$question['User']['public_key'].'/'.$question['User']['username'], array('escape' => false));?>
				</div>
				<div style="float: left; line-height: .9;">
					<div>
			<?=$html->link(
					$question['User']['username'],
					'/users/' . $question['User']['public_key'] . '/' . $question['User']['username']
				);
			?> 
			<span style="font-size: 8pt;">&#8226;</span>
			<h4 style="display: inline;"><?=$question['User']['reputation'];?></h4>
					</div> 
			<span class="quiet"><?=$time->timeAgoInWords($question['Post']['timestamp']);?></span>
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
		<?echo $question['Post']['CSIS'];
		echo $question['Post']['ECTE'];
		echo $question['Post']['MECH'];
		echo $question['Post']['ELECT'];?>
		<div class="wrapper tags">
		<? foreach($question['Tag'] as $tag) { ?>
			<div class="tag wrapper">
				<?=$html->link(
						$tag['tag'],
						'/tags/' . $tag['tag']
					);
				?>
			</div>
		<?  } ?>
		</div>
	</div>
	
</div>
<? }?> 
<?php

echo $html->div(
  null,
  $paginator->prev(
    '<< Previous',
    array(
      'class' => 'PrevPg'
    ),
    null,
    array(
      'class' => 'PrevPg DisabledPgLk'
    )
  ).
  $paginator->numbers().
  $paginator->next(
    'Next >>',
    array(
      'class' => 'NextPg'
    ),
    null,
    array(
      'class' => 'NextPg DisabledPgLk'
    )
  ),
  array(
    'style' => 'width: 100%;'
  )
);  

?>
<? }?>
