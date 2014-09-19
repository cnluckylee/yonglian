<?php

/**
 * This is the model class for table "{{pic}}".
 *
 * The followings are the available columns in table '{{pic}}':
 * @property integer $id
 * @property string $title
 * @property integer $type
 * @property string $imgurl
 * @property string $imglink 
 * @property integer $clickcount
 * @property integer $addtime
 * @property integer $updtime
 */
class adminPic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return adminPic the static model class
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
		return '{{pic}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('title,imglink,type,imgurl', 'required'),
			array('type, clickcount, addtime, updtime', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('imglink', 'length', 'max'=>255),
			array('imgurl','file','allowEmpty'=>true,'types'=>'jpg, gif, png','maxSize'=>1024 * 1024 * 10,'tooLarge'=>'上传图片已超过10M'),
			array('imgurl, imglink', 'length', 'max'=>200),
			array('id, title, type, imgurl, imglink, clickcount, addtime, updtime', 'safe', 'on'=>'search'),
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
			'title' => '广告标题',
			'type' => '栏目位置',
			'imgurl' => '缩略图',
			'imglink' => '缩略图',
			'clickcount' => '点击次数',
			'addtime' => '添加时间',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('imglink',$this->imglink,true);
		$criteria->compare('clickcount',$this->clickcount);
		$criteria->compare('addtime',$this->addtime);
		$criteria->compare('updtime',$this->updtime);

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
				$this->addtime=$this->updtime=time();
			}
			else
			{
				$this->updtime=time();
			}
			return true;
		}
		else
			return false;
	}
}
