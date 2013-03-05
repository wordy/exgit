<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Edit Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('plan_id');
		echo $this->Form->input('stime');
		echo $this->Form->input('etime');
		echo $this->Form->input('description');
		echo $this->Form->input('comment');
		echo $this->Form->input('private');
		echo $this->Form->input('active');
        
          echo 'sglist'.$sgroups_list[0];
 
        
        foreach ($sgroups_list as $sg) {
            $sgs[] = (int) $sg;
        }
        
       
        
        print_r ($sgs);
        $yourarray=array(6,2);
        echo 'your type: '. gettype($yourarray[0]);
        
        echo 'yourarr-0'.$yourarray[0];

        
        //$sgs=implode(',',$sgs);
         //echo 'sgs:'.$sgs;
         
         echo gettype($sgs[0]);
        
        $selected = $sgs;
        
        //$selected = array(3,6);
		echo $this->Form->input('Event.EventsGroup', array('options'=>$pgroups, 'multiple'=>'checkbox','selected'=>$sgs));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?><pre>
    
    <?php echo '<br/><br/>Pgroup<br><br/>'; print_r($eventsGroups); ?>
    <?php echo '<br/><br/>Pgroup<br><br/>'; print_r($pgroups); ?>
    <?php echo '<br/><br/>Sgroup<br><br/>'; print_r($sgroups); ?>
        <?php echo '<br/><br/>S list<br><br/>'; print_r($sgroups_list); ?>
    </pre>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Event.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Event.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Groups'), array('controller' => 'events_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Group'), array('controller' => 'events_groups', 'action' => 'add')); ?> </li>
	</ul>




</div>