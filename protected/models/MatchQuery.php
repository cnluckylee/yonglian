<?php

/**
 * This is the model class for table "{{match_query}}".
 *
 * The followings are the available columns in table '{{match_query}}':
 * @property integer $id
 * @property string $title
 * @property string $subject
 * @property string $condition
 * @property string $other
 * @property string $imgurl
 * @property string $pdf
 * @property string $addtime
 * @property string $updtime
 */
class MatchQuery extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatchQuery the static model class
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
		return '{{match_query}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cid', 'numerical', 'integerOnly'=>true),
			array('title', 'required'),
			array('title, imgurl, pdf,cname', 'length', 'max'=>255),
			array('subject, condition, other, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id,cid,cname, title, subject, condition, other, imgurl, pdf, addtime, updtime', 'safe', 'on'=>'search'),
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
			'title' => '标题',
			'subject' => '主旨',
			'condition' => '条件',
			'other' => '其他',
			'imgurl' => '图片',
			'pdf' => '媒体文件',
			'addtime' => 'Addtime',
			'updtime' => '更新时间',
			'cid' =>'赛事查询名称',
			'cname' =>'赛事查询名称',
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
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('condition',$this->condition,true);
		$criteria->compare('other',$this->other,true);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('cid',$this->cid,true);
		$criteria->compare('cname',$this->cname,true);
		$criteria->order = 'updtime desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	public function getCRApply($cid=null,$limit =5)
	{
		$criteria=new CDbCriteria;
		if($cid>0)
			$criteria->compare('cid', $cid);
		$criteria->order = 'updtime desc';
		$criteria->limit = $limit;
		
		$models = self::model()->findAll($criteria);
		foreach($models as $model)
		{
			$result[] = $model->attributes;
		}
		return $result;
	}
}