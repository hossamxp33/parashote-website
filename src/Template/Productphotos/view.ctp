
<div class="productphotos view">
	<h2><?php echo ___('productphoto'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $productphoto->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('photo'); ?></dt>
				<dd>
					<?php 
					echo h($productphoto->photo);
					?>
				</dd>
				
				<dt><?= ___('main'); ?></dt>
				<dd>
					<?php 
					echo h($productphoto->main);
					?>
				</dd>
				
				<dt><?php echo __('Product'); ?></dt>
				<dd>
					<?php echo $productphoto->has('product') ? $this->Html->link($productphoto->product->name, ['controller' => 'Products', 'action' => 'view', $productphoto->product->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $productphoto], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
