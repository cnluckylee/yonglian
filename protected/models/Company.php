<?php

/**
 * This is the model class for table "{{company}}".
 *
 * The followings are the available columns in table '{{company}}':
 * @property integer $id
 * @property string $name
 * @property string $pinyin
 * @property string $city
 * @property integer $city_id
 * @property integer $type
 * @property string $desct
 * @property string $product
 * @property integer $rec
 */
class Company extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{company}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id, type, rec', 'numerical', 'integerOnly'=>true),
			array('name, city', 'length', 'max'=>20),
			array('pinyin', 'length', 'max'=>100),
			array('product', 'length', 'max'=>200),
			array('desct', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pinyin, city, city_id, type, desct, product, rec', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '名称',
			'pinyin' => '拼音',
			'city' => '所属城市',
			'city_id' => 'City',
			'type' => '类型',
			'desct' => '描述',
			'product' => '产品',
			'rec' => '是否推荐',
		);
	}
    public static $sec= array(
	'否', '是'
    );
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pinyin',$this->pinyin,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('desct',$this->desct,true);
		$criteria->compare('product',$this->product,true);
		$criteria->compare('rec',$this->rec);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}