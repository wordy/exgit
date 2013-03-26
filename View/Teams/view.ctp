<div class="teams view">
<h2><?php  echo __('Team'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($team['Team']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($team['Team']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($team['Team']['code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Team'), array('action' => 'edit', $team['Team']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Team'), array('action' => 'delete', $team['Team']['id']), null, __('Are you sure you want to delete # %s?', $team['Team']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Active Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Teams'), array('controller' => 'events_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pri Events'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Plans'); ?></h3>
	<?php if (!empty($team['ActivePlan'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $team['ActivePlan']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
	<?php echo $team['ActivePlan']['name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Team Id'); ?></dt>
		<dd>
	<?php echo $team['ActivePlan']['team_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Plan Num'); ?></dt>
		<dd>
	<?php echo $team['ActivePlan']['plan_num']; ?>
&nbsp;</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
	<?php echo $team['ActivePlan']['active']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $team['ActivePlan']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $team['ActivePlan']['modified']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Active Plan'), array('controller' => 'plans', 'action' => 'edit', $team['ActivePlan']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Plans'); ?></h3>
	<?php if (!empty($team['Plan'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Plan Num'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['Plan'] as $plan): ?>
		<tr>
			<td><?php echo $plan['id']; ?></td>
			<td><?php echo $plan['name']; ?></td>
			<td><?php echo $plan['team_id']; ?></td>
			<td><?php echo $plan['plan_num']; ?></td>
			<td><?php echo $plan['active']; ?></td>
			<td><?php echo $plan['created']; ?></td>
			<td><?php echo $plan['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'plans', 'action' => 'view', $plan['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'plans', 'action' => 'edit', $plan['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'plans', 'action' => 'delete', $plan['id']), null, __('Are you sure you want to delete # %s?', $plan['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Events Teams'); ?></h3>
	<?php if (!empty($team['PriEvents'])): ?>
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
		foreach ($team['PriEvents'] as $priEvents): ?>
		<tr>
			<td><?php echo $priEvents['id']; ?></td>
			<td><?php echo $priEvents['event_id']; ?></td>
			<td><?php echo $priEvents['pri_team_id']; ?></td>
			<td><?php echo $priEvents['sec_team_id']; ?></td>
			<td><?php echo $priEvents['linked_event_id']; ?></td>
			<td><?php echo $priEvents['ltype_id']; ?></td>
			<td><?php echo $priEvents['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events_teams', 'action' => 'view', $priEvents['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events_teams', 'action' => 'edit', $priEvents['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events_teams', 'action' => 'delete', $priEvents['id']), null, __('Are you sure you want to delete # %s?', $priEvents['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pri Events'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Events Teams'); ?></h3>
	<?php if (!empty($team['SecEvents'])): ?>
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
		foreach ($team['SecEvents'] as $secEvents): ?>
		<tr>
			<td><?php echo $secEvents['id']; ?></td>
			<td><?php echo $secEvents['event_id']; ?></td>
			<td><?php echo $secEvents['pri_team_id']; ?></td>
			<td><?php echo $secEvents['sec_team_id']; ?></td>
			<td><?php echo $secEvents['linked_event_id']; ?></td>
			<td><?php echo $secEvents['ltype_id']; ?></td>
			<td><?php echo $secEvents['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events_teams', 'action' => 'view', $secEvents['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events_teams', 'action' => 'edit', $secEvents['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events_teams', 'action' => 'delete', $secEvents['id']), null, __('Are you sure you want to delete # %s?', $secEvents['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sec Events'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
