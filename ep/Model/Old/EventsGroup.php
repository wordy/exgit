<?php
App::uses('AppModel', 'Model');
/**
 * EventsGroup Model
 *
 * @property Group $Group
 * @property Event $Event
 */
class EventsGroup extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'group_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'event_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'role' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			// Counter cache stores #of secondary groups for every event in `Events`
			'counterCache' => 'num_sec_groups',
			'counterScope' => array('EventsGroup.role' => 2)
		)
	);
    
    public function getSec($groupid=null){
        $eventids= $this->find('list', array(
            'conditions'=>array(
                'group_id'=>$groupid, 
                'role'=>2),
            'fields' => array('EventsGroup.event_id')));
        
        return Hash::extract($eventids, '{n}');
    }

    public function getPri($groupid=null){
        $eventids= $this->find('list', array(
            'conditions'=>array(
                'group_id'=>$groupid, 
                'role'=>1),
            'fields' => array('EventsGroup.event_id')
                ));
                
                $this->log($eventids,'debug');
        return Hash::extract($eventids, '{n}');
    }
    
    
}
