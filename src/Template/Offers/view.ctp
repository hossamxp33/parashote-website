
<div class="offers view">
	<h2><?php echo ___('offer'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $offer->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('start_date'); ?></dt>
				<dd>
					<?php 
					echo h($offer->to_display_timezone('start_date'));
					?>
				</dd>
				
				<dt><?= ___('end_date'); ?></dt>
				<dd>
					<?php 
					echo h($offer->to_display_timezone('end_date'));
					?>
				</dd>
				
				<dt><?php echo __('Product'); ?></dt>
				<dd>
					<?php echo $offer->has('product') ? $this->Html->link($offer->product->name, ['controller' => 'Products', 'action' => 'view', $offer->product->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $offer], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
