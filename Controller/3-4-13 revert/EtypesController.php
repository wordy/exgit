<?php
App::uses('AppController', 'Controller');
/**
 * Etypes Controller
 *
 * @property Etype $Etype
 */
class EtypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Etype->recursive = 0;
		$this->set('etypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Etype->exists($id)) {
			throw new NotFoundException(__('Invalid etype'));
		}
		$options = array('conditions' => array('Etype.' . $this->Etype->primaryKey => $id));
		$this->set('etype', $this->Etype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Etype->create();
			if ($this->Etype->save($this->request->data)) {
				$this->Session->setFlash(__('The etype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The etype could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Etype->exists($id)) {
			throw new NotFoundException(__('Invalid etype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Etype->save($this->request->data)) {
				$this->Session->setFlash(__('The etype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The etype could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Etype.' . $this->Etype->primaryKey => $id));
			$this->request->data = $this->Etype->find('first', $options);
		}
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
		$this->Etype->id = $id;
		if (!$this->Etype->exists()) {
			throw new NotFoundException(__('Invalid etype'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Etype->delete()) {
			$this->Session->setFlash(__('Etype deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Etype was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
