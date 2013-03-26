<div class="eventsTeams form">
<?php echo $this->Form->create('EventsTeam'); ?>
	<fieldset>
		<legend><?php echo __('Edit Events Team'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('pri_team_id');
		echo $this->Form->input('sec_team_id');
		
        echo $this->Form->input('linked_event_id',array('empty' => ''));
		echo $this->Form->input('ltype_id');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EventsTeam.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EventsTeam.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Events Teams'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pri Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Etypes'), array('controller' => 'ltypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Etype'), array('controller' => 'ltypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
