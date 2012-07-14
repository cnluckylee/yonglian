<?php

/**
 * This is the model class for table "{{admin_role}}".
 *
 * The followings are the available columns in table '{{admin_role}}':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property integer $disabled
 *
 * The followings are the available model relations:
 * @property menus[] $AdminMenus
 * @property users[] $AdminUsers
 */
class AdminRole extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdminRole the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{admin_role}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('disabled', 'numerical', 'integerOnly' => true),
			array('name', 'length', 'max' => 50),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, disabled', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'menus' => array(self::MANY_MANY, 'AdminMenu', '{{admin_role_priv}}(role_id, menu_id)'),
			'users' => array(self::HAS_MANY, 'AdminUser', 'role_id'),
		);
	}
	
	public function setMenus() {
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'name' => '名称',
			'description' => '说明',
			'disabled' => '禁用',
		);
	}

	

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('disabled', $this->disabled);
		//print_r($criteria->toArray());
		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}
	
	/** ======================================================= */
	
	public static $iSDisabled = array(
		'否', '是'
	);
	
	public static $dataList = null;
	/**
	 *
	 * @param type $role_id 角色id
	 * @return array 角色列表 || 
	 */
	public static function getDataList($role_id = null) {
		if(self::$dataList == null) {
			$criteria = new CDbCriteria();
			$criteria->select = 'id,name';
			$criteria->compare('disabled', 0);
			self::$dataList = CHtml::listData(self::model()->findAll($criteria), 'id', 'name');
		}
		if($role_id==null) {
			return self::$dataList;
		} else {
			if(isset(self::$dataList[$role_id]))
				return self::$dataList[$role_id];
			else
				return FALSE;
		}
	}
	
	public  function getMenus() {
		$menus = array();
		foreach ($this->menus() as $menu) {
			$menus[$menu->id] = $menu->getAttributes();
		}
		
		return $menus;
	}
	
}