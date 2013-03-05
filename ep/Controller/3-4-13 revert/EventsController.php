<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {
    public $paginate = array('limit'=>60);
/**
 * index method
 *
 * @return void
 */
	public function index() {
	    
		$this->Event->recursive = 2;
		$this->Event->contain('Plan.Group','EventsGroup.Prigroup','EventsGroup.Secgroup');
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
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
 public function add() {
        if ($this->request->is('post')) {
            
            //$this->log($this->request->data,'debug');
            $prigroup=$this->request->data['Event']['PriGroup'];
            $secgroups=$this->request->data['Event']['SecGroups'];
            
            //$this->log($secgroups,'debug');
            $this->Event->create();
            $this->log('posted data: '. print_r($this->request->data),'debug');
            if ($this->Event->save($this->request->data)) {
                //$this->log($this->request->id, 'debug');
                //$this->Session->setFlash(__('The event has been saved'));
                
                $event_id = $this->Event->id;
                //$setsecgroups=array();
                
                
                
                
                
                foreach ($secgroups as $key => $gid) {
                    $secdata['EventsGroup'] = array();
                    $this->Event->EventsGroup->create();
                    $secdata['event_id']=$event_id;
                    $secdata['prigroup_id']=$prigroup;
                    $secdata['secgroup_id']=$gid;
                    //$secdata['active']=xxx;
                    //$secdata['etype_id']=xxx;
                    
                    $this->Event->EventsGroup->save($secdata);            
                
                }
                //$this->log($secdata,'debug');
                
                
                
                
                
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        }
        $plans = $this->Event->Plan->find('list');
        $groups = $this->Event->EventsGroup->Prigroup->find('list');
        //$this->log($groups,'debug');
        $this->set(compact('plans','groups'));
    }
 
 
	public function add_OLD() {
		if ($this->request->is('post')) {
			
            //$this->log($this->request->data,'debug');
			$prigroup=$this->request->data['Event']['PriGroup'];
            $secgroups=$this->request->data['Event']['SecGroups'];
            
            //$this->log($secgroups,'debug');
			$this->Event->create();
            
			if ($this->Event->save($this->request->data)) {
			    //$this->log($this->request->id, 'debug');
				//$this->Session->setFlash(__('The event has been saved'));
                
                $event_id = $this->Event->id;
                //$setsecgroups=array();
                
                
                
                
                
                foreach ($secgroups as $key => $gid) {
                    $secdata['EventsGroup'] = array();
                    $this->Event->EventsGroup->create();
                    $secdata['event_id']=$event_id;
                    $secdata['prigroup_id']=$prigroup;
                    $secdata['secgroup_id']=$gid;
                    //$secdata['active']=xxx;
                    //$secdata['etype_id']=xxx;
                    
                    $this->Event->EventsGroup->save($secdata);            
                
                }
                //$this->log($secdata,'debug');
                
                
                
                
                
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		}
		$plans = $this->Event->Plan->find('list');
        $groups = $this->Event->EventsGroup->Prigroup->find('list');
        //$this->log($groups,'debug');
		$this->set(compact('plans','groups'));
	}

    public function add_ORIG() {
        if ($this->request->is('post')) {
            $this->Event->create();
            $this->log($this->request->data,'debug');
            if ($this->Event->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'));
            }
        }
        $plans = $this->Event->Plan->find('list');
        $groups = $this->Event->EventsGroup->Prigroup->find('list');
        $this->log($groups,'debug');
        $this->set(compact('plans','groups'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
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
        $pgroups = $this->Event->EventsGroup->Prigroup->find('list',array('fields'=>'Prigroup.code'));
        //$sgroups = $this->Event->EventsGroup->Secgroup->find('list',array('recursive'=>2,'conditions'=>array('EventsGroup.event_id'=>$id), 'fields'=>array('Secgroup.code')));
        $sgroups = $this->Event->EventsGroup->find('list', array('recursive'=>2,'conditions'=>array('EventsGroup.event_id'=>$id), 'fields'=>array('Secgroup.id')));
		$this->set('sgroups_list', Hash::extract($sgroups,'{n}'));
		
		$this->set(compact('sgroups_list','plans','pgroups','sgroups'));
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
   
   public function findmatch($eid)
   {
       $this->set('blah', $this->Event->EventsGroup->find('all', array(
        'conditions'=>array(
            'EventsGroup.event_id'=>$eid))));
            
        $match_time = $this->Event->field('stime', array(
                'id'=>$eid));
                
       $matching_events = $this->Event->find('list', array(
            'conditions'=>array(
                'stime'=>$match_time)));
                
       $this->set('events', $matching_events);
            
            
       
       $this->render('debug');
       
   }
    
}
