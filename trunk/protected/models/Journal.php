<?php

/**
 * This is the model class for table "{{journal}}".
 *
 * The followings are the available columns in table '{{journal}}':
 * @property integer $id
 * @property string $title
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property string $downurl
 */
class Journal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Journal the static model class
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
		return '{{journal}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, imgurl,downurl', 'length', 'max'=>100),
			array('remark, addtime, updtime', 'safe'),
			array('imgurl,pdf', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, remark, addtime, updtime, downurl,pdf', 'safe', 'on'=>'search'),
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
			'remark' => '备注',
			'addtime' => '添加时间',
			'updtime' => '更新时间',
			'imgurl' => '图片地址',
			'downurl' => '文件地址',
			'pdf' => '媒体文件',
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
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('pdf',$this->downurl,true);
		$criteria->order = 'updtime DESC' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getArticleList($data)
	{
//解析$Company_city_id,$Company_Industry_id
		$criteria = new CDbCriteria();
		if(isset($data['IndustryID']) && $data['IndustryID']>0)
			$criteria->addCondition('IndustryID='.$data['IndustryID']);
		
		if(isset($data['title']))
			$criteria->addSearchCondition('title', $data['title']);
		
		if(isset($data['score']) && $data['score']>0)
			$criteria->addSearchCondition('score', $data['score']);
	
		$criteria->select = 't.*';
		
		$criteria->order = 'updtime desc';
	
	
		$count = self::model()->count($criteria);
	
	
		$pager = new CPagination($count);
		$pager->pageSize = 10;
		$pager->applyLimit($criteria);
		$artList = self::model()->findAll($criteria);
		$list = array();
		$ToolsType = BaseData::ToolsType();

		foreach($artList as $i)
		{
			$arr = $i->attributes;
			
			$list[] = $arr;
		}
		return array('pages'=>$pager,'posts'=>$list);
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