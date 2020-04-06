<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $id
 * @property string $title
 * @property string $titleUA
 * @property string $slider_title
 *
 * The followings are the available model relations:
 * @property Products[] $products
 */
class Category extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'categories';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, titleUA, description, descriptionUA', 'required'),
            array('title, titleUa, image, slider_title', 'length', 'max' => 255),
            array('description', 'descriptionUA', 'length'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, titleUA', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'products' => array(self::HAS_MANY, 'Product', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Название',
            'titleUA' => 'НазваниеUA',
            'image' => 'Картинка',
            'slider_title' => 'Короткое описание',
            'slider_titleUA' => 'Короткое описаниеUA',
            'description' => 'Полное описание',
            'descriptionUA' => 'Полное описаниеUA',
        );
    }

    public function getImageUrl()
    {
        if (!empty($this->image)) {

            return Yii::app()->request->baseUrl . Yii::app()->params->path . $this->image;
        }
        return;
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
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('titleUA', $this->titleUA, true);
        $criteria->compare('slider_title', $this->slider_title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('descriptionUA', $this->descriptionUA, true);
        $criteria->compare('image', $this->image, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Category the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
