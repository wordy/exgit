<div class="events view">
<h2><?php  echo __('Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
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
		<dt><?php echo __('Num Sec Teams'); ?></dt>
		<dd>
			<?php echo h($event['Event']['num_sec_teams']); ?>
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
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events Teams'), array('controller' => 'events_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Events Team'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="related">
	<h3><?php echo __('Linkages From This Event'); ?></h3>
	<?php if (!empty($event['PriLink'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('E_id'); ?></th>
		<th><?php echo __('LE_id'); ?></th>
		<th><?php echo __('Start'); ?></th>
        <th><?php echo __('Type'); ?></th>		
		<th><?php echo __('Lead Team'); ?></th>
		<th><?php echo __('Secondary Team'); ?></th>

		<th><?php echo __('Description'); ?></th>

		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($event['PriLink'] as $pl): ?>
		<tr>
            <td><?php echo $pl['Event']['id']; ?></td>
            <td><?php echo $pl['linked_event_id']; ?></td>
            <td><?php echo $this->Time->format('n/j H:i:s',$pl['Event']['stime']); ?></td>
			<td><?php echo (!empty($pl['Ltype']['code']) ? $pl['Ltype']['code']:''); ?></td>
			<td>
			 <?php 
            
                if($pl['PriTeam']['code'] && $pl['Event']['id']){
                    echo $this->Html->link($pl['PriTeam']['code'], array('action'=>'view',$pl['Event']['id']),array('class'=>'green'));
                    
                }
            
                else{echo $pl['PriTeam']['code'];} 
            
            
            
            ?>
			    
	</td>
			<?php if (!empty($pl['SecTeam'])){
			     if($pl['SecTeam']['code'] && $pl['linked_event_id']){
			    echo '<td>'. $this->Html->link($pl['SecTeam']['code'], array('action'=>'view',$pl['linked_event_id'])) . '</td>';
                
			} 
            
            else{ ?>
			
			<td><?php echo $pl['SecTeam']['code']; ?></td>

			
			<?php }}?>
            <td><?php echo $pl['Event']['description']; ?></td>

			<td><?php echo $pl['active']; ?></td>
			<td class="actions">
			    <?php echo $this->Html->link(__('VE'), array('controller' => 'events', 'action' => 'view', $pl['Event']['id'])); ?>
                <?php echo $this->Html->link(__('EE'), array('controller' => 'events', 'action' => 'edit', $pl['Event']['id'])); ?>
                
				<?php echo $this->Html->link(__('VL'), array('controller' => 'events_teams', 'action' => 'view', $pl['id'])); ?>
				<?php echo $this->Html->link(__('EL'), array('controller' => 'events_teams', 'action' => 'edit', $pl['id'])); ?>
				<?php echo $this->Form->postLink(__('DL'), array('controller' => 'events_teams', 'action' => 'delete', $pl['id']), null, __('Are you sure you want to delete # %s?', $pl['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Linked Events Team'), array('controller' => 'events_teams', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
    <h3><?php echo __('Linkages To This Event'); ?></h3>
    <?php if (!empty($event['SecLink'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __('E_id'); ?></th>
        <th><?php echo __('LE_id'); ?></th>
        <th><?php echo __('Start'); ?></th>
        <th><?php echo __('Type'); ?></th>
        <th><?php echo __('Lead Team'); ?></th>
        <th><?php echo __('Secondary Team'); ?></th>
        
        <th><?php echo __('Description'); ?></th>

        <th><?php echo __('Active'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php
        $i = 0;
        foreach ($event['SecLink'] as $sl): ?>
        <tr>
            <td><?php echo $sl['Event']['id']; ?></td>
            <td><?php echo $sl['linked_event_id']; ?></td>

            <td><?php echo $this->Time->format('n/j H:i:s',$sl['Event']['stime']); ?></td>
            <td><?php echo (!empty($sl['Ltype']['code']) ? $sl['Ltype']['code']:''); ?></td>
            
            <td><?php 
            
                if($sl['PriTeam']['code'] && $sl['linked_event_id'] && $sl['Event']['id']){
                    echo $this->Html->link($sl['PriTeam']['code'], array('action'=>'view',$sl['Event']['id']));
                    
                }
            
                else{echo $sl['PriTeam']['code'];} 
            
            
            
            ?></td>
            
            <?php if($sl['SecTeam']['code'] && $sl['linked_event_id']){
                echo '<td>'. $this->Html->link($sl['SecTeam']['code'], array('action'=>'view',$sl['linked_event_id'])) . '</td>';
                
            } 
            
            else{ ?>
            
            <td><?php echo $sl['SecTeam']['code']; ?></td>

            
            <?php }?>
            
            <td><?php echo $sl['Event']['description']; ?></td>

            <td><?php echo $sl['active']; ?></td>
            <td class="actions">
                <?php echo $this->Html->link(__('VE'), array('controller' => 'events', 'action' => 'view', $sl['Event']['id'])); ?>
                <?php echo $this->Html->link(__('EE'), array('controller' => 'events', 'action' => 'edit', $sl['Event']['id'])); ?>
                <?php echo $this->Form->postLink(__('DL'), array('controller' => 'events_teams', 'action' => 'delete', $sl['id']), null, __('Are you sure you want to delete # %s?', $sl['id'])); ?>
            <?php echo $this->Html->link(__('VL'), array('controller' => 'events_teams', 'action' => 'view', $sl['id'])); ?>
                <?php echo $this->Html->link(__('EL'), array('controller' => 'events_teams', 'action' => 'edit', $sl['id'])); ?>
 
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

<?php debug($event);?>