<?
class Poll extends AppModel{
	
	var $name ='Poll';
	
	var $belongsTo = array(
			'User' => array(
				'className' => 'User',
				'foreignKey' => 'user_id',
				'fields' => array('User.username', 'User.public_key', 'User.reputation', 'User.image')
			)
		);
		
	var $hasMany = array(
		'Pollanswer' => array(
			'className' => 'Pollanswer',
			'foreignKey' => 'poll_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Choice' => array(
			'className' => 'Choice',
			'foreignKey' => 'poll_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		 'Comment' => array(
	        'className'     => 'Comment',
	        'foreignKey'    => 'related_id',
	        'dependent'=> true
	    )
	);
	
}
?>
	
	
