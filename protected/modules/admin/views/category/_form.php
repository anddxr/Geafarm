<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="form">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'category-form',
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
                <?php if (!empty($model->imageUrl)) { ?>
                    <?= CHtml::image($model->imageUrl, '', ['width' => 200, 'class' => "img-thumbnail"]) ?><br><br>
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
                <?php echo $form->labelEx($model, 'titleUA'); ?>
                <?php echo $form->textField($model, 'titleUA', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'titleUA'); ?></p>
            </div>


            <div class="form-group">
                <?php echo $form->labelEx($model, 'slider_title'); ?>
                <?php echo $form->textField($model, 'slider_title', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'slider_title'); ?></p>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'slider_tittleUA'); ?>
                <?php echo $form->textField($model, 'slider_tittleUA', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'slider_tittleUA'); ?></p>
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
            <div class="form-group">
                <?php echo $form->labelEx($model, 'descriptionUA'); ?>

                <?php
                $this->widget('application.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'descriptionUA',
                ));

                ?>
                <p class="help-block"><?php echo $form->error($model, 'descriptionUA'); ?></p>
            </div>




            <button class="btn btn-default" type="submit"><?= $model->isNewRecord ? 'Создать' : 'Сохранить' ?></button>


            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div><!-- form -->
</div><!-- form -->