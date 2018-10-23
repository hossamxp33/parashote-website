
<div class="coupons view">
	<h2><?php echo ___('coupon'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $coupon->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('coupons_code'); ?></dt>
				<dd>
					<?php 
					echo h($coupon->coupons_code);
					?>
				</dd>
				
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($coupon->name);
					?>
				</dd>
				
				<dt><?= ___('percentage'); ?></dt>
				<dd>
					<?php 
					echo h($coupon->percentage);
					?>
				</dd>
				
				<dt><?= ___('store_id'); ?></dt>
				<dd>
					<?php 
					echo h($coupon->store_id);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $coupon], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
