
<div class="models view">
	<h2><?php echo ___('model'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $model->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($model->name);
					?>
				</dd>
				
				<dt><?php echo __('Store'); ?></dt>
				<dd>
					<?php echo $model->has('store') ? $this->Html->link($model->store->name, ['controller' => 'Stores', 'action' => 'view', $model->store->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $model], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
