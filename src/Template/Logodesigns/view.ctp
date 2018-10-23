
<div class="logodesigns view">
	<h2><?php echo ___('logodesign'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $logodesign->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('description'); ?></dt>
				<dd>
					<?php 
					echo h($logodesign->description);
					?>
				</dd>
				
				<dt><?php echo __('Store'); ?></dt>
				<dd>
					<?php echo $logodesign->has('store') ? $this->Html->link($logodesign->store->name, ['controller' => 'Stores', 'action' => 'view', $logodesign->store->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $logodesign], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
