<section class="formBox">
    <div class="container">
        <div class="row">
            <article class="col-lg-4 col-md-4 col-sm-4">
                <h2 class="marg"><?php echo Yii::t('contact', 'Контакты'); ?><!--Контакты--></h2>
                <div class="info">
                    <h3>Email:</h3>
                    <p><?= $setting->contact_email ?></p>
                    <h3>Телефон:</h3>
                    <p><?= $setting->contact_number ?></p>
                    <h3><?php echo Yii::t('contact', 'Адрес'); ?><!--Адрес-->:</h3>
                    <p><?= $setting->contact_adress ?></p>
                </div>
            </article>
            <article class="col-lg-8 col-md-8 col-sm-8">
                <h2 class="marg"><?php echo Yii::t('contact', 'Контактная форма'); ?><!--Контактная форма--></h2>


                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'contact-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));

                ?>
                <?php echo $form->errorSummary($model); ?>
                <div class="holder">
                    <div class="form-div-1 clearfix">
                        <label class="name">

                            <?php echo $form->textField($model, 'name'); ?>
                            <?php echo $form->error($model, 'name'); ?>
                            <span class="_placeholder" style="left: 0px; top: 0px; width: 210px; height: 44px;">* <?php echo Yii::t('contact', 'Имя'); ?><!--Имя-->:</span>

                        </label>
                    </div>
                    <div class="form-div-2 clearfix">
                        <label class="email">
                            <?php echo $form->textField($model, 'email'); ?>
                            <?php echo $form->error($model, 'email'); ?>
                            <span class="_placeholder" style="left: 0px; top: 0px; width: 210px; height: 44px;">* E-mail:</span>
                        </label>
                    </div>
                    <div class="form-div-3 clearfix">
                        <label class="phone notRequired">
                            <?php echo $form->textField($model, 'subject'); ?>
                            <?php echo $form->error($model, 'subject'); ?>
                            <span class="_placeholder" style="left: 0px; top: 0px; width: 210px; height: 44px;">Тема:</span>
                        </label>
                    </div>
                </div>
                <div class="form-div-4 clearfix">
                    <label class="message">
                        <?php echo $form->textArea($model, 'body'); ?>
                        <?php echo $form->error($model, 'body'); ?>
                        <span class="_placeholder" style="left: 0px; top: 0px; width: 740px; height: 282px;">* <?php echo Yii::t('contact', 'Сообщение'); ?><!--Сообщение-->:</span>

                    </label>
                </div>
                <div class="btns">


                    <button type="submit" class="btn-default btn3"><?php echo Yii::t('contact', 'Отправить'); ?><!--Отправить--> <span class="fa fa-angle-double-right"></span></button>
                    <p>* <?php echo Yii::t('contact', 'Обязательные поля'); ?><!--Обязательные поля--></p>
                </div>  
                <?php $this->endWidget(); ?>
            </article>
        </div>
    </div>
</section>

