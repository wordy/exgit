<?php
App::uses('AppController', 'Controller');
/**
 * EventsTeams Controller
 *
 * @property EventsTeam $EventsTeam
 */
class EventsTeamsController extends AppController {

/**
 * index method
 *
 * @return void
 */
 //public $paginate
 
	public function index() {
		$this->EventsTeam->recursive = 0;
        $this->paginate('EventsTeam', array('EventsTeam.id'=>'desc'));
		$this->set('eventsTeams', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EventsTeam->exists($id)) {
			throw new NotFoundException(__('Invalid events team'));
		}
		$options = array('conditions' => array('EventsTeam.' . $this->EventsTeam->primaryKey => $id));
		$this->set('eventsTeam', $this->EventsTeam->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventsTeam->create();
			if ($this->EventsTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The events team has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events team could not be saved. Please, try again.'));
			}
		}
		$events = $this->EventsTeam->Event->find('list');
		$linkedEvents = $this->EventsTeam->LinkedEvent->find('list');
		$priTeams = $this->EventsTeam->PriTeam->find('list');
		$secTeams = $this->EventsTeam->SecTeam->find('list');
		$etypes = $this->EventsTeam->Etype->find('list');
		$this->set(compact('events', 'linkedEvents', 'priTeams', 'secTeams', 'etypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventsTeam->exists($id)) {
			throw new NotFoundException(__('Invalid events team'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EventsTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The events team has been saved'));
				
				//*TODO* temp: 
				$this->redirect(array('controller'=>'events', 'action'=>'index'));
				//$this->redirect(array('action' => 'index'));
                //$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The events team could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EventsTeam.' . $this->EventsTeam->primaryKey => $id));
			$this->request->data = $this->EventsTeam->find('first', $options);
		}
		$events = $this->EventsTeam->Event->find('list');
		$linkedEvents = $this->EventsTeam->LinkedEvent->find('list');
		$priTeams = $this->EventsTeam->PriTeam->find('list');
		$secTeams = $this->EventsTeam->SecTeam->find('list');
		$etypes = $this->EventsTeam->Etype->find('list');
		$this->set(compact('events', 'linkedEvents', 'priTeams', 'secTeams', 'etypes'));
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
		$this->EventsTeam->id = $id;
		if (!$this->EventsTeam->exists()) {
			throw new NotFoundException(__('Invalid events team'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EventsTeam->delete()) {
			$this->Session->setFlash(__('Events team deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Events team was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


    public function getEtypeByEvent($eid){
                    
        
        return $this->EventsTeam->field('etype_id', array('event_id'=>$eid)); 
        
        
    
    }
    //$cascade = true
    public function bdel($id){
        //$rs = $this->PriLink->findById($this->id);
        $rs = $this->PriLink->findById($id);
        $pri_t = $rs['PriLink']['pri_team_id']; //me PRO
        $sec_t = $rs['PriLink']['sec_team_id']; //them CC
        $m_time = $rs['Event']['stime'];
        $l_id = $rs['Event']['linked_event_id'];
        
        if(!empty($l_id)){
        $rev_events = $this->PriLink->Event->find('list',array(
            'conditions'=>array(
                'PriLink.pri_team_id'=>$sec_t, // CC's events
                'PriLink.sec_team_id'=>$pri_t, // have me as sec
                'Event.stime'=>$m_time),       // at same time
            'fields'=>'Event.id'));
        
        if(!empty($rev_events)){
        
        $tochange = Hash::extract($rev_events,'{n}');
        
        
        
        
        }
            
            
        }
         
        
                $this->render('events/debug_req');
        
            }

}