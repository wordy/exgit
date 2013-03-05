<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('View By Group'); ?></legend>
	<?php
	    echo $this->Form->input('groups', $groups);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Etypes'), array('controller' => 'etypes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Etype'), array('controller' => 'etypes', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Events Groups'), array('controller' => 'events_groups', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Events Group'), array('controller' => 'events_groups', 'action' => 'add')); ?> </li>
    </ul>
</div>


<div class="events index">
    <h2><?php echo __('Events'); ?></h2>
<?php if (empty($events)){ echo h("No events found. Select group from above list.");} else{?>

	<table cellpadding="0" cellspacing="0">
	<tr>
		<th>eID</th>
		<th>Type</th>
		<th>pID</th>
		<th>Start</th>
		<th>End</th>
		<th>Desc</th>
		<th>Comment</th>
		<th>Private</th>
		<th>Active</th>
		<th>Actions</th>
	</tr>
	
	<?php 

	foreach ($events as $event): ?>
	<tr>
		<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($event['Etype']['type'], array('controller' => 'etypes', 'action' => 'view', $event['Etype']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($event['Plan']['name'], array('controller' => 'plans', 'action' => 'view', $event['Plan']['id'])); ?>
		</td>
		<td><?php echo h($this->Time->format('n/d g:i:sA',$event['Event']['stime'])); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('n/d g:i:sA',$event['Event']['etime'])); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['description']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['comment']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['private']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller' =>'events', 'action' => 'view', $event['Event']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
		</td>
	</tr>
<?php endforeach; } ?>
	</table>
	<p>
</p>

</div>

