
<div class="productcolors view">
	<h2><?php echo ___('productcolor'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $productcolor->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Product'); ?></dt>
				<dd>
					<?php echo $productcolor->has('product') ? $this->Html->link($productcolor->product->name, ['controller' => 'Products', 'action' => 'view', $productcolor->product->id]) : '' ?>
				</dd>
					
				<dt><?= ___('color_hex'); ?></dt>
				<dd>
					<?php 
					echo h($productcolor->color_hex);
					?>
				</dd>
				
				<dt><?= ___('red'); ?></dt>
				<dd>
					<?php 
					echo h($productcolor->red);
					?>
				</dd>
				
				<dt><?= ___('blue'); ?></dt>
				<dd>
					<?php 
					echo h($productcolor->blue);
					?>
				</dd>
				
				<dt><?= ___('green'); ?></dt>
				<dd>
					<?php 
					echo h($productcolor->green);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $productcolor], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
