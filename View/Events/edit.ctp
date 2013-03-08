<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Edit Event'); ?></legend>
	<?php
	    echo $this->Form->input('Plan.team_id', array('type'=>'hidden','value'=>$this->data['Plan']['team_id']));
		echo $this->Form->input('id');
		echo $this->Form->hidden('plan_id');

        echo $this->Form->input('PriLink.etype_id', array('options'=>$etypes, 'type'=>'select', 'multiple'=>false, 'value'=>$seletype));
        //echo $this->Form->input('PriLink.Etype.id');
		echo $this->Form->input('stime');
		echo $this->Form->input('etime');
		
		echo $this->Form->input('description');
		
		echo $this->Form->input('comment');
		
		echo $this->Form->input('private');
		
		echo $this->Form->input('active', array('type'=>'hidden'));
		//echo $this->Form->input('num_sec_teams');
        //echo $this->Form->input('PriLink.etype_id'), array('options'=>$etypes, 'multiple'=>false, 'type'=>'select');
        //echo $this->Form->input('Etypes'), array('options'=>$etypes, 'multiple'=>false, 'type'=>'select');
        
        //echo $this->Form->input('PriLink.pri_team_id', array('type'=>'hidden'));
        //echo $this->Form->input('PriLink.pri_team_id', array('options'=>$teams, 'multiple'=>false, 'type'=>'select'));
        //echo $this->Form->select('PriLink.sec_team_id', $teams, array('multiple'=>true, 'value'=>$selectedteams));
        echo $this->Form->input('PriLink.SecTeam', array(
         'options'=>$priTeams,
         'type'=>'select',
         'style' => 'display: inline',
         'multiple'=>'checkbox',
         'value'=>$selteams));

 //echo $this->Form->inputs('Team', array('ftp_user','ftp_password'));
 
 
 /*	
	   foreach ($teams as $key=>$val){
	       
           if(!empty($selectedteams)){
                if (in_array($key, $selectedteams)){
	               echo $this->Form->input('PriLink.SecTeam.'.$key, array('checked'=>true, 'type'=>'checkbox','label'=>$val));
                }
                
                echo $this->Form->input('PriLink.SecTeam.'.$key, array('checked'=>false, 'type'=>'checkbox','label'=>$val));
           }
           
           else {
               echo $this->Form->input('PriLink.SecTeam.'.$key, array('checked'=>false, 'type'=>'checkbox','label'=>$val));
               
           }
          
           }
	 */
	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Event.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Event.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Teams'), array('controller' => 'events_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Team'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php //debug($this->data);?>
