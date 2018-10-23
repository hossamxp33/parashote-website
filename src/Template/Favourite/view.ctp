
<div class="favourite view">
	<h2><?php echo ___('favourite'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $favourite->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $favourite->has('user') ? $this->Html->link($favourite->user->id, ['controller' => 'Users', 'action' => 'view', $favourite->user->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Product'); ?></dt>
				<dd>
					<?php echo $favourite->has('product') ? $this->Html->link($favourite->product->name, ['controller' => 'Products', 'action' => 'view', $favourite->product->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Store'); ?></dt>
				<dd>
					<?php echo $favourite->has('store') ? $this->Html->link($favourite->store->name, ['controller' => 'Stores', 'action' => 'view', $favourite->store->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $favourite], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
