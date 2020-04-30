<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="form">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'product-form',
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
                <?php echo $form->labelEx($model, 'category_id'); ?>
                <?php echo $form->dropDownList($model, 'category_id', CHtml::listData(Category::model()->findAll(), 'id', 'title'), ['class' => 'form-control']); ?>
                <?php echo $form->error($model, 'category_id'); ?>
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
                <?php echo $form->labelEx($model, 'little_description'); ?>
                <?php echo $form->textField($model, 'little_description', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'little_description'); ?></p>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'little_descriptionUA'); ?>
                <?php echo $form->textField($model, 'little_descriptionUA', ['class' => 'form-control']); ?>
                <p class="help-block"><?php echo $form->error($model, 'little_descriptionUA'); ?></p>
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

            <div class="form-group">
                <?php echo $form->labelEx($model, 'block'); ?>
                <?php echo $form->dropDownList($model, 'block', Product::itemAlias('block'), ['class' => 'form-control']); ?>
                <?php echo $form->error($model, 'block'); ?>
            </div>

            <button class="btn btn-default" type="submit"><?= $model->isNewRecord ? 'Создать' : 'Сохранить' ?></button>

            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div><!-- form -->
</div><!-- form -->