
<div class="favourite form">
    
    <fieldset>
        <legend><?= ___('edit favourite') ?></legend>
        
        <div class="panel panel-default">
            <div class="panel-heading">
            <?php
            echo $this->Navbars->actionButtons(['buttons_group' => 'edit', 'model_id' => $favourite->id]);
            ?>
            </div>
            <div class="panel-body">
            
            <?php
            echo $this->AlaxosForm->create($favourite, ['class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('user_id', __('user_id'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('user_id', ['options' => $users, 'label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('product_id', __('product_id'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('product_id', ['options' => $products, 'label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('store_id', __('store_id'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('store_id', ['options' => $stores, 'label' => false, 'class' => 'form-control']);
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
