<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ImageUpload extends CFormModel
{

    public $image;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            array('image', 'file', 'allowEmpty' => false, 'types' => "jpg, jpeg, png, gif", 'on' => 'cat_create, product_create'),
            array('image', 'file', 'allowEmpty' => true, 'types' => "jpg, jpeg, png, gif", 'on' => 'cat_update, product_update, setting_update'),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'image' => 'Картинки',
        );
    }

    public function uploadFile()
    {
        if (!empty($this->image)) {
            $name = uniqid('news_') . '.' . $this->image->getExtensionName();
            $path = Yii::getPathOfAlias('webroot') . Yii::app()->params->path . $name;
            $this->image->saveAs($path);
            return $name;
        }
        return;
    }
}
