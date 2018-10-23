<div class="storesettings index">
	
	<h2><?= ___('storesettings'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('store_id', ___('store_id')); ?></th>
				<th><?php echo $this->Paginator->sort('payment_id', ___('payment_id')); ?></th>
				<th><?php echo $this->Paginator->sort('design_id', ___('design_id')); ?></th>
				<th><?php echo $this->Paginator->sort('font', ___('font')); ?></th>
				<th><?php echo $this->Paginator->sort('photo', ___('photo')); ?></th>
				<th><?php echo $this->Paginator->sort('longitude', ___('longitude')); ?></th>
				<th><?php echo $this->Paginator->sort('latitude', ___('latitude')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('created')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('modified', ___('modified')); ?></th>
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
					echo $this->AlaxosForm->filterField('store_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('payment_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('design_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('font');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('photo');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('longitude');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('latitude');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('created');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('modified');
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
			<?php foreach ($storesettings as $i => $storesetting): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Storesetting.' . $i . '.id', array('value' => $storesetting->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $storesetting->has('store') ? $this->Html->link($storesetting->store->name, ['controller' => 'Stores', 'action' => 'view', $storesetting->store->id]) : ''; ?>
					</td>
					<td>
						<?php echo $storesetting->has('payment') ? $this->Html->link($storesetting->payment->id, ['controller' => 'Payments', 'action' => 'view', $storesetting->payment->id]) : ''; ?>
					</td>
					<td>
						<?php echo $storesetting->has('design') ? $this->Html->link($storesetting->design->Id, ['controller' => 'Designs', 'action' => 'view', $storesetting->design->Id]) : ''; ?>
					</td>
					<td>
						<?php echo h($storesetting->font) ?>
					</td>
					<td>
						<?php echo h($storesetting->photo) ?>
					</td>
					<td>
						<?php echo h($storesetting->longitude) ?>
					</td>
					<td>
						<?php echo h($storesetting->latitude) ?>
					</td>
					<td>
						<?php echo h($storesetting->to_display_timezone('created')); ?>
					</td>
					<td>
						<?php echo h($storesetting->to_display_timezone('modified')); ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $storesetting->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $storesetting->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $storesetting->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $storesetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesetting->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $storesetting->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $storesetting->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $storesetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesetting->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($storesettings) && $storesettings->count() > 0)
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