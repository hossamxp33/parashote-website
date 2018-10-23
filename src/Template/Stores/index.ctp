<div class="stores index">
	
	<h2><?= ___('stores'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['paginate_infos' => true, 'select_pagination_limit' => true]);
		?>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-hover table-condensed">
			<thead>
			<tr class="sortHeader">
				<th></th>
				<th><?php echo $this->Paginator->sort('name', ___('name')); ?></th>
				<th><?php echo $this->Paginator->sort('bank_accounts', ___('bank_accounts')); ?></th>
				<th><?php echo $this->Paginator->sort('phone', ___('phone')); ?></th>
				<th><?php echo $this->Paginator->sort('alternative_phone', ___('alternative_phone')); ?></th>
				<th><?php echo $this->Paginator->sort('commercial_register_photo', ___('commercial_register_photo')); ?></th>
				<th><?php echo $this->Paginator->sort('commercial_register_number', ___('commercial_register_number')); ?></th>
				<th><?php echo $this->Paginator->sort('link', ___('link')); ?></th>
				<th><?php echo $this->Paginator->sort('description', ___('description')); ?></th>
				<th><?php echo $this->Paginator->sort('branches', ___('branches')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('birthdate', ___('birthdate')); ?></th>
				<th><?php echo $this->Paginator->sort('city_id', ___('city_id')); ?></th>
				<th><?php echo $this->Paginator->sort('subcat_id', ___('subcat_id')); ?></th>
				<th><?php echo $this->Paginator->sort('logodesign_id', ___('logodesign_id')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('created')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('modified', ___('modified')); ?></th>
				<th><?php echo $this->Paginator->sort('visible', ___('visible')); ?></th>
				<th><?php echo $this->Paginator->sort('user_id', ___('user_id')); ?></th>
				<th><?php echo $this->Paginator->sort('design_id', ___('design_id')); ?></th>
				<th><?php echo $this->Paginator->sort('template_id', ___('template_id')); ?></th>
				<th><?php echo $this->Paginator->sort('catgeory_id', ___('catgeory_id')); ?></th>
				<th class="actions"></th>
			</tr>
			<tr class="filterHeader">
				<td>
				<?php
				echo $this->AlaxosForm->checkbox('_Tech.selectAll', ['id' => 'TechSelectAll']);
				
				echo $this->AlaxosForm->create($search_entity, array('url' => [], 'class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate'));
				?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('name');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('bank_accounts');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('phone');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('alternative_phone');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('commercial_register_photo');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('commercial_register_number');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('link');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('description');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('branches');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('birthdate');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('city_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('subcat_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('logodesign_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('created');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('modified');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('visible');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('user_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('design_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('template_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('catgeory_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->button(___('filter'), ['class' => 'btn btn-default']);
					echo $this->AlaxosForm->end();
					?>
				</td>
			</tr>
			</thead>
			
			<tbody>
			<?php foreach ($stores as $i => $store): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Store.' . $i . '.id', array('value' => $store->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo h($store->name) ?>
					</td>
					<td>
						<?php echo h($store->bank_accounts) ?>
					</td>
					<td>
						<?php echo h($store->phone) ?>
					</td>
					<td>
						<?php echo h($store->alternative_phone) ?>
					</td>
					<td>
						<?php echo h($store->commercial_register_photo) ?>
					</td>
					<td>
						<?php echo h($store->commercial_register_number) ?>
					</td>
					<td>
						<?php echo h($store->link) ?>
					</td>
					<td>
						<?php echo h($store->description) ?>
					</td>
					<td>
						<?php echo h($store->branches) ?>
					</td>
					<td>
						<?php echo h($store->to_display_timezone('birthdate')); ?>
					</td>
					<td>
						<?php echo $store->has('city') ? $this->Html->link($store->city->name, ['controller' => 'Cities', 'action' => 'view', $store->city->id]) : ''; ?>
					</td>
					<td>
						<?php echo $store->has('subcat') ? $this->Html->link($store->subcat->name, ['controller' => 'Subcats', 'action' => 'view', $store->subcat->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($store->logodesign_id) ?>
					</td>
					<td>
						<?php echo h($store->to_display_timezone('created')); ?>
					</td>
					<td>
						<?php echo h($store->to_display_timezone('modified')); ?>
					</td>
					<td>
						<?php echo $this->AlaxosHtml->yesNo($store->visible); ?>
					</td>
					<td>
						<?php echo $store->has('user') ? $this->Html->link($store->user->id, ['controller' => 'Users', 'action' => 'view', $store->user->id]) : ''; ?>
					</td>
					<td>
						<?php echo $store->has('design') ? $this->Html->link($store->design->Id, ['controller' => 'Designs', 'action' => 'view', $store->design->Id]) : ''; ?>
					</td>
					<td>
						<?php echo $store->has('template') ? $this->Html->link($store->template->id, ['controller' => 'Templates', 'action' => 'view', $store->template->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($store->catgeory_id) ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $store->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $store->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $store->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $store->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $store->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($stores) && $stores->count() > 0)
			{
				echo '<div class="row">';
				echo '<div class="col-md-1">';
				echo $this->AlaxosForm->postActionAllButton(__d('alaxos', 'delete all'), ['action' => 'delete_all'], ['confirm' => __d('alaxos', 'do you really want to delete the selected items ?')]);
				echo '</div>';
				echo '</div>';
			}
			?>
			
			<div class="paging text-center">
				<ul class="pagination pagination-sm">
				<?php
				$this->Paginator->templates(['ellipsis' => '<li class="ellipsis"><span>...</span></li>']);
				echo $this->Paginator->prev('< ' . __('previous'));
				echo $this->Paginator->numbers(['first' => 2, 'last' => 2]);
				echo $this->Paginator->next(__('next') . ' >');
				?>
				</ul>
			</div>
			
		</div>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
	Alaxos.start();
});
</script>