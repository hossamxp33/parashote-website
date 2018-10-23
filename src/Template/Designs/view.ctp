
<div class="designs view">
	<h2><?php echo ___('design'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $design->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Header'); ?></dt>
				<dd>
					<?php echo $design->has('header') ? $this->Html->link($design->header->id, ['controller' => 'Header', 'action' => 'view', $design->header->id]) : '' ?>
				</dd>
					
				<dt><?= ___('body_id'); ?></dt>
				<dd>
					<?php 
					echo h($design->body_id);
					?>
				</dd>
				
				<dt><?php echo __('Footer'); ?></dt>
				<dd>
					<?php echo $design->has('footer') ? $this->Html->link($design->footer->id, ['controller' => 'Footer', 'action' => 'view', $design->footer->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $design], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
