<?php
 class SuggestionsController extends AppController{
 
  var $name='Suggestions'; 
  function index(){
  $this->set('suggestions',$this->Suggestion->find('all'));
  $this->set('title_for_layout','Consider these Suggestions');
  }
 function view($id=NULL){
 $this->set('suggestion',$this->Suggestion->read(NULL,$id));
 }
 
 function add(){
 if(!empty($this->data)){
  if($this->Suggestion->save($this->data)){
   $this->Session->setFlash('Thank you for your suggestion! We will certainly look into it. ');
   $this->redirect('/');
   }
   else{
   $this->Session->setFlash('Suggestion not saved successfully!');
   }
  }$this->set('title_for_layout','Suggest something');
 }
 
 function edit($id=NULL){
 if(empty($this->data)){
 $this->data=$this->Suggestion->read(NULL,$id);
 }
 else{
 if($this->Suggestion->save($this->data)){
 $this->Session->setFlash('Suggestion has been updated!');
   $this->redirect('/');
 }$this->set('title_for_layout','Edit');
 }
 
 }
 
 function delete($id=NULL){
 $this->Suggestion->delete($id);
 $this->Session->setFlash('Suggestion has been deleted!');
 $this->redirect(array('action'=>'index'));
  }
 

 }
