<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property integer $mid
 * @property string $name
 * @property string $act
 * @property integer $pid
 * @property string $isshow
 */
class Menu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
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
		return '{{menu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid', 'numerical', 'integerOnly'=>true),
			array('name, act', 'length', 'max'=>50),
			array('isshow', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mid, name, act, pid, is_show', 'safe', 'on'=>'search'),
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
			'mid' => 'Mid',
			'name' => 'Name',
			'act' => 'Act',
			'pid' => 'Pid',
			'isshow' => 'Isshow',
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

		$criteria->compare('mid',$this->mid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('act',$this->act,true);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('is_show',$this->is_show,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'dataProvider'=>$dataProvider
		));
	}
}
