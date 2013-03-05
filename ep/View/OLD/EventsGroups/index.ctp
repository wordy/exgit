<div class="eventsGroups index">
	<h2><?php echo __('Events Groups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('prigroup_id'); ?></th>
			<th><?php echo $this->Paginator->sort('secgroup_id'); ?></th>
			<th><?php echo $this->Paginator->sort('linked_event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('etype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($eventsGroups as $eventsGroup): ?>
	<tr>
		<td><?php echo h($eventsGroup['EventsGroup']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($eventsGroup['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsGroup['Event']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($eventsGroup['Prigroup']['code'], array('controller' => 'groups', 'action' => 'view', $eventsGroup['Prigroup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($eventsGroup['Secgroup']['code'], array('controller' => 'groups', 'action' => 'view', $eventsGroup['Secgroup']['id'])); ?>
		</td>
		<td><?php echo h($eventsGroup['EventsGroup']['linked_event_id']); ?>&nbsp;</td>
		<td><?php echo h($eventsGroup['EventsGroup']['etype_id']); ?>&nbsp;</td>
		<td><?php echo h($eventsGroup['EventsGroup']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $eventsGroup['EventsGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $eventsGroup['EventsGroup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $eventsGroup['EventsGroup']['id']), null, __('Are you sure you want to delete # %s?', $eventsGroup['EventsGroup']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Events Group'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prigroup'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Groups'), array('controller' => 'events_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Linked Eventsgroup'), array('controller' => 'events_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Etypes'), array('controller' => 'etypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Etype'), array('controller' => 'etypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
