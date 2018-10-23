
<div class="subcats view">
	<h2><?php echo ___('subcat'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $subcat->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($subcat->name);
					?>
				</dd>
				
				<dt><?php echo __('Category'); ?></dt>
				<dd>
					<?php echo $subcat->has('category') ? $this->Html->link($subcat->category->name, ['controller' => 'Categories', 'action' => 'view', $subcat->category->id]) : '' ?>
				</dd>
					
				<dt><?= ___('photo'); ?></dt>
				<dd>
					<?php 
					echo h($subcat->photo);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $subcat], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
