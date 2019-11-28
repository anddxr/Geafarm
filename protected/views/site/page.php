<?php 
$lang = $_GET["lang"];
Yii::app()->setLanguage($lang);
?>
<div class="container">
    <div class="row">
        <article class="col-lg-12 col-md-12 col-sm-12 galleryBox">
            <h2 class="marg"><?php echo Yii::t('index', 'О нас'); ?><!--О нас--></h2>
            <div class="row">
                <?= $model->description ?>
            </div>
        </article>


    </div>
</div>

