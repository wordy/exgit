<div class="etypes view">
<h2><?php  echo __('Etype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($etype['Etype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($etype['Etype']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($etype['Etype']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Etype'), array('action' => 'edit', $etype['Etype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Etype'), array('action' => 'delete', $etype['Etype']['id']), null, __('Are you sure you want to delete # %s?', $etype['Etype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Etypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Etype'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Teams'), array('controller' => 'events_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Team'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Events Teams'); ?></h3>
	<?php if (!empty($etype['EventsTeam'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Pri Team Id'); ?></th>
		<th><?php echo __('Sec Team Id'); ?></th>
		<th><?php echo __('Linked Event Id'); ?></th>
		<th><?php echo __('Etype Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($etype['EventsTeam'] as $eventsTeam): ?>
		<tr>
			<td><?php echo $eventsTeam['id']; ?></td>
			<td><?php echo $eventsTeam['event_id']; ?></td>
			<td><?php echo $eventsTeam['pri_team_id']; ?></td>
			<td><?php echo $eventsTeam['sec_team_id']; ?></td>
			<td><?php echo $eventsTeam['linked_event_id']; ?></td>
			<td><?php echo $eventsTeam['etype_id']; ?></td>
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
