<?php

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 * @property string $admin_email
 * @property string $admin_pass
 * @property string $logo
 * @property string $title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $contact_number
 * @property string $contact_email
 * @property string $contact_adress
 */
class Settings extends CActiveRecord {

    public $pass;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'settings';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('admin_email, admin_pass, logo, title, contact_number, contact_email, pass', 'length', 'max' => 255),
            array('meta_description, meta_keywords, contact_adress', 'safe'),
            array('contact_email', 'email'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('admin_email, admin_pass, logo, title, meta_description, meta_keywords, contact_number, contact_email, contact_adress, pass', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'admin_email' => 'Логин',
            'admin_pass' => 'Пароль',
            'pass' => 'Пароль',
            'logo' => 'Лого',
            'title' => 'Название сайта',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'contact_number' => 'Контактный телефон',
            'contact_email' => 'Контактный Email',
            'contact_adress' => 'Контактный Адресс',
        );
    }

    public function getLogoUrl() {
        return Yii::app()->request->baseUrl . Yii::app()->params->path . $this->logo;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('admin_email', $this->admin_email, true);
        $criteria->compare('admin_pass', $this->admin_pass, true);
        $criteria->compare('logo', $this->logo, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('contact_number', $this->contact_number, true);
        $criteria->compare('contact_email', $this->contact_email, true);
        $criteria->compare('contact_adress', $this->contact_adress, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Settings the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
