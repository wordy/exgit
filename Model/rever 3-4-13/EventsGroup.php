<?php
App::uses('AppModel', 'Model');
/**
 * EventsGroup Model
 *
 * @property EventsGroup $LinkedEventsgroup
 * @property Etype $Etype
 * @property Event $Event
 * @property Prigroup $Prigroup
 * @property Secgroup $Secgroup
 * @property Etype $Etype
 */
class EventsGroup extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'event_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	

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
		'Prigroup' => array(
			'className' => 'Group',
			'foreignKey' => 'prigroup_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Secgroup' => array(
			'className' => 'Group',
			'foreignKey' => 'secgroup_id',
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
        ));
       
     
        
    public function beforeSave($options = array()) {
        // Only activate if there is a secondary group to be saved
        if (!empty($this->data['EventsGroup']['secgroup_id'])) {
            $sgroup = $this->data['EventsGroup']['secgroup_id'];
            $pgroup = $this->data['EventsGroup']['prigroup_id'];
            $eid_to_match = $this->data['EventsGroup']['event_id'];
            
            // The time of event we're matching
            $match_time = $this->Event->field('stime', array(
                'id'=>$eid_to_match));
            
            // Find all reverse relations, get event IDs
            $revevents = $this->find('list', array(
                'conditions'=>array(
                    'EventsGroup.prigroup_id'=>$sgroup,
                    'EventsGroup.secgroup_id'=>$pgroup),
                'fields'=>array(
                    'EventsGroup.event_id'))); 
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
                    $this->data['EventsGroup']['linked_event_id']=$matchedid;
                    
                  //$id_to_up = $this->field('id', array(
                    //'event_id'=>$matchedid,
                    //'secgroup_id'=>$sgroup)
                      //  );
                    //$this->log($id_to_up, 'debug');
                    
                   //$this->id=$id_to_up; 
                   //$this->saveField('linked_event_id', $eid_to_match);
                   
                   
                   $this->updateAll(array('linked_event_id'=>$eid_to_match), array(
                        'event_id'=>$matchedid, 'prigroup_id'=>$sgroup)); 
                }
                
                //$this->log('matched id: '.$matchedid,'debug');
                
                //$this->log('matched ids'.$matchedid,'debug');
                //$this->log($this->LastQuery()); // in controller
                    
                         
                
                //$this->log('datalog: '.$this->data['EventsGroup'], 'debug');
                
           
            
            
            //$this->log('eids: '. $eids,'debug');
        }
    return true;
    }

    
		
}
