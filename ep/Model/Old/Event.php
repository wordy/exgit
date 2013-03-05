<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property Etype $Etype
 * @property Plan $Plan
 * @property EventsGroup $EventsGroup
 */
class Event extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
	public $actsAs = array('Containable');


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Etype' => array(
			'className' => 'Etype',
			'foreignKey' => 'etype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Plan' => array(
			'className' => 'Plan',
			'foreignKey' => 'plan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EventsGroup' => array(
			'className' => 'EventsGroup',
			'foreignKey' => 'event_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
			
		)
	);

}
