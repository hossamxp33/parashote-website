
<div class="users view">
	<h2><?php echo ___('user'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $user->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('username'); ?></dt>
				<dd>
					<?php 
					echo h($user->username);
					?>
				</dd>
				
				<dt><?= ___('active'); ?></dt>
				<dd>
					<?php 
					echo h($user->active);
					?>
				</dd>
				
				<dt><?= ___('email_verified'); ?></dt>
				<dd>
					<?php 
					echo h($user->email_verified);
					?>
				</dd>
				
				<dt><?= ___('user_group_id'); ?></dt>
				<dd>
					<?php 
					echo h($user->user_group_id);
					?>
				</dd>
				
				<dt><?= ___('long'); ?></dt>
				<dd>
					<?php 
					echo h($user->long);
					?>
				</dd>
				
				<dt><?= ___('lat'); ?></dt>
				<dd>
					<?php 
					echo h($user->lat);
					?>
				</dd>
				
				<dt><?= ___('gender'); ?></dt>
				<dd>
					<?php 
					echo h($user->gender);
					?>
				</dd>
				
				<dt><?= ___('phone'); ?></dt>
				<dd>
					<?php 
					echo h($user->phone);
					?>
				</dd>
				
				<dt><?= ___('purchase_way'); ?></dt>
				<dd>
					<?php 
					echo h($user->purchase_way);
					?>
				</dd>
				
				<dt><?= ___('points'); ?></dt>
				<dd>
					<?php 
					echo h($user->points);
					?>
				</dd>
				
				<dt><?= ___('type_phone'); ?></dt>
				<dd>
					<?php 
					echo h($user->type_phone);
					?>
				</dd>
				
				<dt><?= ___('email'); ?></dt>
				<dd>
					<?php 
					echo h($user->email);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $user], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
