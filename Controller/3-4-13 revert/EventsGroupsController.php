<?php
App::uses('AppController', 'Controller');
/**
 * EventsGroups Controller
 *
 * @property EventsGroup $EventsGroup
 */
class EventsGroupsController extends AppController {
    
    public $paginate = array('limit'=>60);
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EventsGroup->recursive = 2;
		$this->set('eventsGroups', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EventsGroup->exists($id)) {
			throw new NotFoundException(__('Invalid events group'));
		}
		//$options = array('conditions' => array('EventsGroup.' . $this->EventsGroup->primaryKey => $id));
		$this->set('eventsGroup', $this->EventsGroup->findById($id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventsGroup->create();
			if ($this->EventsGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The events group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events group could not be saved. Please, try again.'));
			}
		}
		$events = $this->EventsGroup->Event->find('list');
		$prigroups = $this->EventsGroup->Prigroup->find('list');
		$secgroups = $this->EventsGroup->Secgroup->find('list');
        $etypes = $this->EventsGroup->Etype->find('list');
		$this->set(compact('events', 'prigroups', 'secgroups','etypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventsGroup->exists($id)) {
			throw new NotFoundException(__('Invalid events group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EventsGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The events group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The events group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EventsGroup.' . $this->EventsGroup->primaryKey => $id));
			$this->request->data = $this->EventsGroup->find('first', $options);
		}
		$events = $this->EventsGroup->Event->find('list');
		$prigroups = $this->EventsGroup->Prigroup->find('list');
		$secgroups = $this->EventsGroup->Secgroup->find('list');
        $etypes = $this->EventsGroup->Etype->find('list');
        $this->set(compact('events', 'prigroups', 'secgroups','etypes'));
		
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
		$this->EventsGroup->id = $id;
		if (!$this->EventsGroup->exists()) {
			throw new NotFoundException(__('Invalid events group'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EventsGroup->delete()) {
			$this->Session->setFlash(__('Events group deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Events group was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    
    public function checkass(){
        $sgroup = 4;
        $pgroup = 8;
        $tomatcheid = 88;
            //$this->log('tomatchid'.$tomatcheid,'debug');
            
            // The time of event we're matching
            $match_time = $this->EventsGroup->Event->field('stime', array(
                'id'=>$tomatcheid));
                //$this->log('tomatchtime'.$match_time,'debug');
            
            // Find all reverse relations, get event IDs
            $revevents = $this->EventsGroup->find('list', array(
                'conditions'=>array(
                    'EventsGroup.prigroup_id'=>$sgroup,
                    'EventsGroup.secgroup_id'=>$pgroup),
                'fields'=>array(
                    'EventsGroup.event_id'))); 
            $eids = Hash::extract($revevents, '{n}');      
            
            // Find events 
            $sametime = $this->EventsGroup->Event->find('list', array(
                'conditions'=>array(
                    'Event.id'=>$eids,
                    'Event.stime'=> $match_time),
                'fields'=>array(
                    'Event.id')
                    ));
                $matchedid = Hash::extract($sametime, '{n}');
                $matchedid = $matchedid[0];
                
                //$this->log('matched ids'.$matchedid,'debug');
                $this->set('sqlout', $this->EventsGroup->LastQuery()); // in controller
                    
           // if ($matchedeid){
           //     $this->data['EventsGroup']['linked_event_id']=$matchedid;
                
           // }
            
            $this->set('events',$matchedid);
            $this->log('eids: '. $eids,'debug');
            $this->render('/events/debug');
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
