<div class="footer index">
	
	<h2><?= ___('footer'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('border_color', ___('border_color')); ?></th>
				<th><?php echo $this->Paginator->sort('background', ___('background')); ?></th>
				<th><?php echo $this->Paginator->sort('first_icon', ___('first_icon')); ?></th>
				<th><?php echo $this->Paginator->sort('first_label', ___('first_label')); ?></th>
				<th><?php echo $this->Paginator->sort('second_icon', ___('second_icon')); ?></th>
				<th><?php echo $this->Paginator->sort('second_label', ___('second_label')); ?></th>
				<th><?php echo $this->Paginator->sort('third_icon', ___('third_icon')); ?></th>
				<th><?php echo $this->Paginator->sort('third_label', ___('third_label')); ?></th>
				<th><?php echo $this->Paginator->sort('forth_icon', ___('forth_icon')); ?></th>
				<th><?php echo $this->Paginator->sort('forth_label', ___('forth_label')); ?></th>
				<th><?php echo $this->Paginator->sort('fifth_icon', ___('fifth_icon')); ?></th>
				<th><?php echo $this->Paginator->sort('fifth_label', ___('fifth_label')); ?></th>
				<th><?php echo $this->Paginator->sort('template_id', ___('template_id')); ?></th>
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
					echo $this->AlaxosForm->filterField('border_color');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('background');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('first_icon');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('first_label');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('second_icon');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('second_label');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('third_icon');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('third_label');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('forth_icon');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('forth_label');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('fifth_icon');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('fifth_label');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('template_id');
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
			<?php foreach ($footer as $i => $footer): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Footer.' . $i . '.id', array('value' => $footer->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo h($footer->border_color) ?>
					</td>
					<td>
						<?php echo h($footer->background) ?>
					</td>
					<td>
						<?php echo h($footer->first_icon) ?>
					</td>
					<td>
						<?php echo h($footer->first_label) ?>
					</td>
					<td>
						<?php echo h($footer->second_icon) ?>
					</td>
					<td>
						<?php echo h($footer->second_label) ?>
					</td>
					<td>
						<?php echo h($footer->third_icon) ?>
					</td>
					<td>
						<?php echo h($footer->third_label) ?>
					</td>
					<td>
						<?php echo h($footer->forth_icon) ?>
					</td>
					<td>
						<?php echo h($footer->forth_label) ?>
					</td>
					<td>
						<?php echo h($footer->fifth_icon) ?>
					</td>
					<td>
						<?php echo h($footer->fifth_label) ?>
					</td>
					<td>
						<?php echo h($footer->template_id) ?>
					</td>
					<td>
						<?php echo h($footer->to_display_timezone('created')); ?>
					</td>
					<td>
						<?php echo h($footer->to_display_timezone('modified')); ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $footer->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $footer->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $footer->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $footer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $footer->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $footer->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $footer->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $footer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $footer->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($footer) && $footer->count() > 0)
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