
<div class="productsizes view">
	<h2><?php echo ___('productsize'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $productsize->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Product'); ?></dt>
				<dd>
					<?php echo $productsize->has('product') ? $this->Html->link($productsize->product->name, ['controller' => 'Products', 'action' => 'view', $productsize->product->id]) : '' ?>
				</dd>
					
				<dt><?= ___('size'); ?></dt>
				<dd>
					<?php 
					echo h($productsize->size);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $productsize], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
