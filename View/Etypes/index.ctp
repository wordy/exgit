<div class="etypes index">
	<h2><?php echo __('Etypes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($etypes as $etype): ?>
	<tr>
		<td><?php echo h($etype['Etype']['id']); ?>&nbsp;</td>
		<td><?php echo h($etype['Etype']['code']); ?>&nbsp;</td>
		<td><?php echo h($etype['Etype']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $etype['Etype']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $etype['Etype']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $etype['Etype']['id']), null, __('Are you sure you want to delete # %s?', $etype['Etype']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Etype'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events Teams'), array('controller' => 'events_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Team'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
