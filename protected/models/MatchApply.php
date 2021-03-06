<?php

/**
 * This is the model class for table "{{match_apply}}".
 *
 * The followings are the available columns in table '{{match_apply}}':
 * @property integer $id
 * @property string $imgurl
 * @property string $title
 * @property string $remark
 * @property string $content
 * @property string $pdf
 * @property string $addtime
 * @property string $updtime
 */
class MatchApply extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatchApply the static model class
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
		return '{{match_apply}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,remark', 'required'),
			array('imgurl, title, remark, pdf', 'length', 'max'=>255),
			array('content, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, imgurl, title, remark, content, pdf, addtime, updtime', 'safe', 'on'=>'search'),
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
			'imgurl' => '图片上传',
			'title' => '赛事名称',
			'remark' => '赛事简介',
			'content' => '内容',
			'pdf' => '媒体文件',
			'addtime' => '更新日期',
			'updtime' => '更新时间',
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
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->order='updtime desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getApply()
	{
		$criteria=new CDbCriteria;
		$criteria->order = 'updtime desc';
		$criteria->limit = 5;
		$models = self::model()->findAll($criteria);
		foreach($models as $model)
		{
			$result[] = $model->attributes;
		}
		return $result;
	}
	/**
	 * (non-PHPdoc)
	 * @see CActiveRecord::beforeSave()
	 */
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
			if(isset($_POST['sszb']) && $_POST['sszb'])
			{
				$sszb = $_POST['sszb'];
				$this->sszb = implode(",",$sszb);
			}
			if(isset($_POST['ssxb']) && $_POST['ssxb'])
			{
				$ssxb = $_POST['ssxb'];
				$this->ssxb = implode(",",$ssxb);
			}
			return true;
		}
		else
			return false;
	}
}