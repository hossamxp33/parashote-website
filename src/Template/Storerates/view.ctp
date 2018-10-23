
<div class="storerates view">
	<h2><?php echo ___('storerate'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $storerate->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('rate'); ?></dt>
				<dd>
					<?php 
					echo h($storerate->rate);
					?>
				</dd>
				
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $storerate->has('user') ? $this->Html->link($storerate->user->id, ['controller' => 'Users', 'action' => 'view', $storerate->user->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Store'); ?></dt>
				<dd>
					<?php echo $storerate->has('store') ? $this->Html->link($storerate->store->name, ['controller' => 'Stores', 'action' => 'view', $storerate->store->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $storerate], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
