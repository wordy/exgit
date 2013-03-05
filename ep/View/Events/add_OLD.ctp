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
        echo 'Primary Group <br/>';
        echo $this->Form->select('PriGroup', $groups, array('multiple'=>false));
        echo '<br/><br/>';
        echo 'Secondary Group(s) <br/>';
        echo $this->Form->select('SecGroups', $groups, array('multiple'=>true));

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
		<li><?php echo $this->Html->link(__('List Events Groups'), array('controller' => 'events_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Group'), array('controller' => 'events_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
