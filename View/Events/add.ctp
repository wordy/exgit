<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('plan_id');
		echo $this->Form->input('stime');
		echo $this->Form->input('etime');
		echo $this->Form->input('description');
		echo $this->Form->input('comment');
		echo $this->Form->input('private');
		echo $this->Form->input('active');
		echo $this->Form->input('num_sec_teams');
       
       /*
        * 
        * This shows how to build an input time in the controller, from individual input in view.
        echo $this->Form->input('vlog_in_hours', array('type' => 'select',
    'options' => array_combine(range(0,23), range(0,23)),
));
echo $this->Form->input('vlog_in_minutes', array('type' => 'select',
    'options' => array_combine(range(0,59), range(0,59)),
));
echo $this->Form->input('vlog_in_seconds', array('type' => 'select',
    'options' => array_combine(range(0,59), range(0,59)),
));*/
        
        echo 'Primary Team <br/>';
        echo $this->Form->select('PriTeam', $teams, array('multiple'=>false));
        echo '<br/><br/>';
        echo 'Secondary Team(s) <br/>';
        echo $this->Form->select('SecTeam', $teams, array('multiple'=>true));
        echo $this->Form->input('PriLink.ltype_id', array('multiple'=>false));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Teams'), array('controller' => 'events_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Team'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
