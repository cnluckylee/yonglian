<?php

/**
 * This is the model class for table "{{cwpolicy}}".
 *
 * The followings are the available columns in table '{{cwpolicy}}':
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
 * @property string $Agency
 */
class Cwpolicy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cwpolicy the static model class
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
		return '{{cwpolicy}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,aid,IndustryID,imgurl,Agency,level,policy,remark', 'required'),
			array('aid, IndustryID, CompanyID,Agency,level,policy', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('imgurl', 'length', 'max'=>255),
			
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, aid,pdf,policy,level, imgurl, content, remark, addtime, updtime, IndustryID, CompanyID, Agency', 'safe', 'on'=>'search'),
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
			'title' => '文章标题',
			'aid' => '所在地区',
			'imgurl' => '期刊图片',
			'content' => '内容',
			'remark' => '文章简介',
			'addtime' => '添加时间',
			'updtime' => '更新日期',
			'IndustryID' => '所属行业',
			'CompanyID' => '公司',
			'Agency' => '颁布机构',
			'level' => '行政级别',
			'pdf' => '媒体文件',
			'policy' => '文章类型',
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
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('CompanyID',$this->CompanyID);
		$criteria->compare('Agency',$this->Agency);
		$criteria->compare('level',$this->level);
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
		if(isset($data['policy']) && $data['policy']>0)
			$criteria->addCondition('policy='.$data['policy']);
		if(isset($data['aid']) && $data['aid']>0)
			$criteria->addCondition('aid='.$data['aid']);
		if(isset($data['title']))
			$criteria->addSearchCondition('title', $data['title']);
		
	
	
		$criteria->select = 't.*';
	
		$criteria->order = 'updtime desc';
	
	
		$count = self::model()->count($criteria);
		$level = Level::getDataList();
		$Agencies = Agencies::getDataList();
		$pager = new CPagination($count);
		$pager->pageSize = 10;
		$pager->applyLimit($criteria);
		$artList = self::model()->findAll($criteria);
		$list = array();
		$ToolsType = BaseData::ToolsType();
	
		foreach($artList as $i)
		{
			$arr = $i->attributes;
			if($arr['level'])
				$arr['level'] = $level[$arr['level']]['mark'];
			if($arr['Agency'])
				$arr['Agency'] = $Agencies[$arr['Agency']];
				
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