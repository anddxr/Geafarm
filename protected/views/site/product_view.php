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
            <h2 class="marg"><?php
                                if($lang=='ua'){
                                    echo $model->titleUA;
                                }elseif($lang=='ru'){
                                    echo $model->title;
                                }else{
                                    echo 'error!';  
                                };?></h2>
            <div class="row">
                <article class="col-lg-12 col-md-12 col-sm-12">
                    <div class="thumb-pad1">
                        <div class="thumbnail">
                            <figure><img style="height: 70%" src="<?= $model->imageUrl ?>" alt=""></figure>
                            <div class="caption">
                                <p><?php
                                if($lang=='ua'){
                                    echo $model->descriptionUA;
                                }elseif($lang=='ru'){
                                    echo $model->description;
                                }else{
                                    echo 'error!';  
                                };?></p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </article>
    </div>
</div>

