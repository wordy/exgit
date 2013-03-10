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
    
    //
    
    public function beforeDelete($cascade = true){
        $rs = $this->findById($this->id);
        
        $this->log($rs,'debug');
        $pri_t = $rs['PriLink']['pri_team_id'];
        $sec_t = $rs['PriLink']['sec_team_id'];
        $m_time = $rs['Event']['stime'];
        $link_id = $rs['PriLink']['linked_event_id']; 
        
        if(!empty($link_id)){
            //if association we're deleting has a linked_id, start by removing the to-be deleted association
            // from that linkage
            $this->updateAll(array('linked_event_id'=>0), array(
                'PriLink.event_id'=>$link_id,
                'PriLink.sec_team_id'=>$pri_t,
                'PriLink.pri_team_id'=>$sec_t,
                'PriLink.linked_event_id'=>$this->id));
        }

        return true;
        /*
        $this->Event->find('list', array(
            'conditions'=>array(
                'Event.stime'=>$m_time,
                'PriLink.pri_team_id'=>$sec_t,
                'PriLink.sec_team_id'=>$pri_t),
            'fields'=>array(
                'Event.id')));
        
        if($this->update(array('PriLink.linked_event_id'=>0), array(
            'PriLink.pri_team_id'=>$sec_t,
            'PriLink.sec_team_id'=>$pri_t,
             ))){}
        $this->Event->find('list',array(
            'conditions'=>array(
                ''),
            'fields'=>'Event.id'));
    */}
        
           
              
    public function befSave($options=array()){
        if(!empty($this->data)){
            $steam = $this->data['PriLink']['sec_team_id'];
            $pteam = $this->data['PriLink']['pri_team_id'];
            $eid_to_match = $this->data['PriLink']['event_id'];
            $active = $this->data['PriLink']['active'];
            $l_eid = $this->data['PriLink']['linked_event_id'];
        
            // The time of event we're matching
            $match_time = $this->Event->field('stime', array('id'=>$eid_to_match));
            
            $tobec = array('PriLink','Event','Event.Plan');
            
            $rs= $this->find('list', array('contain'=>$tobec));
            
            return $rs; 


        }
        
    }
    
    // 3/9 edit
    public function beforeSave($options = array()) {
        
            $steam = $this->data['PriLink']['sec_team_id'];
            $pteam = $this->data['PriLink']['pri_team_id'];
            $eid_to_match = $this->data['PriLink']['event_id'];
            
            // The time of event we're matching
            $match_time = $this->Event->field('stime', array(
                'id'=>$eid_to_match));
            
            //TODO: Containable may be able to combine
            //      the next two finds
            
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
        
    return true;
    }
    
    
    public function beforeSave_pre392013($options = array()) {
        // Only activate if there is a secondary team to be saved
        if (!empty($this->data['PriLink']['sec_team_id'])) {
            $steam = $this->data['PriLink']['sec_team_id'];
            $pteam = $this->data['PriLink']['pri_team_id'];
            $eid_to_match = $this->data['PriLink']['event_id'];
            
            // The time of event we're matching
            $match_time = $this->Event->field('stime', array(
                'id'=>$eid_to_match));
            
            //TODO: Containable may be able to combine
            //      the next two finds
            
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
    
    public function getSecTeams($eventid)
    {
        return $this->find('list', array(
            'conditions'=>array(
                'event_id'=>$eventid),
            'fields'=>array(
                'DISTINCT sec_team_id')));
    }
    
    //returns 0-index array, for use in Form Helper
    public function getSelectedTeams($eventid){
        //$this->recursive='2';
        $event = $this->Event->findById($eventid);
        //$this->log($event, 'debug');
        $priteam = $event['Plan']['team_id'];
        //$this->log($priteam, 'debug');
        $rel_teams = $this->find('list', array(
            'conditions'=>array(
                'event_id'=>$eventid,
                ),
            'fields'=>array('sec_team_id')));
            
        $selteams = Hash::extract($rel_teams, '{n}');

        // FormHelper requires $options['Selected'] to be an int list        
        if(!empty($selteams)){
        
        foreach ($selteams as $st) {
            $sts[] = (int) $st;
        }
        return $sts;
        }
        
        else {return null;}
    }
    
   public function trycontain($eventid){
       
       $stime = $this->Event->getSTime($eventid);
       
       //$this->log($stime, 'debug');
        //$tobec = array('PriLink','Event','Event.Plan');
          $tobec = null;  
          
          $tobec2 = array(
          'Event'=>array(
            'conditions'=>array(
                'Event.stime'=>$stime),
            'fields'=>array(
                'Event.*'))
          //'LinkedEvent'
           );
           
            $tobec3 = array(
          'LinkedEvent',
          'Event'
            
           );
           
                //$this->recursive=-1;
                
            
            $rs= $this->find('all', array('recursive'=>2,'conditions'=>array(
                'EventsTeam.event_id'=>$eventid)));
            
            return $rs; 
        
    }      
        
    
}
