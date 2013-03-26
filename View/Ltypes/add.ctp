<div class="ltypes form">
<?php echo $this->Form->create('Ltype'); ?>
	<fieldset>
		<legend><?php echo __('Add Link Type'); ?></legend>
	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Link Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Linkages'), array('controller' => 'events_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Linkage'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
