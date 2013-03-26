<div class="events view">
<h2><?php  echo __('Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ltype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($event['Ltype']['type'], array('controller' => 'ltypes', 'action' => 'view', $event['Ltype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plan'); ?></dt>
		<dd>
			<?php echo $this->Html->link($event['Plan']['name'], array('controller' => 'plans', 'action' => 'view', $event['Plan']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stime'); ?></dt>
		<dd>
			<?php echo h($event['Event']['stime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Etime'); ?></dt>
		<dd>
			<?php echo h($event['Event']['etime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($event['Event']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($event['Event']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Private'); ?></dt>
		<dd>
			<?php echo h($event['Event']['private']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($event['Event']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($event['Event']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($event['Event']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event'), array('action' => 'edit', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ltypes'), array('controller' => 'ltypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ltype'), array('controller' => 'ltypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Groups'), array('controller' => 'events_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Group'), array('controller' => 'events_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Events Groups'); ?></h3>
	<?php if (!empty($event['EventsGroup'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($event['EventsGroup'] as $eventsGroup): ?>
		<tr>
			<td><?php echo $eventsGroup['id']; ?></td>
			<td><?php echo $eventsGroup['group_id']; ?></td>
			<td><?php echo $eventsGroup['event_id']; ?></td>
			<td><?php echo $eventsGroup['role']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events_groups', 'action' => 'view', $eventsGroup['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events_groups', 'action' => 'edit', $eventsGroup['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events_groups', 'action' => 'delete', $eventsGroup['id']), null, __('Are you sure you want to delete # %s?', $eventsGroup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Events Group'), array('controller' => 'events_groups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<?php
		$i = 0;
		foreach ($event['EventsGroup'] as $eventsGroup): 

		if ($eventsGroup['role']==2){
		echo $eventsGroup['Group']['code'];
		}
		endforeach;?>
		
<?php debug($event);?>