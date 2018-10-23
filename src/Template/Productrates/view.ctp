
<div class="productrates view">
	<h2><?php echo ___('productrate'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $productrate->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('rate'); ?></dt>
				<dd>
					<?php 
					echo h($productrate->rate);
					?>
				</dd>
				
				<dt><?php echo __('Product'); ?></dt>
				<dd>
					<?php echo $productrate->has('product') ? $this->Html->link($productrate->product->name, ['controller' => 'Products', 'action' => 'view', $productrate->product->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $productrate], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
