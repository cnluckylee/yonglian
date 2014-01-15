<?php

/**
 * This is the model class for table "{{CompanyCategory}}".
 *
 * The followings are the available columns in table '{{CompanyCategory}}':
 * @property integer $id
 * @property integer $cid
 * @property string $name
 * @property integer $order
 */
class CompanyCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompanyCategory the static model class
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
		return '{{CompanyCategory}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cid', 'required'),
			array('cid, order', 'numerical', 'integerOnly'=>true),
			array('name,companyName', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cid, name,companyName, order', 'safe', 'on'=>'search'),
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
			'id' => '序号',
			'cid' => '公司',
			'name' => '分类名称',
			'order' => '排序',
			'companyName'=>'公司名称'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($cid = null)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('companyName',$this->companyName,true);
		$criteria->compare('order',$this->order);
		if($cid)
			$criteria->compare('cid',$cid);
		$criteria->order = 'updtime desc' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function CreateCategory($cid,$categoryArr)
	{
		self::model()->deleteAll("cid=".$cid);
		foreach($categoryArr as $name)
		{
			
			$data = array('cid'=>$cid,'name'=>$name);
			self::model()->insert($data);
		}
	}
	
	public static function getList()
	{
		$result = array();
		$result[] = array('id'=>'','name'=>'请选择');
		$data = self::model()->findAll();
		foreach($data as $i)
		{
			$arr = $i->attributes;
			$result[$arr['id']] = $arr;
		}
		return $result;
	}
}