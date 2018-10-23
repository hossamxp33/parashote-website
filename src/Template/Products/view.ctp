
<div class="products view">
	<h2><?php echo ___('product'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $product->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($product->name);
					?>
				</dd>
				
				<dt><?php echo __('Subcat'); ?></dt>
				<dd>
					<?php echo $product->has('subcat') ? $this->Html->link($product->subcat->name, ['controller' => 'Subcats', 'action' => 'view', $product->subcat->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Category'); ?></dt>
				<dd>
					<?php echo $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?>
				</dd>
					
				<dt><?= ___('price'); ?></dt>
				<dd>
					<?php 
					echo h($product->price);
					?>
				</dd>
				
				<dt><?= ___('last_price'); ?></dt>
				<dd>
					<?php 
					echo h($product->last_price);
					?>
				</dd>
				
				<dt><?= ___('description'); ?></dt>
				<dd>
					<?php 
					echo h($product->description);
					?>
				</dd>
				
				<dt><?php echo __('Store'); ?></dt>
				<dd>
					<?php echo $product->has('store') ? $this->Html->link($product->store->name, ['controller' => 'Stores', 'action' => 'view', $product->store->id]) : '' ?>
				</dd>
					
				<dt><?= ___('brand'); ?></dt>
				<dd>
					<?php 
					echo h($product->brand);
					?>
				</dd>
				
				<dt><?= ___('product_info'); ?></dt>
				<dd>
					<?php 
					echo h($product->product_info);
					?>
				</dd>
				
				<dt><?= ___('amount'); ?></dt>
				<dd>
					<?php 
					echo h($product->amount);
					?>
				</dd>
				
				<dt><?= ___('guarantee'); ?></dt>
				<dd>
					<?php 
					echo h($product->guarantee);
					?>
				</dd>
				
				<dt><?= ___('visible'); ?></dt>
				<dd>
					<?php 
					echo h($product->visible);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $product], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
