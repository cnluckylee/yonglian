<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $linkuser
 * @property string $tel
 * @property string $mail
 * @property string $website
 * @property string $addtime
 * @property string $updtime
 * @property integer $state
 * @property integer $type
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
			array('state, type,aid,CompanyID,IndustryID', 'numerical', 'integerOnly'=>true),
			array('username, linkuser, tel', 'length', 'max'=>100),
			array('password', 'length', 'max'=>50),
			array('mail, website,companyname,pdf,imgurl,aname,cname,IndustryName', 'length', 'max'=>255),
			array('addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password,pdf,imgurl,aid,CompanyID,aname,cname,IndustryName, linkuser, tel, mail, website, companyname,addtime, updtime, state, type', 'safe', 'on'=>'search'),
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
			'password' => '密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码',
			'linkuser' => '联系人员',
			'tel' => '联系方式',
			'mail' => '电子邮箱',
			'website' => '公司网址',
			'addtime' => 'Addtime',
			'updtime' => 'Updtime',
			'state' => '审核状态',
			'type' => '类型',
			'companyname' =>'企业名称',
			'pdf' =>'媒体文件',
			'imgurl' =>'头像',	
			'aid' => '地区名称',
			'CompanyID' =>'企业名称',
			'aname' =>'地区名称',
			'cname' =>'企业名称',
			'IndustryName' =>'行业名称',
			'IndustryID'=>'行业名称'
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($type = null)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('linkuser',$this->linkuser,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);		
		$criteria->compare('state',$this->state);
		if($type>0)
				$criteria->compare('type',$type);
		$criteria->compare('pdf',$this->pdf);
		$criteria->compare('imgurl',$this->imgurl);
		$criteria->compare('companyname',$this->companyname,true);
		$criteria->order = 'updtime desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * 根据类型获取相应用户
	 */
	public  static function findUsersByType($type=null,$CompanyID=null)
	{
		$where = array();
		if($type)
			$where['type'] = $type;
		if($CompanyID)
			$where['CompanyID'] = $CompanyID;
		$data = Users::model()->findAllByAttributes($where);
		$result = array();
		foreach($data as $i)
		{
			$arr = $i->attributes;
			$result[] = $arr;
		}
		return $result;
	}
	public static $isType= array(
	'企业', '个人','专家','舵主'
    );
	
	public static $isState= array(
			'待审核','审核通过', '审核不通过'
	);
	
    /**
     * check  user is only one
     */
	public static function checkonly($users)
	{
		$where = "companyname='".$users->companyname."' and linkuser ='".$users->linkuser."' and type =".$users->type;
		$data = self::model()->find($where);		
		return $data?1:0;
	}
    /*
	 * 修改登录验证
	 */
	public function validatePassword($password)
	{
	    return $this->encrypt($password)===trim($this->password);
	}
	/*
	 * 返回md5值
	 */ 
	public function encrypt($pass)
	{
	    return md5($pass);
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
			if(strlen($this->password)<>32)
			 $this->password = md5($this->password);
			if($this->CompanyID>0)
			{
				$company = Company::model()->findByPk($this->CompanyID);
				$this->companyname = $company?$company->name:"";
			}
			return true;
		}
		else
			return false;
	}
}
