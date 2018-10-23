
<div class="paymentstores view">
	<h2><?php echo ___('paymentstore'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $paymentstore->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Store'); ?></dt>
				<dd>
					<?php echo $paymentstore->has('store') ? $this->Html->link($paymentstore->store->name, ['controller' => 'Stores', 'action' => 'view', $paymentstore->store->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Payment'); ?></dt>
				<dd>
					<?php echo $paymentstore->has('payment') ? $this->Html->link($paymentstore->payment->id, ['controller' => 'Payments', 'action' => 'view', $paymentstore->payment->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $paymentstore], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
