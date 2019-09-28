<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Продукты / <small><?= CHtml::link('Создать продукты', Yii::app()->createUrl('admin/product/create')) ?></small>
        </h1>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'product-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                [
                    'filter' => CHtml::dropDownList('Product[category_id]', !empty($_GET['Product']['category_id']) ? $_GET['Product']['category_id'] : '', CHtml::listData(Category::model()->findAll(), 'id', 'title'), ['empty'=>'']),
                    'name' => 'category_id',
                    'value' => '$data->category->title',
                ],
                [
                    'filter' => CHtml::dropDownList('Product[block]', !empty($_GET['Product']['block']) ? $_GET['Product']['block'] : '', Product::itemAlias('block'), ['empty'=>'Все']),
                    'name' => 'block',
                    'value' => '$data->blockText',
                ],
                'title',
                'little_description',
                /*
                  'block',
                 */
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{update}{delete}'
                ),
            ),
        ));

        ?>
    </div>
</div>