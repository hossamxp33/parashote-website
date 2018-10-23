
<div class="productfavs view">
	<h2><?php echo ___('productfav'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $productfav->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('amount'); ?></dt>
				<dd>
					<?php 
					echo h($productfav->amount);
					?>
				</dd>
				
				<dt><?php echo __('Product'); ?></dt>
				<dd>
					<?php echo $productfav->has('product') ? $this->Html->link($productfav->product->name, ['controller' => 'Products', 'action' => 'view', $productfav->product->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $productfav], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
