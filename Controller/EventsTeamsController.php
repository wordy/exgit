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
	public function index() {
		$this->EventsTeam->recursive = 0;
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
}
