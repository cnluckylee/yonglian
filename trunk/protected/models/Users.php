<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $comp_name
 * @property integer $comp_id
 * @property integer $create_time
 * @property integer $edit_time
 * @property integer $last_login_time
 * @property string $action
 * @property string $downurl
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comp_id, last_login_time', 'numerical', 'integerOnly'=>true),
			array('username, comp_name', 'length', 'max'=>100),
			array('password', 'length', 'max'=>50),
			array('action', 'length', 'max'=>200),
			array('downurl', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, comp_name, comp_id, create_time, edit_time, last_login_time, action, downurl', 'safe', 'on'=>'search'),
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
			'username' => '用户名',
			'password' => '密码',
			'comp_name' => 'Comp Name',
			'comp_id' => 'Comp',
			'create_time' => '创建时间',
			'edit_time' => 'Edit Time',
			'last_login_time' => 'Last Login Time',
			'action' => 'Action',
			'downurl' => '媒体文件',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('comp_name',$this->comp_name,true);
		$criteria->compare('comp_id',$this->comp_id);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('edit_time',$this->edit_time);
		$criteria->compare('last_login_time',$this->last_login_time);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('downurl',$this->downurl,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave()
	{
		if(parent::beforeSave())
		{

			if($this->isNewRecord)
			{
				$this->create_time=$this->edit_time=date('Y-m-d H:i:s');
				$this->password=md5($this->password);
			}
			else
			{
				$this->edit_time=date('Y-m-d H:i:s');
				$this->password=md5($this->password);
			}

			return true;
		}
		else
			return false;
	}
}