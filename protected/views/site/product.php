<?php 
$lang='ru';

if(isset($_GET['lang']) && $_GET['lang'] !== ''){
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time()+3600, '/');
} else {
    if(isset($_COOKIE['lang']) && $_COOKIE['lang'] !== ''){
     $lang = $_COOKIE['lang'];
    }
}
Yii::app()->setLanguage($lang);

?>
<div class="container">
    <div class="row">
        <article class="col-lg-12 col-md-12 col-sm-12 galleryBox">
            <h2 class="marg"><?= $category->title ?></h2>
            <div class="row">
                <?php foreach ($models as $model) { ?>
                    <article class="col-lg-4 col-md-4 col-sm-4">
                        <div class="thumb-pad1">
                            <div class="thumbnail">
                                <figure><a href="<?= Yii::app()->createAbsoluteUrl('site/product_view', ['id' => $model->id]),'/?lang' ?>"><img src="<?= $model->imageUrl ?>" alt=""></a></figure>
                                <div class="caption">
                                <a href="<?= Yii::app()->createAbsoluteUrl('site/product_view', ['id' => $model->id]),'/?lang' ?>"><p class="title"><?php
                                if($lang=='ua'){
                                    echo $model->titleUA;
                                }elseif($lang=='ru'){
                                    echo $model->title;
                                };?></p></a>
                                    <p><?php
                                if($lang=='ua'){
                                    echo $model->little_descriptionUA;
                                }elseif($lang=='ru'){
                                    echo $model->little_description;
                                };?></p>    
                                    <a href="<?= Yii::app()->createAbsoluteUrl('site/product_view', ['id' => $model->id]),'/?lang' ?>" class="btn btn-success"><?php echo Yii::t('index', 'подробнее '); ?><!--подробнее --><span class="fa fa-angle-double-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </article>
    </div>
</div>

