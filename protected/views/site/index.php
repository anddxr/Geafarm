<div class="row">
    <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section class="slider">
            <div class="camera_wrap">
                <?php foreach ($categories as $category) { ?>
                    <div data-src="<?= $category->imageUrl?>"><div class="camera-caption fadeIn"><p class="title"><?= $category->slider_title?></p><a href="<?= Yii::app()->createAbsoluteUrl('site/product', ['id' => $category->id]) ?>" class="btn btn-success"><?php echo Yii::t('index', 'подробнее '); ?><span class="fa fa-angle-double-right"></span></a></div></div>
                <?php } ?>
            </div>
        </section>
    </article>

    <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slashBox">
        <p><strong><?php echo Yii::t('index', 'Лидеры продаж'); ?></strong><img src="<?php echo Yii::app()->request->baseUrl; ?>/design/img/slash.png" alt=""><?php echo Yii::t('index', 'Мы предлагаем только проверенные решения.'); ?></p>
    </article>
    <!--BLOCK 1-->
    <section class="col-lg-12 col-md-12 col-sm-12 bannerBox">
        <div class="row">

            <?php foreach ($productsUpBlock as $product) { ?>
                <article class="col-lg-4 col-md-4 col-sm-4">
                    <div class="thumb-pad1">
                        <div class="thumbnail">
                            <figure><a href="<?= Yii::app()->createAbsoluteUrl('site/product_view', ['id' => $product->id]) ?>"><img src="<?= $product->imageUrl ?>" alt=""></a></figure>
                            <div class="caption">
                                <a href="<?= Yii::app()->createAbsoluteUrl('site/product_view', ['id' => $product->id]) ?>"><p class="title"><?= $product->title ?></p></a>
                                <p><?= $product->little_description ?></p>
                                <a href="<?= Yii::app()->createAbsoluteUrl('site/product_view', ['id' => $product->id]) ?>" class="btn btn-success"><?php echo Yii::t('index', 'подробнее '); ?><span class="fa fa-angle-double-right"></span></a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </div>
    </section>

    <!--BLOCK 1-->


</div>



