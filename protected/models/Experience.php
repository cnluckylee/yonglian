<?php

/**
 * This is the model class for table "{{experience}}".
 *
 * The followings are the available columns in table '{{experience}}':
 * @property integer $id
 * @property string $title
 * @property integer $aid
 * @property string $imgurl
 * @property string $content
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property integer $IndustryID
 * @property integer $CompanyID
 * @property double $score
 * @property integer $type
 */
class Experience extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Experience the static model class
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
		return '{{experience}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aid, IndustryID, CompanyID, type,cid,uid', 'numerical', 'integerOnly'=>true),
			array('score', 'numerical'),
			array('title', 'length', 'max'=>200),
			array('imgurl,pdf,uname', 'length', 'max'=>255),
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, aid, imgurl,uid,uname, pdf,content,cid, remark, addtime, updtime, IndustryID, CompanyID, score, type', 'safe', 'on'=>'search'),
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
			'aid' => '项目',
			'imgurl' => '图片',
			'content' => '内容',
			'remark' => '简介',
			'addtime' => 'Addtime',
			'updtime' => 'Updtime',
			'IndustryID' => '行业',
			'CompanyID' => '公司',
			'score' => '评分',
			'type' => '类型',
			'pdf' => '媒体文件',
			'cid' =>'城市',
			'uname' => '用户名称',
			'uid' => '用户名称',
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
		$criteria->compare('aid',$this->aid);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('CompanyID',$this->CompanyID);
		$criteria->compare('score',$this->score);
		$criteria->compare('type',$this->type);
		$criteria->compare('pdf',$this->pdf);
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
			if($arr['type'])
				$arr['type'] = $ToolsType[$arr['type']]['name'];
				
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