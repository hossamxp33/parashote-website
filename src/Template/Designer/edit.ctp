
<div class="designer form">
    
    <fieldset>
        <legend><?= ___('edit designer') ?></legend>
        
        <div class="panel panel-default">
            <div class="panel-heading">
            <?php
            echo $this->Navbars->actionButtons(['buttons_group' => 'edit', 'model_id' => $designer->id]);
            ?>
            </div>
            <div class="panel-body">
            
            <?php
            echo $this->AlaxosForm->create($designer, ['class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('name', __('name'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('name', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('lat', __('lat'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('lat', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('long', __('long'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('long', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo '<div class="col-sm-offset-2 col-sm-5">';
            echo $this->AlaxosForm->button(___('submit'), ['class' => 'btn btn-default']);
            echo '</div>';
            echo '</div>';
            
            echo $this->AlaxosForm->end(); 
            ?>
            </div>
        </div>
        
    </fieldset>
    
</div>