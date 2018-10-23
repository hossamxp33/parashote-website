
<div class="stores view">
	<h2><?php echo ___('store'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $store->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($store->name);
					?>
				</dd>
				
				<dt><?= ___('bank_accounts'); ?></dt>
				<dd>
					<?php 
					echo h($store->bank_accounts);
					?>
				</dd>
				
				<dt><?= ___('phone'); ?></dt>
				<dd>
					<?php 
					echo h($store->phone);
					?>
				</dd>
				
				<dt><?= ___('alternative_phone'); ?></dt>
				<dd>
					<?php 
					echo h($store->alternative_phone);
					?>
				</dd>
				
				<dt><?= ___('commercial_register_photo'); ?></dt>
				<dd>
					<?php 
					echo h($store->commercial_register_photo);
					?>
				</dd>
				
				<dt><?= ___('commercial_register_number'); ?></dt>
				<dd>
					<?php 
					echo h($store->commercial_register_number);
					?>
				</dd>
				
				<dt><?= ___('link'); ?></dt>
				<dd>
					<?php 
					echo h($store->link);
					?>
				</dd>
				
				<dt><?= ___('description'); ?></dt>
				<dd>
					<?php 
					echo h($store->description);
					?>
				</dd>
				
				<dt><?= ___('branches'); ?></dt>
				<dd>
					<?php 
					echo h($store->branches);
					?>
				</dd>
				
				<dt><?= ___('birthdate'); ?></dt>
				<dd>
					<?php 
					echo h($store->to_display_timezone('birthdate'));
					?>
				</dd>
				
				<dt><?php echo __('City'); ?></dt>
				<dd>
					<?php echo $store->has('city') ? $this->Html->link($store->city->name, ['controller' => 'Cities', 'action' => 'view', $store->city->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Subcat'); ?></dt>
				<dd>
					<?php echo $store->has('subcat') ? $this->Html->link($store->subcat->name, ['controller' => 'Subcats', 'action' => 'view', $store->subcat->id]) : '' ?>
				</dd>
					
				<dt><?= ___('logodesign_id'); ?></dt>
				<dd>
					<?php 
					echo h($store->logodesign_id);
					?>
				</dd>
				
				<dt><?= ___('visible'); ?></dt>
				<dd>
					<?php 
					echo $this->AlaxosHtml->yesNo($store->visible);
					?>
				</dd>
				
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $store->has('user') ? $this->Html->link($store->user->id, ['controller' => 'Users', 'action' => 'view', $store->user->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Design'); ?></dt>
				<dd>
					<?php echo $store->has('design') ? $this->Html->link($store->design->Id, ['controller' => 'Designs', 'action' => 'view', $store->design->Id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Template'); ?></dt>
				<dd>
					<?php echo $store->has('template') ? $this->Html->link($store->template->id, ['controller' => 'Templates', 'action' => 'view', $store->template->id]) : '' ?>
				</dd>
					
				<dt><?= ___('catgeory_id'); ?></dt>
				<dd>
					<?php 
					echo h($store->catgeory_id);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $store], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
