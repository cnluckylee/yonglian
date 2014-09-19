<?php

/**
 * This is the model class for table "{{agencies}}".
 *
 * The followings are the available columns in table '{{agencies}}':
 * @property integer $id
 * @property string $name
 */
class Agencies extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Agencies the static model class
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
		return '{{agencies}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('name', 'required'),
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
			'id' => '自动序号',
			'name' => '机构名称',
			'updtime' => '更新日期',
		);
	}

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
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->order = 'updtime desc' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getDataList($cid=null)
	{
		$sqlData = self::model()->findAll();
		$result = array();
		foreach($sqlData as $i)
		{
			$arr = $i->attributes;
			$result[$arr['id']] = $arr['name'];
		}
		return $result;
	}
	protected function beforeSave()
	{
		$this->updtime=date('Y-m-d H:i:s');
		return true;
	}
}