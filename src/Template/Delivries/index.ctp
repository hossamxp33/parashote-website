<div class="delivries index">
	
	<h2><?= ___('delivries'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('personal_id', ___('personal_id')); ?></th>
				<th><?php echo $this->Paginator->sort('personal_id_image', ___('personal_id_image')); ?></th>
				<th><?php echo $this->Paginator->sort('personal_license_image', ___('personal_license_image')); ?></th>
				<th><?php echo $this->Paginator->sort('bank_accounts', ___('bank_accounts')); ?></th>
				<th><?php echo $this->Paginator->sort('phone', ___('phone')); ?></th>
				<th><?php echo $this->Paginator->sort('alternative_phone', ___('alternative_phone')); ?></th>
				<th><?php echo $this->Paginator->sort('gender', ___('gender')); ?></th>
				<th><?php echo $this->Paginator->sort('code', ___('code')); ?></th>
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
					echo $this->AlaxosForm->filterField('personal_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('personal_id_image');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('personal_license_image');
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
					echo $this->AlaxosForm->filterField('gender');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('code');
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
			<?php foreach ($delivries as $i => $delivry): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Delivry.' . $i . '.id', array('value' => $delivry->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo h($delivry->personal_id) ?>
					</td>
					<td>
						<?php echo h($delivry->personal_id_image) ?>
					</td>
					<td>
						<?php echo h($delivry->personal_license_image) ?>
					</td>
					<td>
						<?php echo h($delivry->bank_accounts) ?>
					</td>
					<td>
						<?php echo h($delivry->phone) ?>
					</td>
					<td>
						<?php echo h($delivry->alternative_phone) ?>
					</td>
					<td>
						<?php echo h($delivry->gender) ?>
					</td>
					<td>
						<?php echo h($delivry->code) ?>
					</td>
					<td>
						<?php echo h($delivry->to_display_timezone('created')); ?>
					</td>
					<td>
						<?php echo h($delivry->to_display_timezone('modified')); ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $delivry->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $delivry->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $delivry->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $delivry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivry->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $delivry->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $delivry->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $delivry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivry->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($delivries) && $delivries->count() > 0)
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