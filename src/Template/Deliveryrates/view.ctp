
<div class="deliveryrates view">
	<h2><?php echo ___('deliveryrate'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $deliveryrate->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('rate'); ?></dt>
				<dd>
					<?php 
					echo h($deliveryrate->rate);
					?>
				</dd>
				
				<dt><?= ___('comments'); ?></dt>
				<dd>
					<?php 
					echo h($deliveryrate->comments);
					?>
				</dd>
				
				<dt><?= ___('amount_outstanding'); ?></dt>
				<dd>
					<?php 
					echo h($deliveryrate->amount_outstanding);
					?>
				</dd>
				
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $deliveryrate->has('user') ? $this->Html->link($deliveryrate->user->id, ['controller' => 'Users', 'action' => 'view', $deliveryrate->user->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $deliveryrate], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
