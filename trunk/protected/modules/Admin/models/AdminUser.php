<?php

/**
 * This is the model class for table "{{admin_user}}".
 *
 * The followings are the available columns in table '{{admin_user}}':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $role_id
 * @property integer $disabled
 * @property string $setting
 *
 * The followings are the available model relations:
 * @property AdminRole $role
 */
class AdminUser extends CActiveRecord {
	
	/**
	 * 确认密码
	 * @var string 
	 */
	public $repassword;
	/**
	 * 是否更新密码
	 * @var type 
	 */
	public $isUpdatePassword = false;
	
	/**
	 * 旧密码数据 
	 */
	protected $oldPassword;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdminUser the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{admin_user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username,  name, role_id', 'required'),
			array('disabled', 'numerical', 'integerOnly' => true),
			array('username, name', 'length', 'max' => 50, 'min'=>2),
			array('username', 'unique'),
			array('password', 'length', 'max' => 20, 'min'=>6),
			array('password', 'required', 'on'=>'insert'),
			array('password', 'validatorPassord', 'on'=>'update'),
			array('role_id', 'length', 'max' => 10),
			array('setting,isUpdatePassword', 'safe'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, name, role_id, disabled, setting', 'safe', 'on' => 'search'),
		);
	}
	public function validatorPassord($attribute,$params) {
		if($this->getScenario() == 'update' && $this->isUpdatePassword) {
			//print_r($this->attributes);exit;
			if(empty($this->password))
				$this->addError('password','请填写密码。');
		}
		
	}
	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'role' => array(self::BELONGS_TO, 'AdminRole', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'username' => '用户名',
			'password' => '密码',
			'name' => '姓名',
			'role_id' => '角色',
			'disabled' => '禁用',
			'setting' => '设置',
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
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('role_id', $this->role_id, true);
		$criteria->compare('disabled', $this->disabled);
		$criteria->compare('setting', $this->setting, true);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}
	
	
	/**
	 * 保存前
	 * @var type 
	 */
	public function beforeSave() {
		if(!parent::beforeSave()) return FALSE;
		if($this->isNewRecord || $this->isUpdatePassword)
			$this->password = self::hashPassword($this->password);
		else {
			$this->password = $this->oldPassword;
		}
		return TRUE;
	}
	public function afterFind() {
		parent::afterFind();
		$this->oldPassword = $this->password;
	}
	public static $iSDisabled = array(
		'否', '是'
	);
	
	/**
	 *
	 * @param string $password 明文密码
	 * @return string 加密后
	 */
	public static function hashPassword($password) {
		return md5($password);
	}

}