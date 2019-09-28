<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="form">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'settings-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data')
            ));
            ?>

             <p class="note"><span class="required">*</span> обязательные поля.</p>

            <?php echo $form->errorSummary($model); ?>


            <div class="form-group">
                <?php echo $form->labelEx($model, 'admin_email'); ?>
                <?php echo $form->textField($model, 'admin_email', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'admin_email'); ?></p>
            </div>



            <div class="form-group">
                <?php echo $form->labelEx($model, 'pass'); ?>
                <?php echo $form->passwordField($model, 'pass', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'pass'); ?></p>
            </div>




            <div class="form-group">
                <?php if (!empty($model->logoUrl)) { ?>
                    <?= CHtml::image($model->logoUrl, '', ['width' => 200, 'class' => "img-thumbnail"]) ?><br><br>
                <?php } ?>
                <?php echo $form->labelEx($imageUpload, 'image'); ?>
                <?php echo $form->fileField($imageUpload, 'image'); ?>
                <p class="help-block"><?php echo $form->error($imageUpload, 'image'); ?></p>
            </div>


            <div class="form-group">
                <?php echo $form->labelEx($model, 'title'); ?>
                <?php echo $form->textField($model, 'title', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'title'); ?></p>
            </div>


            <div class="form-group">
                <?php echo $form->labelEx($model, 'meta_description'); ?>
                <?php echo $form->textArea($model, 'meta_description', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'meta_description'); ?></p>
            </div>


            <div class="form-group">
                <?php echo $form->labelEx($model, 'meta_keywords'); ?>
                <?php echo $form->textArea($model, 'meta_keywords', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'meta_keywords'); ?></p>
            </div>



            <div class="form-group">
                <?php echo $form->labelEx($model, 'contact_number'); ?>
                <?php echo $form->textField($model, 'contact_number', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'contact_number'); ?></p>
            </div>


            <div class="form-group">
                <?php echo $form->labelEx($model, 'contact_email'); ?>
                <?php echo $form->textField($model, 'contact_email', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'contact_email'); ?></p>
            </div>


            <div class="form-group">
                <?php echo $form->labelEx($model, 'contact_adress'); ?>
                <?php echo $form->textField($model, 'contact_adress', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'contact_adress'); ?></p>
            </div>


            <button class="btn btn-default" type="submit"><?= $model->isNewRecord ? 'Создать' : 'Сохранить' ?></button>

            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div><!-- form -->
</div><!-- form -->