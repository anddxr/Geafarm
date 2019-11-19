<div class="container">
    <div class="row">
        <article class="col-lg-12 col-md-12 col-sm-12 galleryBox">
            <h2 class="marg"><?= $category->title ?></h2>
            <div class="row">
                <?php foreach ($models as $model) { ?>
                    <article class="col-lg-4 col-md-4 col-sm-4">
                        <div class="thumb-pad1">
                            <div class="thumbnail">
                                <figure><img src="<?= $model->imageUrl ?>" alt=""></figure>
                                <div class="caption">
                                    <p class="title"><?= $model->title ?></p>
                                    <p><?= $model->little_description ?></p>
                                    <a href="<?= Yii::app()->createAbsoluteUrl('site/product_view', ['id' => $model->id]) ?>" class="btn btn-primary"><?php echo Yii::t('index', 'подробнее '); ?><!--подробнее --><span class="fa fa-angle-double-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </article>
    </div>
</div>

