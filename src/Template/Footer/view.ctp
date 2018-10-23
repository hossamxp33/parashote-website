
<div class="footer view">
	<h2><?php echo ___('footer'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $footer->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('border_color'); ?></dt>
				<dd>
					<?php 
					echo h($footer->border_color);
					?>
				</dd>
				
				<dt><?= ___('background'); ?></dt>
				<dd>
					<?php 
					echo h($footer->background);
					?>
				</dd>
				
				<dt><?= ___('first_icon'); ?></dt>
				<dd>
					<?php 
					echo h($footer->first_icon);
					?>
				</dd>
				
				<dt><?= ___('first_label'); ?></dt>
				<dd>
					<?php 
					echo h($footer->first_label);
					?>
				</dd>
				
				<dt><?= ___('second_icon'); ?></dt>
				<dd>
					<?php 
					echo h($footer->second_icon);
					?>
				</dd>
				
				<dt><?= ___('second_label'); ?></dt>
				<dd>
					<?php 
					echo h($footer->second_label);
					?>
				</dd>
				
				<dt><?= ___('third_icon'); ?></dt>
				<dd>
					<?php 
					echo h($footer->third_icon);
					?>
				</dd>
				
				<dt><?= ___('third_label'); ?></dt>
				<dd>
					<?php 
					echo h($footer->third_label);
					?>
				</dd>
				
				<dt><?= ___('forth_icon'); ?></dt>
				<dd>
					<?php 
					echo h($footer->forth_icon);
					?>
				</dd>
				
				<dt><?= ___('forth_label'); ?></dt>
				<dd>
					<?php 
					echo h($footer->forth_label);
					?>
				</dd>
				
				<dt><?= ___('fifth_icon'); ?></dt>
				<dd>
					<?php 
					echo h($footer->fifth_icon);
					?>
				</dd>
				
				<dt><?= ___('fifth_label'); ?></dt>
				<dd>
					<?php 
					echo h($footer->fifth_label);
					?>
				</dd>
				
				<dt><?= ___('template_id'); ?></dt>
				<dd>
					<?php 
					echo h($footer->template_id);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $footer], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
