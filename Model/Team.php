<?php
App::uses('AppModel', 'Model');
/**
 * Team Model
 *
 * @property Plan $Plan
 * @property EventsTeam $PriEvents
 * @property EventsTeam $SecEvents
 */
class Team extends AppModel {

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
		'Plan' => array(
			'className' => 'Plan',
			'foreignKey' => 'team_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PriEvents' => array(
			'className' => 'EventsTeam',
			'foreignKey' => 'pri_team_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SecEvents' => array(
			'className' => 'EventsTeam',
			'foreignKey' => 'sec_team_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
