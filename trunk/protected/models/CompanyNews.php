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
class CompanyNews extends CActiveRecord
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
		return '{{company_news}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,cid,IndustryName,aid,CompanyID,pid', 'required'),
			array('cid, IndustryID, CompanyID, pid,aid', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>70),
			array('imgurl,aname,IndustryName', 'length', 'max'=>255),
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, cid, aid,aname,imgurl, IndustryName,content, remark, addtime, updtime, IndustryID, CompanyID, pid', 'safe', 'on'=>'search'),
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
			'title' => '文章标题',
			'cid' => '类型图标',
			'imgurl' => '图片',
			'content' => '内容',
			'remark' => '摘要',
			'addtime' => 'Addtime',
			'updtime' => '更新日期',
			'IndustryID' => '所属行业',
			'CompanyID' => '用户名称',
			'pid' => '文章类别',
			'aid' =>'所在地区',
			'aname' =>'地区',
			'IndustryName'=>'所属行业'
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
		$criteria->compare('aid',$this->aid);
		$criteria->compare('IndustryName',$this->IndustryName,true);
		$criteria->compare('aname',$this->aname,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('CompanyID',$this->CompanyID);
		$criteria->compare('pid',$this->pid);
		$criteria->order = 'updtime DESC' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
			/**
	 * 获取文章列表
	 */
	public static function getMoreInfo($CompanyID=null,$pid=null,$limit = 5)
	{
		$cacheId = 'joint'.$pid.'_'.$limit;
// 		$menus = Yii::app()->getCache()->get($cacheId);
// 		if($menus)
// 			return $menus;
		$criteria = new CDbCriteria();
		$criteria->select = 'id,title,pid,CompanyID,updtime,cid';
		$criteria->addCondition('CompanyID='.$CompanyID);
		if($pid)
		$criteria->addCondition('pid='.$pid);
		$data = self::model()->findAll($criteria);
		$result = array();	
		$media = Alltype::getAllType(4);
		
		foreach($data as $i)
		{
			$arr = $i->attributes;			
			
			$arr['cname'] = isset($media[$arr['cid']])?$media[$arr['cid']]['name']:"";
			$arr['upddate'] = date('Y-m-d',strtotime($arr['updtime']));
			$result[] = $arr;
		}
		if($result)
			Yii::app()->getCache()->set($cacheId,$result,86400);
		return $result;
	}
	
	public static function enterprise($Company_city_id = null,$Company_Industry_id=null,$keyword=null,$pid=null)
	{
		$aid_str = '';
		//解析$Company_city_id,$Company_Industry_id
		if($Company_city_id){
			$area = new Area();
			$ids = $area->findnextIdByAid($Company_city_id,'id');
			$ids[] = $Company_city_id;
			$aid_str = implode(",", $ids);
		}
		$IndustryID_str = '';
		if($Company_Industry_id){
			$industry = new AdminIndustry();
			$inds = $industry->findnextIdByAid($Company_Industry_id,'id');
			$inds[] = $Company_Industry_id;
			$IndustryID_str = implode(",", $inds);
		}
		$criteria = new CDbCriteria();
		if($aid_str)
			$criteria->addCondition('aid in ('.$aid_str.')');
		if($IndustryID_str)
			$criteria->addCondition('t.IndustryID in('.$IndustryID_str.')');
		if($keyword)
			$criteria->addSearchCondition('c.name', $keyword);
			
		$criteria->select = 't.*';
		$criteria->join = 'join {{company}} as c on c.id=t.CompanyID';
		$criteria->order = 'updtime desc';
		$criteria->group = 'CompanyId';
		if($pid)
			$criteria->addCondition('t.pid='.$pid);
		$count = self::model()->count($criteria);
	

		$pager = new CPagination($count);
		$pager->pageSize = 10;
		$pager->applyLimit($criteria);
		$artList = self::model()->findAll($criteria);
		$list = array();

		foreach($artList as $i)
		{
			$arr = $i->attributes;
			if(!isset($list[$arr['CompanyID']]['name'])){
	
				$cc = Company::model()->findByPk($arr['CompanyID']);
	
				$companyName = '';
				if($cc){
					$temp = $cc->attributes;
					$companyName = $temp['name'];
					$list[$arr['CompanyID']]['id'] = $cc->id;
				}
				$list[$arr['CompanyID']]['name'] = $companyName;
			}
			
			$list[$arr['CompanyID']]['data'] = self::getMoreInfo($arr['CompanyID'],$pid);
		}
		return array('pages'=>$pager,'posts'=>$list);
	
	}
	
	function getListForIndex($limit = 5)
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->order = 'updtime desc';
		$criteria->group = 'CompanyId';
		$criteria->limit = $limit;
		$data =  self::model()->findAll($criteria);
		$result = array();
		foreach($data as $i)
		{
			$result[] = $i->attributes;
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
			}else{
				date_default_timezone_set('PRC');
				$this->updtime=date('Y-m-d H:i:s');
			}
	
			return true;
		}
		else
			return false;
	}
}
