
<div class="menus view">
	<h2><?php echo ___('menu'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $menu->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('first_label'); ?></dt>
				<dd>
					<?php 
					echo h($menu->first_label);
					?>
				</dd>
				
				<dt><?= ___('first_icon'); ?></dt>
				<dd>
					<?php 
					echo h($menu->first_icon);
					?>
				</dd>
				
				<dt><?= ___('second_label'); ?></dt>
				<dd>
					<?php 
					echo h($menu->second_label);
					?>
				</dd>
				
				<dt><?= ___('second_icon'); ?></dt>
				<dd>
					<?php 
					echo h($menu->second_icon);
					?>
				</dd>
				
				<dt><?= ___('third_label'); ?></dt>
				<dd>
					<?php 
					echo h($menu->third_label);
					?>
				</dd>
				
				<dt><?= ___('third_icon'); ?></dt>
				<dd>
					<?php 
					echo h($menu->third_icon);
					?>
				</dd>
				
				<dt><?= ___('border'); ?></dt>
				<dd>
					<?php 
					echo h($menu->border);
					?>
				</dd>
				
				<dt><?php echo __('Menuaction'); ?></dt>
				<dd>
					<?php echo $menu->has('menuaction') ? $this->Html->link($menu->menuaction->name, ['controller' => 'Menuactions', 'action' => 'view', $menu->menuaction->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Store'); ?></dt>
				<dd>
					<?php echo $menu->has('store') ? $this->Html->link($menu->store->name, ['controller' => 'Stores', 'action' => 'view', $menu->store->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('User Group'); ?></dt>
				<dd>
					<?php echo $menu->has('user_group') ? $this->Html->link($menu->user_group->name, ['controller' => 'UserGroups', 'action' => 'view', $menu->user_group->id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $menu], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
