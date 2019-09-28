<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Редактирование продукта / <small><?= CHtml::link('Продукты', Yii::app()->createUrl('admin/product/index'))?></small>
        </h1>
    </div>
</div>


<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'imageUpload' => $imageUpload
));

?>