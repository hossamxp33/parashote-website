
<div class="header view">
	<h2><?php echo ___('header'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $header->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('background'); ?></dt>
				<dd>
					<?php 
					echo h($header->background);
					?>
				</dd>
				
				<dt><?= ___('logo'); ?></dt>
				<dd>
					<?php 
					echo h($header->logo);
					?>
				</dd>
				
				<dt><?= ___('right_icon'); ?></dt>
				<dd>
					<?php 
					echo h($header->right_icon);
					?>
				</dd>
				
				<dt><?= ___('left_icon'); ?></dt>
				<dd>
					<?php 
					echo h($header->left_icon);
					?>
				</dd>
				
				<dt><?= ___('template_id'); ?></dt>
				<dd>
					<?php 
					echo h($header->template_id);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $header], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
