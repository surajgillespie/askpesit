<?php

class Suggestion extends AppModel{

 var $name= 'Suggestion';
 var $validate=array(
   'title'=> array(
	'title!empty'=>array(
	'rule'=>'notEmpty',
	'message'=>'Title is missing!'
	),
	'titleunique'=>array(
	'rule'=>'isUnique',
	'message'=>'Title already exists!'
	)
      ),
   'body'=>array(
   'body!empty'=>array(
   'rule'=>'notEmpty',
   'message'=>'Body is missing!'
   ) 
  )
 );
 
 }

