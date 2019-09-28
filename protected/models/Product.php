<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property integer $category_id
 * @property string $image
 * @property string $title
 * @property string $description
 * @property string $little_description
 *
 * The followings are the available model relations:
 * @property Categories $category
 */
class Product extends CActiveRecord
{

    const BLOCK_UP = 1;
    const BLOCK_DOWN = 2;
    const BLOCK_NULL = 0;
    const BLOCK_ALL = 3;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'products';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_id, block', 'numerical', 'integerOnly' => true),
            array('image, title, little_description', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, category_id, image, title, description, little_description, block', 'safe', 'on' => 'search'),
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
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'category_id' => 'Категория',
            'block' => 'Блок',
            'image' => 'Картинка',
            'title' => 'Название',
            'description' => 'Полное описание',
            'little_description' => 'Короткое описание',
        );
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
    public function getImageUrl()
    {
        if (!empty($this->image)) {

            return Yii::app()->request->baseUrl . Yii::app()->params->path . $this->image;
        }
        return;
    }
    public function getBlockText()
    {
        
        return Product::itemAlias('block', $this->block);
    }

    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('block', $this->block);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('little_description', $this->little_description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function itemAlias($type, $code = NULL)
    {
        $_items = array(
            'block' => array(
                self::BLOCK_NULL => 'Без блока',
                self::BLOCK_DOWN => 'В футере',
                self::BLOCK_UP => 'Верхний блок',
                self::BLOCK_ALL => 'В оба блока',
            )
        );
        if (isset($code))
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        else
            return isset($_items[$type]) ? $_items[$type] : false;
    }
}
