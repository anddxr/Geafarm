<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Категории / <small><?= CHtml::link('Создать категорию', Yii::app()->createUrl('admin/category/create')) ?></small>
        </h1>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'category-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'title',
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{update}{delete}'
                ),
            ),
        ));

        ?>
    </div>
</div>