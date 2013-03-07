<?php

App::uses('AppHelper', 'View/Helper');

class CommonHelper extends AppHelper {
    
    public $helpers = array('Time','Html');
    public function makeEdit($title, $url) {
        // Logic to create specially formatted link goes here...
    }
    
    public function makeEtime($stime, $etime){
        $newstime = $this->Time->format('n/j h:i:s',$stime);
        $newetime = $this->Time->format('H:i:s',$etime);
        //$newtime = CakeTime::format('n/j H:i:s',$etime);
                return $newstime. ' - '. $newetime;
    }
    
    // Used to make a single link to a related event
    public function makeSecTeamLink($pl){
        if(!empty($pl['linked_event_id'])){
            
            
        }
        
    }
    
    public function makeSecTeamList($prilinks){
        // Get events, test if secteams exist, if so, extract them with associated event_id
        // Make link to event
        $plist = array();
        foreach ($prilinks as $pl) {
            
            if (!empty($pl['linked_event_id'])){
            $plist[] =  $this->Html->link($pl['SecTeam']['code'], array('controller'=>'events','action'=>'view', $pl['linked_event_id']
            ),array('escape' => false) ); 
            
            }
            
            else {
                $plist[] = $pl['SecTeam']['code'];
                
            }
            
        }
        
        $plist = implode(', ', $plist);
        //$this->log($plist,'debug');
        return $plist;
        
        
    }
    
}

?>