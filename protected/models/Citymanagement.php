<?php

/**
 * This is the model class for table "{{citymanagement}}".
 *
 * The followings are the available columns in table '{{citymanagement}}':
 * @property integer $id
 * @property string $name
 * @property string $addtime
 * @property string $updtime
 * @property integer $status
 */
class Citymanagement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Citymanagement the static model class
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
		return '{{citymanagement}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('name,sort', 'required'),
			array('status,sort', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name,sort, addtime, updtime, status', 'safe', 'on'=>'search'),
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
			'id' => '排列序号',
			'name' => '地区名称',
			'addtime' => 'Addtime',
			'updtime' => '更新时间',
			'status' => 'Status',
			'sort' => '排列序号',
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
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->order = 'sort desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getList()
	{
		$criteria=new CDbCriteria;
		$criteria->select='*';  // 只选择 'title' 列
		$criteria->order = 'sort desc';
		$data=self::model()->findAll($criteria); // $params 不需要了
		return $data;
	}
	
	public static function getListSelect()
	{
		$criteria=new CDbCriteria;
		$criteria->select='*';  // 只选择 'title' 列
		$criteria->order = 'sort desc';
		$result = array();
		$result[] = array('id'=>'','name'=>'请选择');
		$data=self::model()->findAll($criteria); // $params 不需要了
		foreach($data as $i)
		{
			
			$arr = $i->attributes;
			$result[$arr['id']] = $arr;
		}

		return $result;
	}
	
		protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->addtime=$this->updtime=date('Y-m-d H:i:s');	
			}else{
				$this->updtime=date('Y-m-d H:i:s');
			}			
		return true;
		}
		else
			return false;	
	}
}
