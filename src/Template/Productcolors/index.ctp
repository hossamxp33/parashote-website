<div class="productcolors index">
	
	<h2><?= ___('productcolors'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('product_id', ___('product_id')); ?></th>
				<th><?php echo $this->Paginator->sort('color_hex', ___('color_hex')); ?></th>
				<th><?php echo $this->Paginator->sort('red', ___('red')); ?></th>
				<th><?php echo $this->Paginator->sort('blue', ___('blue')); ?></th>
				<th><?php echo $this->Paginator->sort('green', ___('green')); ?></th>
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
					echo $this->AlaxosForm->filterField('product_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('color_hex');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('red');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('blue');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('green');
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
					echo $this->AlaxosForm->button(___('filter'), ['class' => 'btn btn-default']);
					echo $this->AlaxosForm->end();
					?>
				</td>
			</tr>
			</thead>
			
			<tbody>
			<?php foreach ($productcolors as $i => $productcolor): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Productcolor.' . $i . '.id', array('value' => $productcolor->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $productcolor->has('product') ? $this->Html->link($productcolor->product->name, ['controller' => 'Products', 'action' => 'view', $productcolor->product->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($productcolor->color_hex) ?>
					</td>
					<td>
						<?php echo h($productcolor->red) ?>
					</td>
					<td>
						<?php echo h($productcolor->blue) ?>
					</td>
					<td>
						<?php echo h($productcolor->green) ?>
					</td>
					<td>
						<?php echo h($productcolor->to_display_timezone('created')); ?>
					</td>
					<td>
						<?php echo h($productcolor->to_display_timezone('modified')); ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $productcolor->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $productcolor->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $productcolor->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $productcolor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productcolor->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $productcolor->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $productcolor->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $productcolor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productcolor->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($productcolors) && $productcolors->count() > 0)
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