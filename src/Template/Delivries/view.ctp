
<div class="delivries view">
	<h2><?php echo ___('delivry'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $delivry->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('personal_id'); ?></dt>
				<dd>
					<?php 
					echo h($delivry->personal_id);
					?>
				</dd>
				
				<dt><?= ___('personal_id_image'); ?></dt>
				<dd>
					<?php 
					echo h($delivry->personal_id_image);
					?>
				</dd>
				
				<dt><?= ___('personal_license_image'); ?></dt>
				<dd>
					<?php 
					echo h($delivry->personal_license_image);
					?>
				</dd>
				
				<dt><?= ___('bank_accounts'); ?></dt>
				<dd>
					<?php 
					echo h($delivry->bank_accounts);
					?>
				</dd>
				
				<dt><?= ___('phone'); ?></dt>
				<dd>
					<?php 
					echo h($delivry->phone);
					?>
				</dd>
				
				<dt><?= ___('alternative_phone'); ?></dt>
				<dd>
					<?php 
					echo h($delivry->alternative_phone);
					?>
				</dd>
				
				<dt><?= ___('gender'); ?></dt>
				<dd>
					<?php 
					echo h($delivry->gender);
					?>
				</dd>
				
				<dt><?= ___('code'); ?></dt>
				<dd>
					<?php 
					echo h($delivry->code);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $delivry], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
