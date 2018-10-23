
<div class="storesettings view">
	<h2><?php echo ___('storesetting'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $storesetting->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Store'); ?></dt>
				<dd>
					<?php echo $storesetting->has('store') ? $this->Html->link($storesetting->store->name, ['controller' => 'Stores', 'action' => 'view', $storesetting->store->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Payment'); ?></dt>
				<dd>
					<?php echo $storesetting->has('payment') ? $this->Html->link($storesetting->payment->id, ['controller' => 'Payments', 'action' => 'view', $storesetting->payment->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Design'); ?></dt>
				<dd>
					<?php echo $storesetting->has('design') ? $this->Html->link($storesetting->design->Id, ['controller' => 'Designs', 'action' => 'view', $storesetting->design->Id]) : '' ?>
				</dd>
					
				<dt><?= ___('font'); ?></dt>
				<dd>
					<?php 
					echo h($storesetting->font);
					?>
				</dd>
				
				<dt><?= ___('photo'); ?></dt>
				<dd>
					<?php 
					echo h($storesetting->photo);
					?>
				</dd>
				
				<dt><?= ___('longitude'); ?></dt>
				<dd>
					<?php 
					echo h($storesetting->longitude);
					?>
				</dd>
				
				<dt><?= ___('latitude'); ?></dt>
				<dd>
					<?php 
					echo h($storesetting->latitude);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $storesetting], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
