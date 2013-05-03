<?php
class Pollanswer extends AppModel {
	var $name = 'Pollanswer';
	var $useTable = 'pollanswers';
	var $validate = array();


	var $belongsTo = array(
		'User' => array(
				'className' => 'User',
				'foreignKey' => 'user_id',
				'fields' => array('User.username', 'User.public_key', 'User.reputation', 'User.image')
		)
	);
}
?>
