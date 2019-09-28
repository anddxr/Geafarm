<?php

class SettingsController extends AdminController {

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

    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $imageUpload = new ImageUpload('setting_update');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Settings'])) {
            $model->attributes = $_POST['Settings'];
            $imageUpload->image = CUploadedFile::getInstance($imageUpload, 'image');
            if ($model->validate() && $imageUpload->validate()) {
                  $image_name = $imageUpload->uploadFile();
                $model->logo = !empty($image_name) ? $image_name : $model->logo;
                $model->admin_pass = !empty($model->pass) ? sha1($model->pass) : $model->admin_pass;
                if ($model->save()) {
                    Yii::app()->user->setFlash('success_admin', "Настройки сохранены.");
                    $this->redirect(Yii::app()->createUrl('admin/settings/update', ['id' => $model->id]));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
            'imageUpload' => $imageUpload,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Settings the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Settings::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Settings $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'settings-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
