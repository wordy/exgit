<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {


//GIT
    public $helpers = array('Common','Time','Html');
/**
 * index method
 *
 * @return void
 */
    public function view_events() {
        
        $tobc = array('PriLink.Etype','SecLink.Etype','Plan.Team','PriLink.PriTeam','PriLink.SecTeam','PriLink.Event','SecLink.PriTeam','SecLink.SecTeam','SecLink.Event');
        $this->paginate = array(
            'contain'=>$tobc, 'order'=>'Event.id DESC');
        
        //$options = array('contain'=>$tobc,'conditions' => array('Event.' . $this->Event->primaryKey => $id));
        //$this->set('event', $this->Event->find('list', array('contain'=>$tobc)));
        $this->set('events', $this->paginate('Event'));
    }
 
    public function index() {
        $this->Event->recursive = 0;
        $this->paginate = array('order'=>'Event.id DESC');
        $this->set('events', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $tobc = array('PriLink.Etype','SecLink.Etype','Plan.Team','PriLink.PriTeam','PriLink.SecTeam','PriLink.Event','SecLink.PriTeam','SecLink.SecTeam','SecLink.Event');
        $options = array('contain'=>$tobc,'conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
    }

    public function view_ORIG($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $options = array('recursive'=>2,'conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
    } 

/**
 * add method
 *
 * @return void
 */
 
 public function test1($eid){
     
     $r = $this->Event->findById($eid);
     $o_stime = $r['Event']['stime'];
     
     
     
     $this->set('events',$r);
     $this->set('events2',$this->Event->find('list', array(
        //'fields'=>array('Event.id'),
        'conditions'=>array(
            'Event.id'=>$eid))));
     
     $this->render('debug');
     
 }
 
 public function add() {
        if ($this->request->is('post')) {
            $this->log($this->request->data,'debug');
            $priteam = $this->request->data['PriLink']['pri_team_id'];
            $secteams = $this->request->data['PriLink']['sec_team_id'];
            $etype = $this->request->data['PriLink']['etype_id'];
            
            // Check if plan_id is active team's plan... if so, make the linkage active
            if ($this->Event->Plan->isActive($this->request->data['Event']['plan_id'])){
                $linkactive = 1;
            }
            
            else { $linkactive = 0;}
            
            
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                
                $event_id = $this->Event->id;

                foreach ($secteams as $key => $gid) {
                    $secdata['PriLink'] = array();
                    $this->Event->PriLink->create();
                    $secdata['event_id']=$event_id;
                    $secdata['pri_team_id']=$priteam;
                    $secdata['sec_team_id']=$gid;
                    $secdata['active']=$linkactive;
                    $secdata['etype_id']=$etype;
                    
                    $this->Event->PriLink->save($secdata);            
                
                }
                
                
                $this->Session->setFlash(__('The event has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        }
        $plans = $this->Event->Plan->find('list');
        $teams = $this->Event->PriLink->PriTeam->find('list');
        $etypes = $this->Event->PriLink->Etype->find('list');
        $this->set(compact('plans','teams','etypes'));
    }
 
 
    public function add_ORIG() {
        if ($this->request->is('post')) {
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        }
        $plans = $this->Event->Plan->find('list');
        $this->set(compact('plans'));
    }

public function getsel($eventid){
    $this->set('events', $this->Event->PriLink->getSelectedTeams($eventid));
    $this->render('debug');
}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        
        /*TODO: check sec teams coming in
         * compare to list of current event sec teams
         * logic to add/delete sec teams
         * 
         * */
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
            $this->request->data = $this->Event->find('first', $options);
        }
        
        
        
        $plans = $this->Event->Plan->find('list');
        $teams = $this->Event->PriLink->PriTeam->find('list');
        $selectedteams = $this->Event->PriLink->getSelectedTeams($id);
        $this->set(compact('plans','teams','selectedteams'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Event->delete()) {
            $this->Session->setFlash(__('Event deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Event was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Event->recursive = 0;
        $this->set('events', $this->paginate());
    }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        }
        $plans = $this->Event->Plan->find('list');
        $this->set(compact('plans'));
    }

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
            $this->request->data = $this->Event->find('first', $options);
        }
        $plans = $this->Event->Plan->find('list');
        $this->set(compact('plans'));
    }

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
    public function admin_delete($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Event->delete()) {
            $this->Session->setFlash(__('Event deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Event was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
