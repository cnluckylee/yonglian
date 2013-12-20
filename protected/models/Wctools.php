<?php

/**
 * This is the model class for table "{{wctools}}".
 *
 * The followings are the available columns in table '{{wctools}}':
 * @property integer $id
 * @property string $title
 * @property double $score
 * @property string $imgurl
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property integer $IndustryID
 * @property string $downurl
 * @property integer $type
 */
class Wctools extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Wctools the static model class
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
		return '{{wctools}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IndustryID, type', 'numerical', 'integerOnly'=>true),
			array('score', 'numerical'),
			array('title, downurl', 'length', 'max'=>100),
			array('imgurl,pdf', 'length', 'max'=>255),
			array('content,remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, score, imgurl,pdf, remark, addtime, updtime, IndustryID, downurl, type', 'safe', 'on'=>'search'),
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
			'title' => '名称',
			'score' => '评分',
			'imgurl' => '图片',
			'remark' => '简介',
			'addtime' => 'Addtime',
			'updtime' => 'Updtime',
			'IndustryID' => '行业',
			'downurl' => '上传软件',
			'type' => '类型',
			'pdf' => 'pdf文件',
			'content' => '详情'
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
		$criteria->compare('score',$this->score);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('downurl',$this->downurl,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('pdf',$this->pdf);
		$criteria->compare('content',$this->content);
		$criteria->order = 'updtime DESC' ;
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
				$this->addtime=$this->updtime=date('Y-m-d H:i:s');
				$this->updtime=date('Y-m-d H:i:s');
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