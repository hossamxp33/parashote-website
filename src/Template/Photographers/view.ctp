
<div class="photographers view">
	<h2><?php echo ___('photographer'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $photographer->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($photographer->name);
					?>
				</dd>
				
				<dt><?= ___('lat'); ?></dt>
				<dd>
					<?php 
					echo h($photographer->lat);
					?>
				</dd>
				
				<dt><?= ___('long'); ?></dt>
				<dd>
					<?php 
					echo h($photographer->long);
					?>
				</dd>
				
				<dt><?php echo __('Store'); ?></dt>
				<dd>
					<?php echo $photographer->has('store') ? $this->Html->link($photographer->store->name, ['controller' => 'Stores', 'action' => 'view', $photographer->store->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $photographer], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
