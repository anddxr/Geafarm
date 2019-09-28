<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Редактирование категории / <small><?= CHtml::link('Категории', Yii::app()->createUrl('admin/category/index'))?></small>
        </h1>
    </div>
</div>



<?php $this->renderPartial('_form', array(
      'model'=>$model,
    'imageUpload'=>$imageUpload
    )); ?>