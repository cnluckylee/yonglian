<?php

/**
 * This is the model class for table "{{company_news}}".
 *
 * The followings are the available columns in table '{{company_news}}':
 * @property integer $id
 * @property string $title
 * @property integer $cid
 * @property string $imgurl
 * @property string $content
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property integer $IndustryID
 * @property integer $CompanyID
 * @property integer $pid
 */
class YlProduct extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompanyNews the static model class
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
		return '{{yl_product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cid, IndustryID, CompanyID, pid', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('pname', 'length', 'max'=>300),
			array('imgurl,pdf', 'length', 'max'=>255),
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, cid, imgurl, content, remark, addtime, updtime, IndustryID, CompanyID, pid,pname,pdf', 'safe', 'on'=>'search'),
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
			'title' => '标题',
			'cid' => '类型',
			'imgurl' => '图片',
			'content' => '内容',
			'remark' => '摘要',
			'addtime' => 'Addtime',
			'updtime' => '更新时间',
			'IndustryID' => '行业',
			'CompanyID' => '公司',
			'pdf' =>'媒体文件',

			'pid' =>'产品',
			'pname' =>'产品'
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('CompanyID',$this->CompanyID);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('pname',$this->pname,true);
		$criteria->order = 'updtime desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getDataList($uid = null)
	{
		if(!$uid)
		{
			$model = self::model()->find(array('condition'=>'pid>0'));
			if($model)
				$pid = $model->pid;
		}
		if(!$pid)
			return array();
		$data = array();

		$data = self::model()->findAll(array(
						'condition'=>'pid=:pid','params'=>array(':pid'=>$pid)));
		$result = array();
		foreach($data as $i)
		{
			$arr = $i->attributes;
			$result[] = $arr;
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

			}
			else
			{
				$this->updtime=date('Y-m-d H:i:s');

			}

			return true;
		}
		else
			return false;
	}
}
