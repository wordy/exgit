<?php
App::uses('AppModel', 'Model');
/**
 * Plan Model
 *
 * @property Team $Team
 * @property Event $Event
 */
class Plan extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'name';
    public $order = "Plan.name ASC";


    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'Team' => array(
            'className' => 'Team',
            'foreignKey' => 'team_id',
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
        'Event' => array(
            'className' => 'Event',
            'foreignKey' => 'plan_id',
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
        
    // Takes either a plan_id or plan_code, and returns true/false if plan is active/inactive    
    public function isActive($plan){
        if(is_numeric($plan)){
            $rs = $this->findById($plan); }
        
        else { $rs = $this->findByCode($plan); }
            if ($rs['Plan']['active']==1) {
                return true; }
            else{ return false;}
        }

        
        
    


}
