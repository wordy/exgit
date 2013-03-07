<div class="etypes form">
<?php echo $this->Form->create('Etype'); ?>
	<fieldset>
		<legend><?php echo __('Edit Etype'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Etype.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Etype.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Etypes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Events Teams'), array('controller' => 'events_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Team'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
