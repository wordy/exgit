<?php
App::uses('AppModel', 'Model');
/**
 * Etype Model
 *
 * @property EventsTeam $EventsTeam
 */
class Etype extends AppModel {

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
			'foreignKey' => 'etype_id',
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
