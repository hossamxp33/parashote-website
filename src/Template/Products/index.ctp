<div class="products index">
	
	<h2><?= ___('products'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('subcat_id', ___('subcat_id')); ?></th>
				<th><?php echo $this->Paginator->sort('category_id', ___('category_id')); ?></th>
				<th><?php echo $this->Paginator->sort('price', ___('price')); ?></th>
				<th><?php echo $this->Paginator->sort('last_price', ___('last_price')); ?></th>
				<th><?php echo $this->Paginator->sort('description', ___('description')); ?></th>
				<th><?php echo $this->Paginator->sort('store_id', ___('store_id')); ?></th>
				<th><?php echo $this->Paginator->sort('brand', ___('brand')); ?></th>
				<th><?php echo $this->Paginator->sort('product_info', ___('product_info')); ?></th>
				<th><?php echo $this->Paginator->sort('amount', ___('amount')); ?></th>
				<th><?php echo $this->Paginator->sort('guarantee', ___('guarantee')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('created')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('modified', ___('modified')); ?></th>
				<th><?php echo $this->Paginator->sort('visible', ___('visible')); ?></th>
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
					echo $this->AlaxosForm->filterField('subcat_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('category_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('price');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('last_price');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('description');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('store_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('brand');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('product_info');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('amount');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('guarantee');
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
					echo $this->AlaxosForm->button(___('filter'), ['class' => 'btn btn-default']);
					echo $this->AlaxosForm->end();
					?>
				</td>
			</tr>
			</thead>
			
			<tbody>
			<?php foreach ($products as $i => $product): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Product.' . $i . '.id', array('value' => $product->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo h($product->name) ?>
					</td>
					<td>
						<?php echo $product->has('subcat') ? $this->Html->link($product->subcat->name, ['controller' => 'Subcats', 'action' => 'view', $product->subcat->id]) : ''; ?>
					</td>
					<td>
						<?php echo $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($product->price) ?>
					</td>
					<td>
						<?php echo h($product->last_price) ?>
					</td>
					<td>
						<?php echo h($product->description) ?>
					</td>
					<td>
						<?php echo $product->has('store') ? $this->Html->link($product->store->name, ['controller' => 'Stores', 'action' => 'view', $product->store->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($product->brand) ?>
					</td>
					<td>
						<?php echo h($product->product_info) ?>
					</td>
					<td>
						<?php echo h($product->amount) ?>
					</td>
					<td>
						<?php echo h($product->guarantee) ?>
					</td>
					<td>
						<?php echo h($product->to_display_timezone('created')); ?>
					</td>
					<td>
						<?php echo h($product->to_display_timezone('modified')); ?>
					</td>
					<td>
						<?php echo h($product->visible) ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $product->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $product->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $product->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $product->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $product->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($products) && $products->count() > 0)
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