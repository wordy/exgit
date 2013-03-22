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
		),
		
        'Etype' => array(
            'className' => 'Etype',
            'foreignKey' => 'etype_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
	);

//TODO: create afterFind() to set up potential incoming links

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
    
    public function getSecTeams($eventid){
        
        
    }
    
    public function getStime($eventid){
        $rs = $this->findById($eventid);
        
        $stime = $rs['Event']['stime'];
        
        return $stime;
        
    }
    
    public function getTidByEid($event_id)
    {
        $rs = $this->findById($event_id);
        $tid = $rs['Plan']['team_id'];
        return $tid;
    }

    public function getBySameTime($event_id){
        $matchtime = $this->field('stime',array('id'=>$event_id));
        return $this->find('all', array('conditions'=>array('Event.stime'=>$matchtime)));
    }


public function trycontain($stime){
        //$tobec = array('PriLink','Event','Event.Plan');
          $tobec = null;  
          
          $tobec2 = array(
            'SecLink',
            'PriLink.Event',
           
            'PriLink.PriTeam',
            'PriLink.SecTeam',
            'PriLink'=>array(
                'conditions'=>array()));
          
            $rs= $this->find('all', array('contain'=>$tobec2, 'recursive'=>3, 'conditions'=>array(
                'Event.stime'=>$stime)));
            
            return $rs; 
        
    } 


    //TODO:UNTESTED
    // Takes a list of event_ids, and a start time.  Determines if any of the events given
    // match the start time given
    
    public function getMatchingByStime($eids, $stime)
    {
        $rs = $this->find('list',array(
            'conditions'=>array(
                'Event.id'=>$eid,
                'Event.stime'=>$stime),
            'fields'=>array(
                'Event.id')));
                
        if(!empty($rs)){
            $rev_events = Hash::extract($rs, '{n}');
            return $rev_events;
        }
        else{ return null;}
        
    }









}
