<div class="eventsTeams view">
<h2><?php  echo __('Events Team'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventsTeam['EventsTeam']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsTeam['Event']['id'], array('controller' => 'events', 'action' => 'view', $eventsTeam['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pri Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsTeam['PriTeam']['code'], array('controller' => 'teams', 'action' => 'view', $eventsTeam['PriTeam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sec Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsTeam['SecTeam']['code'], array('controller' => 'teams', 'action' => 'view', $eventsTeam['SecTeam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Linked Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsTeam['LinkedEvent']['id'], array('controller' => 'events', 'action' => 'view', $eventsTeam['LinkedEvent']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Etype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($eventsTeam['Etype']['code'], array('controller' => 'etypes', 'action' => 'view', $eventsTeam['Etype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($eventsTeam['EventsTeam']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Events Team'), array('action' => 'edit', $eventsTeam['EventsTeam']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Events Team'), array('action' => 'delete', $eventsTeam['EventsTeam']['id']), null, __('Are you sure you want to delete # %s?', $eventsTeam['EventsTeam']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Teams'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Team'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pri Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Etypes'), array('controller' => 'etypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Etype'), array('controller' => 'etypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
