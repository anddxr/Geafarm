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
            <h2 class="marg"><?php echo Yii::t('index', 'О нас'); ?><!--О нас--></h2>
            <div class="row">
            <?php
                if($lang=='ua'){
                    echo $model->descriptionUA;
                }elseif($lang=='ru'){
                    echo $model->description;
                }else{
                    echo 'error!';  
                };?>
            </div>
        </article>


    </div>
</div>

