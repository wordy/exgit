<div class="ltypes view">
<h2><?php  echo __('Ltype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ltype['Ltype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($ltype['Ltype']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($ltype['Ltype']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ltype'), array('action' => 'edit', $ltype['Ltype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ltype'), array('action' => 'delete', $ltype['Ltype']['id']), null, __('Are you sure you want to delete # %s?', $ltype['Ltype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ltypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ltype'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Teams'), array('controller' => 'events_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Team'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Events Teams'); ?></h3>
	<?php if (!empty($ltype['EventsTeam'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Pri Team Id'); ?></th>
		<th><?php echo __('Sec Team Id'); ?></th>
		<th><?php echo __('Linked Event Id'); ?></th>
		<th><?php echo __('Ltype Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ltype['EventsTeam'] as $eventsTeam): ?>
		<tr>
			<td><?php echo $eventsTeam['id']; ?></td>
			<td><?php echo $eventsTeam['event_id']; ?></td>
			<td><?php echo $eventsTeam['pri_team_id']; ?></td>
			<td><?php echo $eventsTeam['sec_team_id']; ?></td>
			<td><?php echo $eventsTeam['linked_event_id']; ?></td>
			<td><?php echo $eventsTeam['ltype_id']; ?></td>
			<td><?php echo $eventsTeam['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events_teams', 'action' => 'view', $eventsTeam['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events_teams', 'action' => 'edit', $eventsTeam['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events_teams', 'action' => 'delete', $eventsTeam['id']), null, __('Are you sure you want to delete # %s?', $eventsTeam['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Events Team'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
