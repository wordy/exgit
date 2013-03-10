<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {

    public $helpers = array('Common', 'Time', 'Html');
    /**
     * index method
     *
     * @return void
     */
    public function debug_req() {
        $this -> render('debug_req');

    }

    public function view_events() {

        $tobc = array('PriLink.Etype', 'SecLink.Etype', 'Plan.Team', 'PriLink.PriTeam', 'PriLink.SecTeam', 'PriLink.Event', 'SecLink.PriTeam', 'SecLink.SecTeam', 'SecLink.Event');
        $this -> paginate = array('contain' => $tobc, 'order' => 'Event.id DESC');

        //$options = array('contain'=>$tobc,'conditions' => array('Event.' . $this->Event->primaryKey => $id));
        //$this->set('event', $this->Event->find('list', array('contain'=>$tobc)));
        $this -> set('events', $this -> paginate('Event'));
    }

    public function index() {
        $this -> Event -> recursive = 0;
        $this -> paginate = array('order' => 'Event.id DESC');
        $this -> set('events', $this -> paginate());
        $this->render('index2');
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this -> Event -> exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $tobc = array('PriLink.Etype', 'SecLink.Etype', 'Plan.Team', 'PriLink.PriTeam', 'PriLink.SecTeam', 'PriLink.Event', 'SecLink.PriTeam', 'SecLink.SecTeam', 'SecLink.Event');
        $options = array('contain' => $tobc, 'conditions' => array('Event.' . $this -> Event -> primaryKey => $id));
        $this -> set('event', $this -> Event -> find('first', $options));
    }

    public function view_ORIG($id = null) {
        if (!$this -> Event -> exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $options = array('recursive' => 2, 'conditions' => array('Event.' . $this -> Event -> primaryKey => $id));
        $this -> set('event', $this -> Event -> find('first', $options));
    }

    public function viewByPlan($planid = null) {
        if (!$this->Event->Plan->exists($planid)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $tobc = array(
            'PriLink'=>array(
                'Etype',
                'PriTeam',
                'SecTeam',
                'Event'=>array(
                    'conditions'=>array(
                        'plan_id'=>$planid))),
            'SecLink'=>array(
                'Etype',
                'PriTeam',
                'SecTeam',
                'Event'),
            'Plan'=>array( 
                'Team',
                'fields'=>array('id','name','team_id','active')), 
            );
        $options = array(
            'contain' => $tobc,
            'fields'=>array(
                'id','plan_id','stime','etime','description','comment','private','active')
            );
       // $this -> set('events', $this -> Event -> paginate('Events', $options));
        $this -> set('events', $this -> Event -> find('all', $options));
        $this->render('view_by_plan');
    }



    /**
     * add method
     *
     * @return void
     */

    public function test1($eid) {

        $r = $this -> Event -> findById($eid);
        $o_stime = $r['Event']['stime'];

        $this -> set('events', $r);
        $this -> set('events2', $this -> Event -> find('list', array(
        //'fields'=>array('Event.id'),
        'conditions' => array('Event.id' => $eid))));

        $this -> render('debug');

    }

    public function add() {
        if ($this -> request -> is('post')) {
            $priteam = $this -> request -> data['Event']['PriTeam'];
            $secteams = $this -> request -> data['Event']['SecTeam'];
            $etype = $this -> request -> data['PriLink']['etype_id'];

            // Check if plan_id is active team's plan... if so, make the linkage active
            if ($this -> Event -> Plan -> isActive($this -> request -> data['Event']['plan_id'])) {
                $linkactive = 1;} 
            else { $linkactive = 0; }

            $this -> Event -> create();
            if ($this -> Event -> save($this -> request -> data)) {
                $event_id = $this -> Event -> id;

                foreach ($secteams as $key => $gid) {
                    $secdata['PriLink'] = array();
                    
                    $this -> Event -> PriLink -> create();
                    
                    $secdata['event_id'] = $event_id;
                    $secdata['pri_team_id'] = $priteam;
                    $secdata['sec_team_id'] = $gid;
                    $secdata['active'] = $linkactive;
                    $secdata['etype_id'] = $etype;

                    $this -> Event -> PriLink -> save($secdata);

                }

                $this -> Session -> setFlash(__('The event has been saved'));
                $this -> redirect(array('action' => 'index'));
            } else {
                $this -> Session -> setFlash(__('The event could not be saved. Please, try again.'));
            }
        }

        //Not posting data to be saved, must want to enter a new event...
        
        //TODO: $tid = $this->session('tid').  if isset($tid){ find('list', array('team_id'=>$tid))} else{find('list')}
        // or better yet, keep current editing plan in session, only allow them to add to it
        
        $plans = $this -> Event -> Plan -> find('list');
        $teams = $this -> Event -> PriLink -> PriTeam -> find('list');
        $etypes = $this -> Event -> PriLink -> Etype -> find('list');
        $this -> set(compact('plans', 'teams', 'etypes'));
    }

    public function add_ORIG() {
        if ($this -> request -> is('post')) {
            $this -> Event -> create();
            if ($this -> Event -> save($this -> request -> data)) {
                $this -> Session -> setFlash(__('The event has been saved'));
                $this -> redirect(array('action' => 'index'));
            } else {
                $this -> Session -> setFlash(__('The event could not be saved. Please, try again.'));
            }
        }
        $plans = $this -> Event -> Plan -> find('list');
        $this -> set(compact('plans'));
    }

    public function getsel($eventid) {
        $this -> set('events', $this -> Event -> PriLink -> getSelectedTeams($eventid));
        $this -> render('debug');
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        //TODO: not saving changes in etype

        if (!$this -> Event -> exists($id)) {
            throw new NotFoundException(__('Invalid event'));
            //TODO: better error messages
            $this -> Session -> setFlash(__('The event could not be saved. Please, try again.'));

            //$this -> redirect($this -> referer());
        }

        if ($this -> request -> is('post') || $this -> request -> is('put')) {

            if ($this -> Event -> Plan -> isActive($this -> request -> data['Event']['plan_id'])) {
                $linkactive = 1;
            } else { $linkactive = 0;
            }

            $etype = $this -> request -> data['PriLink']['etype_id'];
            $new_seclinks = $this -> request -> data['PriLink']['SecTeam'];
            $old_seclinks = $this -> Event -> PriLink -> getSelectedTeams($id);

            //awesome function
            $toadd = array_diff($new_seclinks, $old_seclinks);
            $todel = array_diff($old_seclinks, $new_seclinks);

            

            if ($this -> Event -> save($this -> request -> data)) {
                //eek
                
                $event_id = $this -> Event -> id;

            if (!empty($toadd)) {
                foreach ($toadd as $key => $gid) {
                    $secdata['PriLink'] = array();
                    $this -> Event -> PriLink -> create();
                    $secdata['event_id'] = $id;
                    $secdata['pri_team_id'] = $this -> data['Plan']['team_id'];
                    $secdata['sec_team_id'] = $gid;
                    $secdata['active'] = $linkactive;
                    $secdata['etype_id'] = $etype;

                    $this -> Event -> PriLink -> save($secdata);
                }
            }

            if (!empty($todel)) {
                // When coming from a priteam..TWO Deletes.. one deletes association from priteam (easy)
                // second one finds linkedevents = this event_id where e_t.sec_team_id = $priteam,e_t.pri_team_id=$secteam
                // and removes linked_event_id

                
                
                $del_link1 = $this -> Event -> PriLink -> find('list', array(
                    'conditions' => array(
                        'event_id' => $id, 
                        'pri_team_id' => $this -> data['Plan']['team_id'], 
                        'sec_team_id' => $todel),
                    'fields' => array(
                        'PriLink.id')));
                $delthis = Hash::extract($del_link1, '{n}');

                foreach ($delthis as $del) {
                    $this -> Event -> PriLink -> delete($del);
                }

                $this -> Event -> PriLink -> updateAll(array('linked_event_id' => 0), array('linked_event_id' => $id, 'pri_team_id' => $todel));

            }
                
                
                
                $this -> Session -> setFlash(__('The event has been saved'));
                $this -> redirect(array('action' => 'index'));
            } else {
                $this -> Session -> setFlash(__('The event could not be saved. Please, try again.'));
            }

        } else {
            $options = array('conditions' => array('Event.' . $this -> Event -> primaryKey => $id));
            $this -> request -> data = $this -> Event -> find('first', $options);
        }

        $plans = $this -> Event -> Plan -> find('list');
        $priTeams = $this -> Event -> PriLink -> PriTeam -> find('list');
        $etypes = $this -> Event -> PriLink -> Etype -> find('list');
        $seletype = $this -> Event -> PriLink -> field('etype_id', array('event_id' => $id));
        $selteams = $this -> Event -> PriLink -> getSelectedTeams($id);
        $this -> set(compact('plans', 'seletype', 'priTeams', 'selteams', 'etypes'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this -> Event -> id = $id;
        if (!$this -> Event -> exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this -> request -> onlyAllow('post', 'delete');
        if ($this -> Event -> delete()) {
            $this -> Session -> setFlash(__('Event deleted'));
            $this -> redirect(array('action' => 'index'));
        }
        $this -> Session -> setFlash(__('Event was not deleted'));
        $this -> redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this -> Event -> recursive = 0;
        $this -> set('events', $this -> paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this -> Event -> exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $options = array('conditions' => array('Event.' . $this -> Event -> primaryKey => $id));
        $this -> set('event', $this -> Event -> find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this -> request -> is('post')) {
            $this -> Event -> create();
            if ($this -> Event -> save($this -> request -> data)) {
                $this -> Session -> setFlash(__('The event has been saved'));
                $this -> redirect(array('action' => 'index'));
            } else {
                $this -> Session -> setFlash(__('The event could not be saved. Please, try again.'));
            }
        }
        $plans = $this -> Event -> Plan -> find('list');
        $this -> set(compact('plans'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this -> Event -> exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this -> request -> is('post') || $this -> request -> is('put')) {
            if ($this -> Event -> save($this -> request -> data)) {
                $this -> Session -> setFlash(__('The event has been saved'));
                $this -> redirect(array('action' => 'index'));
            } else {
                $this -> Session -> setFlash(__('The event could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Event.' . $this -> Event -> primaryKey => $id));
            $this -> request -> data = $this -> Event -> find('first', $options);
        }
        $plans = $this -> Event -> Plan -> find('list');
        $this -> set(compact('plans'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this -> Event -> id = $id;
        if (!$this -> Event -> exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this -> request -> onlyAllow('post', 'delete');
        if ($this -> Event -> delete()) {
            $this -> Session -> setFlash(__('Event deleted'));
            $this -> redirect(array('action' => 'index'));
        }
        $this -> Session -> setFlash(__('Event was not deleted'));
        $this -> redirect(array('action' => 'index'));
    }

    public function getEtypeByEvent($eid) {
        $etype = $this -> Event -> PriLink -> field('etype_id', array('event_id' => $eid));
        $this -> set('out1', $etype);

        $this -> render('/events/debug_req');

    }

    public function getteam($event) {

        $this -> set('out1', $this -> Event -> getTidByEid($event));

        $this -> render('debug_req');

    }
    
    public function getsame($event){
        $this->set('out1', $this->Event->getBySameTime($event));
        $this->render('debug_req');
        
    }
    
    public function trycont($eventid){
        
        $stime = $this->Event->getStime($eventid);
     $this->set('out1', $this->Event->trycontain($stime));
     
     $this->render('/events/debug_req');   
        
    }
    
    public function getRel($eid) {
        
        $stime = $this->Event->getStime($eid);
        
        $rs = $this->Event->PriLink->find('all', array(
            'contain'=>array(
                'Event'=>array(
                    'Plan',
                    'conditions'=>array(
                        'Event.stime'=>$stime),
                    'fields'=>array('Event.*'))
                )));
            
        //$etype = $this -> Event -> PriLink -> field('etype_id', array('event_id' => $eid));

         $this -> set('out1', $rs);

        $this -> render('/events/debug_req');

    }

}
