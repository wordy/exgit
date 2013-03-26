<div class="groups view">
<h2><?php  echo __('Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($group['Group']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastversion'); ?></dt>
		<dd>
			<?php echo h($group['Group']['lastversion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group'), array('action' => 'delete', $group['Group']['id']), null, __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Groups'), array('controller' => 'events_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prievents'), array('controller' => 'events_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Plans'); ?></h3>
	<?php if (!empty($group['Plan'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Plan Num'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['Plan'] as $plan): ?>
		<tr>
			<td><?php echo $plan['id']; ?></td>
			<td><?php echo $plan['name']; ?></td>
			<td><?php echo $plan['group_id']; ?></td>
			<td><?php echo $plan['plan_num']; ?></td>
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
	<h3><?php echo __('Related Events Groups'); ?></h3>
	<?php if (!empty($group['Prievents'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Prigroup Id'); ?></th>
		<th><?php echo __('Secgroup Id'); ?></th>
		<th><?php echo __('Linked Eventsgroup Id'); ?></th>
		<th><?php echo __('Etype Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['Prievents'] as $prievents): ?>
		<tr>
			<td><?php echo $prievents['id']; ?></td>
			<td><?php echo $prievents['event_id']; ?></td>
			<td><?php echo $prievents['prigroup_id']; ?></td>
			<td><?php echo $prievents['secgroup_id']; ?></td>
			<td><?php echo $prievents['linked_eventsgroup_id']; ?></td>
			<td><?php echo $prievents['ltype_id']; ?></td>
			<td><?php echo $prievents['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events_groups', 'action' => 'view', $prievents['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events_groups', 'action' => 'edit', $prievents['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events_groups', 'action' => 'delete', $prievents['id']), null, __('Are you sure you want to delete # %s?', $prievents['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Prievents'), array('controller' => 'events_groups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Events Groups'); ?></h3>
	<?php if (!empty($group['Secevents'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Prigroup Id'); ?></th>
		<th><?php echo __('Secgroup Id'); ?></th>
		<th><?php echo __('Linked Eventsgroup Id'); ?></th>
		<th><?php echo __('Etype Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['Secevents'] as $secevents): ?>
		<tr>
			<td><?php echo $secevents['id']; ?></td>
			<td><?php echo $secevents['event_id']; ?></td>
			<td><?php echo $secevents['prigroup_id']; ?></td>
			<td><?php echo $secevents['secgroup_id']; ?></td>
			<td><?php echo $secevents['linked_eventsgroup_id']; ?></td>
			<td><?php echo $secevents['ltype_id']; ?></td>
			<td><?php echo $secevents['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events_groups', 'action' => 'view', $secevents['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events_groups', 'action' => 'edit', $secevents['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events_groups', 'action' => 'delete', $secevents['id']), null, __('Are you sure you want to delete # %s?', $secevents['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Secevents'), array('controller' => 'events_groups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
