<?php

/**
 * This is the model class for table "{{admin_menu}}".
 *
 * The followings are the available columns in table '{{admin_menu}}':
 * @property string $id
 * @property string $name
 * @property string $parentid
 * @property string $modules
 * @property string $controller
 * @property string $action
 * @property string $data
 * @property string $ico
 * @property integer $listorder
 * @property integer $display
 *
 * The followings are the available model relations:
 * @property AdminRole[] $ylAdminRoles
 */
class AdminMenu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdminMenu the static model class
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
		return '{{admin_menu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modules', 'required'),
			array('listorder, display', 'numerical', 'integerOnly'=>true),
			array('name, modules', 'length', 'max'=>50),
			array('parentid, controller, action, ico', 'length', 'max'=>20),
			array('data', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, parentid, modules, controller, action, data, ico, listorder, display', 'safe', 'on'=>'search'),
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
			'ylAdminRoles' => array(self::MANY_MANY, 'AdminRole', '{{admin_role_priv}}(menu_id, role_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'parentid' => 'Parentid',
			'modules' => 'Modules',
			'controller' => 'Controller',
			'action' => 'Action',
			'data' => 'Data',
			'ico' => 'Ico',
			'listorder' => 'Listorder',
			'display' => 'Display',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parentid',$this->parentid,true);
		$criteria->compare('modules',$this->modules,true);
		$criteria->compare('controller',$this->controller,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('ico',$this->ico,true);
		$criteria->compare('listorder',$this->listorder);
		$criteria->compare('display',$this->display);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}