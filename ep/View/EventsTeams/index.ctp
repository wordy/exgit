<div class="eventsTeams index">
	<h2><?php echo __('Events Teams'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pri_team_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sec_team_id'); ?></th>
			<th><?php echo $this->Paginator->sort('linked_event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('etype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($eventsTeams as $eventsTeam): ?>
	<tr>
		<td><?php echo h($eventsTeam['EventsTeam']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($eventsTeam['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsTeam['Event']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($eventsTeam['PriTeam']['code'], array('controller' => 'teams', 'action' => 'view', $eventsTeam['PriTeam']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($eventsTeam['SecTeam']['code'], array('controller' => 'teams', 'action' => 'view', $eventsTeam['SecTeam']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($eventsTeam['LinkedEvent']['id'], array('controller' => 'events', 'action' => 'view', $eventsTeam['LinkedEvent']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($eventsTeam['Etype']['code'], array('controller' => 'etypes', 'action' => 'view', $eventsTeam['Etype']['id'])); ?>
		</td>
		<td><?php echo h($eventsTeam['EventsTeam']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $eventsTeam['EventsTeam']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $eventsTeam['EventsTeam']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $eventsTeam['EventsTeam']['id']), null, __('Are you sure you want to delete # %s?', $eventsTeam['EventsTeam']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Events Team'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pri Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Etypes'), array('controller' => 'etypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Etype'), array('controller' => 'etypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
