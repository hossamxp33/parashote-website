
<div class="sliders view">
	<h2><?php echo ___('slider'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $slider->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('photo'); ?></dt>
				<dd>
					<?php 
					echo h($slider->photo);
					?>
				</dd>
				
				<dt><?php echo __('Design'); ?></dt>
				<dd>
					<?php echo $slider->has('design') ? $this->Html->link($slider->design->Id, ['controller' => 'Designs', 'action' => 'view', $slider->design->Id]) : '' ?>
				</dd>
					
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $slider], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
