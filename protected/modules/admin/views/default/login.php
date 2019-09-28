<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Вход  
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));

            ?>

            <p class="note"><span class="required">*</span> обязательные поля.</p>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'username'); ?>
                <?php echo $form->textField($model, 'username', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'username'); ?></p>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'password'); ?>
                <?php echo $form->textField($model, 'password', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'password'); ?></p>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <?php echo $form->checkBox($model, 'rememberMe'); ?><?php echo $form->labelEx($model, 'rememberMe'); ?>
                    </label>
                </div>
                
                <p class="help-block"><?php echo $form->error($model, 'rememberMe'); ?></p>
            </div>



           
            <button class="btn btn-default" type="submit">Войти</button>
         

            <?php $this->endWidget(); ?>
        </div><!-- form -->
    </div>
</div>