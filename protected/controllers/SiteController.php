<?php

class SiteController extends Controller {

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionProduct_view($id) {
        if (empty($id)) {
            $this->redirect(Yii::app()->homeUrl);
        }
        $model = Product::model()->findByPk($id);
        $this->render('product_view', [
            'model' => $model,
        ]);
    }

    public function actionProduct($id) {
        if (empty($id)) {
            $this->redirect(Yii::app()->homeUrl);
        }
        $category = Category::model()->findByPk($id);
        $models = Product::model()->findAll('category_id=:cat_id', [':cat_id' => $id]);
        $this->render('product', [
            'models' => $models,
            'category' => $category,
        ]);
    }

    public function actionCategory() {
        $models = Category::model()->findAll();
        $this->render('category', [
            'models' => $models,
        ]);
    }

    public function actionPage($id) {
        if (empty($id)) {
            $this->redirect(Yii::app()->homeUrl);
        }
        $model = Page::model()->findByPk($id);
        $this->render('page', [
            'model' => $model,
        ]);
    }

    public function actionIndex() {
        $criteria = new CDbCriteria;
        $criteria->compare('block', Product::BLOCK_UP, false, 'OR');
        $criteria->compare('block', Product::BLOCK_ALL, false, 'OR');
        $productsUpBlock = Product::model()->findAll($criteria);

        $categories = Category::model()->findAll();

        $this->render('index', [
            'productsUpBlock' => $productsUpBlock,
            'categories' => $categories,
        ]);
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {

        $setting = Settings::model()->find();
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail($setting->contact_email, $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Спасибо. Ваше письмо отправлено.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model, 'setting' => $setting));
    }
    
}
