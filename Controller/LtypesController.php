<?php
App::uses('AppController', 'Controller');
/**
 * Ltypes Controller
 *
 * @property Ltype $Ltype
 */
class LtypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ltype->recursive = 0;
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
		if (!$this->Ltype->exists($id)) {
			throw new NotFoundException(__('Invalid etype'));
		}
		$options = array('conditions' => array('Ltype.' . $this->Ltype->primaryKey => $id));
		$this->set('etype', $this->Ltype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ltype->create();
			if ($this->Ltype->save($this->request->data)) {
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
		if (!$this->Ltype->exists($id)) {
			throw new NotFoundException(__('Invalid etype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ltype->save($this->request->data)) {
				$this->Session->setFlash(__('The etype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The etype could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ltype.' . $this->Ltype->primaryKey => $id));
			$this->request->data = $this->Ltype->find('first', $options);
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
		$this->Ltype->id = $id;
		if (!$this->Ltype->exists()) {
			throw new NotFoundException(__('Invalid etype'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ltype->delete()) {
			$this->Session->setFlash(__('Ltype deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ltype was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
