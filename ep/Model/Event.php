<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property Plan $Plan
 * @property EventsTeam $EventsTeam
 */
class Event extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
		'PriLink' => array(
			'className' => 'EventsTeam',
			'foreignKey' => 'event_id',
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
	
        'SecLink' => array(
            'className' => 'EventsTeam',
            'foreignKey' => 'linked_event_id',
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
    
    //returns 0-index array, for use in Form Helper
    public function getSelectedTeams($eventid){
        $event = $this->findById($eventid);
        $priteam = $event['Event.Plan.Team.id'];
        $this->debug($priteam);
        $rel_teams = $this->PriLink->find('list', array(
            'conditions'=>array(
                'PriLink.event_id'=>$eventid,
                )));
        return $rel_teams;
    }


}
