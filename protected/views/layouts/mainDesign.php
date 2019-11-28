<?php
$categories = Category::model()->findAll();
$setting = Settings::model()->find();
$page = Page::model()->find('code=:code', [':code' => Page::CODE_ABOUT]);

$lang = $_GET["lang"];
Yii::app()->setLanguage($lang);

$criteria = new CDbCriteria;
$criteria->compare('block', Product::BLOCK_DOWN, false, 'OR');
$criteria->compare('block', Product::BLOCK_ALL, false, 'OR');
$productsDownBlock = Product::model()->findAll($criteria);
?>
<html lang="ru">
    <head>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <title><?php echo CHtml::encode($setting->title); ?></title>
        <meta charset="utf-8">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/design/img/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/design/img/favicon.ico" type="image/x-icon" />
        <meta name="description" content="<?= $setting->meta_description ?>">
        <meta name="keywords" content="<?= $setting->meta_keywords ?>">

        <!--CSS-->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/design/css/bootstrap.css" >
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/design/css/style.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/design/css/camera.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/design/fonts/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <!--JS-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design/js/superfish.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design/js/jquery.easing.1.3.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design/js/jquery.mobilemenu.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design/js/jquery.ui.totop.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design/js/jquery.equalheights.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design/js/camera.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design/js/sform.js"></script>
        <script>
            $(document).ready(function () {
                jQuery('.camera_wrap').camera({
                    height: '41%',
                });

                $('.navbar').mobileMenu({
                    defaultText: '...',
                });
            });
        </script>

        <!--[if (gt IE 9)|!(IE)]><!-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design/js/jquery.mobile.customized.min.js"></script>
        <!--<![endif]-->
        <!--[if lt IE 9]>
            <div style='text-align:center'><a href="../../windows.microsoft.com/en-us/internet-explorer/products/ie/home@ocid=ie6_countdown_bannercode"><img src="../../storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div>  
          <![endif]-->
        <!--[if lt IE 9]><script src="../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../../https@oss.maxcdn.com\libs\html5shiv\3.7.0\html5shiv.js"></script>
          <script src="../../https@oss.maxcdn.com\libs\respond.js\1.3.0\respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--header-->
        <header>
            <div class="container">
                <div class="row">
                    <article class="col-lg-12 col-md-12 col-sm-12">
                        <h1 class="navbar-brand navbar-brand_"><a href="<?= Yii::app()->homeUrl ?>?lang"><img height="100" src="<?= $setting->logoUrl ?>" alt=""></a></h1>
                        <section>
                            <br><br><br>
                            <div class="clearfix"></div>
                            <nav class="navbar navbar-default navbar-static-top tm_navbar clearfix" role="navigation">
                                <ul class="nav sf-menu clearfix">
                                    <li class="active"><a href="<?php echo Yii::app()->request->baseUrl; ?>"><?php echo Yii::t('index', 'Главная'); ?></a></li>
                                <select onchange="top.location=this.value" name="lang">
                                <option value="none" hidden="">Выберите язык</option>
                                <option value="?lang=ua">Українська</option>
                                <option value="?lang=ru">Русский</option>
                                </select>
                                    <li class="sub-menu"><a href="<?= Yii::app()->createAbsoluteUrl('site/category/?lang') ?>"><?php echo Yii::t('index', 'Товары и услуги'); ?><span></span></a>
                                        <ul class="submenu">
                                            <?php if (!empty($categories)) { ?>
                                                <?php foreach ($categories as $category) { ?>
                                                    <li><a href="<?= Yii::app()->createAbsoluteUrl('site/product/', ['cat_id' => $category->id]),'/?lang' ?>"><?= $category->title ?></a></li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?= Yii::app()->createAbsoluteUrl('site/page/', ['id' => Page::model()->find('code=:code', [':code' => Page::CODE_ABOUT])->id]),'/?lang' ?>"><?php echo Yii::t('index', 'О нас'); ?></a></li>
                                    <li><a href="<?= Yii::app()->createAbsoluteUrl('site/contact/?lang') ?>"><?php echo Yii::t('contact', 'Контакты'); ?></a></li>
                                </ul>
                                
                            </nav>
                        </section>
                    </article>
                </div>
            </div>
        </header>
        <div class="global">

            <div class="container">
                <div class="support_title">
                    <p class="tel"><span class="fa fa-phone"></span><?= $setting->contact_number ?></p> <em>|</em>
                    <p class="ml"><span class="fa fa-envelope-o"></span><a href="mailto:<?= $setting->contact_email ?>;"><?= $setting->contact_email ?></a></p>
                </div>

                <?php if (Yii::app()->user->hasFlash('contact')) { ?>

                    <div class="flash-success">
                        <?php echo Yii::app()->user->getFlash('contact'); ?>
                    </div>

                <?php } ?>

                <?php echo $content; ?>
            </div>



            <section class="pricingBox">
                <div class="container">
                    <div class="row">
                        <article class="col-lg-4 col-md-6 col-sm-6">
                            <h2><?php echo Yii::t('index', 'Специальные предложения'); ?></h2>
                            <div class="row">
                                <?php
                                $key = 1;
                                ?>
                                <?php foreach ($productsDownBlock as $k => $product) { ?>
                                    <?php if ($key == 1) { ?>
                                        <article class="col-lg-6 col-md-6 col-sm-6">
                                            <ul>
                                            <?php } ?>
                                            <li><a href="<?= Yii::app()->createAbsoluteUrl('site/product_view', ['id' => $product->id]) ?>"><?= $product->title ?></a></li>

                                            <?php if ($key == 6) { ?>
                                            </ul>
                                        </article>
                                        <?php $key = 0; ?>
                                    <?php } ?>
                                    <?php $key++; ?>
                                <?php } ?>

                            </div>
                        </article>
                        <article class="col-lg-7 col-md-6 col-sm-6 col-lg-offset-1 newslatter-form">
                            <h3><?php echo Yii::t('index', 'Проверенные решения по справедливой стоимости'); ?></h3>
                            <p><?= $page->little_description ?><a href="<?= Yii::app()->createAbsoluteUrl('site/page', ['id' => $page->id]) ?>">[ <?php echo Yii::t('index', 'подробнее '); ?> ]</a></p>

                        </article>
                    </div>
                </div>
            </section>
        </div>
        <!--footer-->
        <footer>
            <div class="container priv-box">
                <div class="row">
                    <article class="col-lg-4 col-md-4 col-sm-4">

                    </article>
                    <article class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-1">

                    </article>
                    <article class="col-lg-3 col-md-3 col-sm-3">
                        <figure><img height="100" src="<?= $setting->logoUrl ?>" alt=""></figure>
                    </article>
                </div>
            </div>
        </footer>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design/js/bootstrap.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69483433-1', 'auto');
  ga('send', 'pageview');

</script>
    </body>
</html>