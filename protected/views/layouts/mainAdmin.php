<?php
$setting = Settings::model()->find();
?>

<!DOCTYPE html>
<html lang="ru">

    <head>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo CHtml::encode($setting->title); ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/design_admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/design_admin/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/design_admin/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/design_admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./admin"><?php echo CHtml::encode($setting->title); ?></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">

                    <?php if (!Yii::app()->user->isGuest) { ?>
                        <li>
                            <a href="<?= Yii::app()->createAbsoluteUrl('site/index') ?>"  ><i class="fa fa-fw fa-desktop"></i> На сайт </a>

                        </li>
                        <li>
                            <a href="<?= Yii::app()->createAbsoluteUrl('admin/default/logout') ?>"  ><i class="fa fa-user"></i> Выйти </a>

                        </li>
                    <?php } ?>
                </ul>
                <?php if (!Yii::app()->user->isGuest) { ?>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items' => array(
                                array('label' => '<i class="fa fa-fw fa-dashboard"></i> Категории', 'url' => array('/admin/category/index')),
                                array('label' => '<i class="fa fa-fw fa-dashboard"></i> Продукты', 'url' => array('/admin/product/index')),
                                array('label' => '<i class="fa fa-fw fa-dashboard"></i> Настройки', 'url' => array('/admin/settings/update', 'id' => Settings::model()->find()->id)),
                                array('label' => '<i class="fa fa-fw fa-dashboard"></i> О нас', 'url' => array('/admin/page/update', 'id' => Page::model()->find()->id)),
                            ),
                            'htmlOptions' => [
                                'class' => 'nav navbar-nav side-nav'
                            ],
                            'encodeLabel' => false,
                        ));
                        ?>
                    </div>
                <?php } ?>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <?php if (Yii::app()->user->hasFlash('success_admin')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?php echo Yii::app()->user->getFlash('success_admin'); ?>
                        </div>
                    <?php endif; ?>
                    <?= $content ?>
                </div>
            </div>
        </div>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design_admin/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/design_admin/js/plugins/morris/raphael.min.js"></script>
    </body>
</html>
