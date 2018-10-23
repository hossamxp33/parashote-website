
<div class="body view">
	<h2><?php echo ___('body'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $body->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('background'); ?></dt>
				<dd>
					<?php 
					echo h($body->background);
					?>
				</dd>
				
				<dt><?= ___('first_label'); ?></dt>
				<dd>
					<?php 
					echo h($body->first_label);
					?>
				</dd>
				
				<dt><?= ___('second_label'); ?></dt>
				<dd>
					<?php 
					echo h($body->second_label);
					?>
				</dd>
				
				<dt><?= ___('third_label'); ?></dt>
				<dd>
					<?php 
					echo h($body->third_label);
					?>
				</dd>
				
				<dt><?php echo __('Template'); ?></dt>
				<dd>
					<?php echo $body->has('template') ? $this->Html->link($body->template->id, ['controller' => 'Templates', 'action' => 'view', $body->template->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $body], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
