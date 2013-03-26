<div class="ltypes form">
<?php echo $this->Form->create('Ltype'); ?>
	<fieldset>
		<legend><?php echo __('Edit Linkage Type'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ltype.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ltype.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Link Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Linkages'), array('controller' => 'events_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Linkage'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
