
<div class="productdesigns view">
	<h2><?php echo ___('productdesign'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $productdesign->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('store_setting_id'); ?></dt>
				<dd>
					<?php 
					echo h($productdesign->store_setting_id);
					?>
				</dd>
				
				<dt><?= ___('ShippingButtonColor'); ?></dt>
				<dd>
					<?php 
					echo h($productdesign->ShippingButtonColor);
					?>
				</dd>
				
				<dt><?= ___('AddCartColorButton'); ?></dt>
				<dd>
					<?php 
					echo h($productdesign->AddCartColorButton);
					?>
				</dd>
				
				<dt><?= ___('product_template_id'); ?></dt>
				<dd>
					<?php 
					echo h($productdesign->product_template_id);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $productdesign], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
