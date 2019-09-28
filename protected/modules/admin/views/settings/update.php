<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Настройки
        </h1>
    </div>
</div>




<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'imageUpload' => $imageUpload
));
?>