<?php
class Choice extends AppModel {
	var $name = 'Choice';
	var $helpers = array('Javascript', 'Time', 'Cache', 'Thumbnail', 'Recaptcha', 'Session');
	var $validate = array();
	
	var $belongsTo = array(
		'Poll' => array(
			'className' => 'Poll',
			'foreignKey' => 'poll_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'PollAnswer' => array(
			'className' => 'Pollanswer',
			'foreignKey' => 'choice_id',
			'dependent' => false,
            'counterCache'=>true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	 public function record($option,$poll_id) {
        $this->create();
        $this->data['Choice']['name'] = $option;
        $this->data['Choice']['poll_id'] = $poll_id;
        $this->data['Choice']['created'] = time();
		$this->data['Choice']['modified'] = time();
        $this->save($this->data);
    }
	

}
?>
