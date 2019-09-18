<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="form">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'page-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation' => false,
            ));
            ?>
            <p class="note"><span class="required">*</span> обязательные поля.</p>

            <?php echo $form->errorSummary($model); ?>



            <div class="form-group">
                <?php echo $form->labelEx($model, 'little_description'); ?>
                <?php echo $form->textField($model, 'little_description', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'little_description'); ?></p>
            </div>



            <div class="form-group">
                <?php echo $form->labelEx($model, 'description'); ?>

                <?php
                $this->widget('application.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'description',
                ));
                ?>
                <p class="help-block"><?php echo $form->error($model, 'description'); ?></p>
            </div>

            <button class="btn btn-default" type="submit"><?= $model->isNewRecord ? 'Создать' : 'Сохранить' ?></button>

            <?php $this->endWidget(); ?>


        </div><!-- form -->
    </div><!-- form -->
</div><!-- form -->