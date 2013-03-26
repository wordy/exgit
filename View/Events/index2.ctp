<div class="events index">
	<h2><?php echo __('Events'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('plan_id'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('stime'); ?></th>
			<th><?php echo $this->Paginator->sort('etime'); ?></th>-->
			<th><?php echo $this->Paginator->sort('stime'); ?></th>
			<th><?php echo $this->Paginator->sort('PriLink.ltype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('private'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('num_sec_teams'); ?></th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($events as $event): ?>
	<tr>
		<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($event['Plan']['name'], array('controller' => 'plans', 'action' => 'view', $event['Plan']['id'])); ?>
		</td>
		<td><?php echo h($this->Common->makeEtime($event['Event']['stime'],$event['Event']['etime'])) ?>&nbsp;</td>
		<!--<td><?php echo h($event['Event']['stime']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['etime']); ?>&nbsp;</td>-->
		<td><?php 
		
		if(!empty($event['PriLink'][0]['Ltype']['code'])){
		echo h($event['PriLink'][0]['Ltype']['code']);} ?>&nbsp;
		
		</td>
		<td><?php echo h($event['Event']['description']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['comment']); ?>&nbsp;</td>

		<td><?php echo h($event['Event']['private']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['active']); ?>&nbsp;</td>
		
		<!--<td><?php echo h($event['Event']['created']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['modified']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['num_sec_teams']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $event['Event']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $event['Event']['id']), null, __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Teams'), array('controller' => 'events_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Team'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('View_Events'), array('controller' => 'events', 'action' => 'view_events')); ?> </li>
	</ul>
</div>

<?php //debug($events); ?>
