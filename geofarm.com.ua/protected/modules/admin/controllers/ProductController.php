<?php

class ProductController extends AdminController
{

   public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('*'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('?'),
            ),
        );
    }
    
    
    public function actionCreate()
    {
        $model = new Product;
        $imageUpload = new ImageUpload('product_create');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Product'])) {
            $model->attributes = $_POST['Product'];
            $imageUpload->image = CUploadedFile::getInstance($imageUpload, 'image');
            if ($model->validate() && $imageUpload->validate()) {
                $model->image = $imageUpload->uploadFile();
                if ($model->save()) {
                    Yii::app()->user->setFlash('success_admin', "Продукт успешно создан.");
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'imageUpload' => $imageUpload,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $imageUpload = new ImageUpload('product_update');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Product'])) {
            $model->attributes = $_POST['Product'];
            $imageUpload->image = CUploadedFile::getInstance($imageUpload, 'image');
            if ($model->validate() && $imageUpload->validate()) {
                $image_name = $imageUpload->uploadFile();
                $model->image = !empty($image_name) ? $image_name : $model->image;
                if ($model->save()) {
                    Yii::app()->user->setFlash('success_admin', "Продукт успешно отредактирован.");
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
            'imageUpload' => $imageUpload,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Product('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Product']))
            $model->attributes = $_GET['Product'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Product the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Product::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Product $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
