<div class="eventsGroups view">
<h2><?php  echo __('Events Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventsGroup['EventsGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsGroup['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsGroup['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prigroup'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsGroup['Prigroup']['name'], array('controller' => 'groups', 'action' => 'view', $eventsGroup['Prigroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Secgroup'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsGroup['Secgroup']['name'], array('controller' => 'groups', 'action' => 'view', $eventsGroup['Secgroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Linked Eventsgroup Id'); ?></dt>
		<dd>
			<?php echo h($eventsGroup['EventsGroup']['linked_eventsgroup_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Etype Id'); ?></dt>
		<dd>
			<?php echo h($eventsGroup['EventsGroup']['etype_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($eventsGroup['EventsGroup']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Events Group'), array('action' => 'edit', $eventsGroup['EventsGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Events Group'), array('action' => 'delete', $eventsGroup['EventsGroup']['id']), null, __('Are you sure you want to delete # %s?', $eventsGroup['EventsGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Group'), array('action' => 'add')); ?> </li>
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
	<div class="related">
		<h3><?php echo __('Related Events Groups'); ?></h3>
	<?php if (!empty($eventsGroup['LinkedEventsgroup'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $eventsGroup['LinkedEventsgroup']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Event Id'); ?></dt>
		<dd>
	<?php echo $eventsGroup['LinkedEventsgroup']['event_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Prigroup Id'); ?></dt>
		<dd>
	<?php echo $eventsGroup['LinkedEventsgroup']['prigroup_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Secgroup Id'); ?></dt>
		<dd>
	<?php echo $eventsGroup['LinkedEventsgroup']['secgroup_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Linked Eventsgroup Id'); ?></dt>
		<dd>
	<?php echo $eventsGroup['LinkedEventsgroup']['linked_eventsgroup_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Etype Id'); ?></dt>
		<dd>
	<?php echo $eventsGroup['LinkedEventsgroup']['etype_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
	<?php echo $eventsGroup['LinkedEventsgroup']['active']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Linked Eventsgroup'), array('controller' => 'events_groups', 'action' => 'edit', $eventsGroup['LinkedEventsgroup']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php echo __('Related Etypes'); ?></h3>
	<?php if (!empty($eventsGroup['Etype'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $eventsGroup['Etype']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
	<?php echo $eventsGroup['Etype']['type']; ?>
&nbsp;</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
	<?php echo $eventsGroup['Etype']['Description']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Etype'), array('controller' => 'etypes', 'action' => 'edit', $eventsGroup['Etype']['id'])); ?></li>
			</ul>
		</div>
	</div>
	