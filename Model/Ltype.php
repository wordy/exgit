<?php
App::uses('AppModel', 'Model');
/**
 * Ltype Model
 *
 * @property EventsTeam $EventsTeam
 */
class Ltype extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'code';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EventsTeam' => array(
			'className' => 'EventsTeam',
			'foreignKey' => 'ltype_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		));

}
