<?php
App::uses('AppModel', 'Model');
/**
 * EventsTeam Model
 *
 * @property Event $Event
 * @property PriTeam $PriTeam
 * @property SecTeam $SecTeam
 * @property Etype $Etype
 */
class EventsTeam extends AppModel {

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
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'LinkedEvent' => array(
            'className' => 'Event',
            'foreignKey' => 'linked_event_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        
		'PriTeam' => array(
			'className' => 'Team',
			'foreignKey' => 'pri_team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SecTeam' => array(
			'className' => 'Team',
			'foreignKey' => 'sec_team_id',
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
    
               
    
    public function beforeSave($options = array()) {
        // Only activate if there is a secondary team to be saved
        if (!empty($this->data['PriLink']['sec_team_id'])) {
            $steam = $this->data['PriLink']['sec_team_id'];
            $pteam = $this->data['PriLink']['pri_team_id'];
            $eid_to_match = $this->data['PriLink']['event_id'];
            
            // The time of event we're matching
            $match_time = $this->Event->field('stime', array(
                'id'=>$eid_to_match));
            
            // Find all reverse relations, get event IDs
            $revevents = $this->find('list', array(
                'conditions'=>array(
                    'PriLink.pri_team_id'=>$steam,
                    'PriLink.sec_team_id'=>$pteam),
                'fields'=>array(
                    'PriLink.event_id'))); 
            $eids = Hash::extract($revevents, '{n}');      
            
            // Find events 
            $sametime = $this->Event->find('list', array(
                'conditions'=>array(
                    'Event.id'=>$eids,
                    'Event.stime'=> $match_time),
                'fields'=>array(
                    'Event.id')
                    ));
                    

                    
                    
                    
                    
            // Get eid of matched event(s) -- Should only be one.
            // Returns an array, so must pull eid out
            $matchedid = Hash::extract($sametime, '{n}');
                
                
                // Pull eid out, and set it to data to be saved
                if (!empty($matchedid)){
                    $matchedid = $matchedid[0];
                    $this->data['PriLink']['linked_event_id']=$matchedid;
                   
                   //Using updateAll on a single record to avoid having to re-set $this->id before save
                   $this->updateAll(
                   array('linked_event_id'=>$eid_to_match), array(
                        'event_id'=>$matchedid, 
                        'pri_team_id'=>$steam,
                        'sec_team_id'=>$pteam
                        )); 
                }
        }
    return true;
    }
    public function beforeSave_OLD($options = array()) {
        // Only activate if there is a secondary team to be saved
        if (!empty($this->data['PriLink']['sec_team_id'])) {
            $steam = $this->data['PriLink']['sec_team_id'];
            $pteam = $this->data['PriLink']['pri_team_id'];
            $eid_to_match = $this->data['PriLink']['event_id'];
            
            // The time of event we're matching
            $match_time = $this->Event->field('stime', array(
                'id'=>$eid_to_match));
            
            // Find all reverse relations, get event IDs
            $revevents = $this->find('list', array(
                'conditions'=>array(
                    'PriLink.pri_team_id'=>$steam,
                    'PriLink.sec_team_id'=>$pteam),
                'fields'=>array(
                    'PriLink.event_id'))); 
            $eids = Hash::extract($revevents, '{n}');      
            
            // Find events 
            $sametime = $this->Event->find('list', array(
                'conditions'=>array(
                    'Event.id'=>$eids,
                    'Event.stime'=> $match_time),
                'fields'=>array(
                    'Event.id')
                    ));
                    

                    
                    
                    
            // Get eid of matched event(s) -- Should only be one.
            // Returns an array, so must pull eid out
            $matchedid = Hash::extract($sametime, '{n}');
                
                
                // Pull eid out, and set it to data to be saved
                if (!empty($matchedid)){
                    $matchedid = $matchedid[0];
                    $this->data['PriLink']['linked_event_id']=$matchedid;
                   
                   $this->updateAll(array('linked_event_id'=>$eid_to_match), array(
                        'event_id'=>$matchedid, 'pri_team_id'=>$steam)); 
                }
        }
    return true;
    }
    
    
}
