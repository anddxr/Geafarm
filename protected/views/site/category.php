<div class="container">
    <div class="row">
        <article class="col-lg-12 col-md-12 col-sm-12 galleryBox">
            <h2 class="marg">Товары и услуги</h2>
            <div class="row">

                <?php foreach ($models as $model) { ?>
                    <article class="col-lg-6 col-md-6 col-sm-6">
                        <div class="thumb-pad1">
                            <div class="thumbnail">
                                <figure><img src="<?= $model->imageUrl ?>" alt=""></figure>
                                <div class="caption">
                                    <p class="title"><?= $model->title ?></p>
                                    <p><?= $model->description ?></p>
                                    <a href="<?= Yii::app()->createAbsoluteUrl('site/product', ['cat_id' => $model->id]) ?>" class="btn-default btn2">подробнее <span class="fa fa-angle-double-right"></span></a>
                                </div>


                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </article>


    </div>
</div>

