
<div class="designer view">
	<h2><?php echo ___('designer'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $designer->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($designer->name);
					?>
				</dd>
				
				<dt><?= ___('lat'); ?></dt>
				<dd>
					<?php 
					echo h($designer->lat);
					?>
				</dd>
				
				<dt><?= ___('long'); ?></dt>
				<dd>
					<?php 
					echo h($designer->long);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $designer], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
