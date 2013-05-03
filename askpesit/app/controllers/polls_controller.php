<?php
class PollsController extends AppController {

	var $name = 'Polls';
	
	var $uses = array('User','Poll','Pollanswer','History','Setting','Tag','Vote','Widget','Choice');
	var $components = array('Auth', 'Session', 'Markdownify', 'Markdown', 'Cookie', 'Email', 'Recaptcha', 'Htmlfilter');
	var $helpers = array('Javascript', 'Time', 'Cache', 'Thumbnail', 'Recaptcha', 'Session');
	
	
	public function beforeRender() {
		$this->getWidgets();
		$this->underMaintenance();
	}
	
	public function beforeFilter()
    {
		parent::beforeFilter();
        $this->Auth->allow('view', 'index');
    }
	
	public function afterFilter() {
		$this->Session->delete('errors');
	}
	public function add()
	{
		$this->set('hello',$this->data);
		 $yeah;
		if(!empty($this->data)) {
		
		$yeah['choice_id']=$this->data['Poll']['choice_id'];
		$yeah['poll_id']=$this->data['Poll']['poll_id'];
		$yeah['user_id']=$this->Auth->user('id');
		$this->Pollanswer->create();
		if($this->Pollanswer->save($yeah)) { 
			 $this->Session->setFlash('The answer has been saved','success');	
			 	
			 	$chosen=$this->Choice->findById($this->data['Poll']['choice_id']);
			 	if(!empty($chosen)) {
					$incr = array(
					'id' => $chosen['Choice']['id'],
					'answer_count' => $chosen['Choice']['answer_count'] + 1
				);
					$this->Choice->save($incr);
				}
                 
               }
        
		$this->redirect(array('action'=>'index'));
		}
}

	
	
	function close($id = null){
		
		$test=$this->Choice->find('first',array('conditions'=>array('poll_id'=>$id),
													'order'=>array( 'answer_count DESC')
				
														));
		
		$users=$this->Pollanswer->find('all',array('conditions'=>array('poll_id'=>$id,
																	'choice_id'=>$test['Choice']['id'])
									));
			 foreach($users as $lucky)
			 { 	
			 	if(!empty($lucky)) {
					$incr = array(
					'id' => $lucky['Pollanswer']['user_id'],
					'reputation' => $lucky['User']['reputation'] + 5
				);
					$this->User->save($incr);
				}
			}
			
			 $closing = array(
            'id' => $id,
            'status' => 'closed');
            $this->Poll->save($closing);
           	$this->redirect('/polls/view'.'/'.$id);

		
	}

	function view($id = null) {
		$query=$this->Poll->read(null, $id);
		$this->set('poll', $query);
		
		$isvoted=$this->Pollanswer->find('first',array('conditions'=>array('poll_id'=>$id,'user_id'=>$this->Auth->user('id')),
														'fields'=>array('Pollanswer.id')
														)
									);
		if(!empty($isvoted))
		{
			$this->set('police', 'You have already voted wait for the poll to be closed to know the results');
		}
		
		if($query['Poll']['status'] == 'closed')
		{
			$this->set('police', 'poll closed here are the results');
		}
		
		
		/*$this->Poll->unbindModel(array('belongsTo' => array('User')));
		$closed=$this->Poll->find('first',array('conditions'=>array('id'=>$id),
													'fields'=>'status'));
				$this->set('police',$closed);
			
		if($closed['Poll']['status'] == 'closed')
		{
			$this->set('police', 'its closed');
		}
		else{
		
		$isvoted=$this->Pollanswer->find('first',array('conditions'=>array('poll_id'=>$id,'user_id'=>$this->Auth->user('id')),
														'fields'=>array('Pollanswer.id')
														)
									);
		if(!empty($isvoted))
		{
			$this->set('police', 'You have already voted wait for the poll to be closed to know the results');
		}else{
		$this->set('poll', $this->Poll->read(null, $id));
		}
		}*/
	}
	
	public function index()
	{
		  
                   
		//$this->set('users', $this->paginate());
			$this->set('users', $this->Poll->find('all'));
		
	}

	public function create(){
		
		if(!empty($this->data)) {
			
		$this->data['Poll']['status'] = 'open';
		$this->data['Poll']['timestamp'] = time();
		$this->data['Poll']['last_edited_timestamp'] = time();
		$this->data['Poll']['user_id'] = $this->Auth->user('id');
		$this->data['Poll']['url_title'] = 'hello';
		$this->data['Poll']['public_key'] = uniqid();
		$this->Poll->create();
		if($this->Poll->save($this->data)) { 
                 $this->Choice->record($this->data['Poll']['option1'], $this->Poll->id);
                 $this->Choice->record($this->data['Poll']['option2'], $this->Poll->id);
                 $this->Choice->record($this->data['Poll']['option3'], $this->Poll->id);
                 $this->Choice->record($this->data['Poll']['option4'], $this->Poll->id);
             }
        
		$this->redirect('/polls/');
		}
			

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>
