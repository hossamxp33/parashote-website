<div class="users index">
	
	<h2><?= ___('users'); ?></h2>
	
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
				<th><?php echo $this->Paginator->sort('username', ___('username')); ?></th>
				<th><?php echo $this->Paginator->sort('active', ___('active')); ?></th>
				<th><?php echo $this->Paginator->sort('email_verified', ___('email_verified')); ?></th>
				<th><?php echo $this->Paginator->sort('user_group_id', ___('user_group_id')); ?></th>
				<th><?php echo $this->Paginator->sort('long', ___('long')); ?></th>
				<th><?php echo $this->Paginator->sort('lat', ___('lat')); ?></th>
				<th><?php echo $this->Paginator->sort('gender', ___('gender')); ?></th>
				<th><?php echo $this->Paginator->sort('phone', ___('phone')); ?></th>
				<th><?php echo $this->Paginator->sort('purchase_way', ___('purchase_way')); ?></th>
				<th><?php echo $this->Paginator->sort('points', ___('points')); ?></th>
				<th><?php echo $this->Paginator->sort('type_phone', ___('type_phone')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('created')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('modified', ___('modified')); ?></th>
				<th><?php echo $this->Paginator->sort('email', ___('email')); ?></th>
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
					echo $this->AlaxosForm->filterField('username');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('active');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('email_verified');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('user_group_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('long');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('lat');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('gender');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('phone');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('purchase_way');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('points');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('type_phone');
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
					echo $this->AlaxosForm->filterField('email');
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
			<?php foreach ($users as $i => $user): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('User.' . $i . '.id', array('value' => $user->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo h($user->username) ?>
					</td>
					<td>
						<?php echo h($user->active) ?>
					</td>
					<td>
						<?php echo h($user->email_verified) ?>
					</td>
					<td>
						<?php echo h($user->user_group_id) ?>
					</td>
					<td>
						<?php echo h($user->long) ?>
					</td>
					<td>
						<?php echo h($user->lat) ?>
					</td>
					<td>
						<?php echo h($user->gender) ?>
					</td>
					<td>
						<?php echo h($user->phone) ?>
					</td>
					<td>
						<?php echo h($user->purchase_way) ?>
					</td>
					<td>
						<?php echo h($user->points) ?>
					</td>
					<td>
						<?php echo h($user->type_phone) ?>
					</td>
					<td>
						<?php echo h($user->to_display_timezone('created')); ?>
					</td>
					<td>
						<?php echo h($user->to_display_timezone('modified')); ?>
					</td>
					<td>
						<?php echo h($user->email) ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $user->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $user->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $user->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $user->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $user->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($users) && $users->count() > 0)
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