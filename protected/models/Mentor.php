<?php

/**
 * This is the model class for table "{{joint}}".
 *
 * The followings are the available columns in table '{{joint}}':
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
class Mentor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Joint the static model class
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
		return '{{mentor}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,cid,IndustryName,aname,CompanyID,uname', 'required'),
			array('cid, IndustryID, CompanyID, pid,aid,uid', 'numerical', 'integerOnly'=>true),
			array('title,cname,uname', 'length', 'max'=>70),
			array('imgurl,aname,IndustryName', 'length', 'max'=>255),
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, cid, imgurl,cname,aid,aname,IndustryName, uid,uname,content, remark, addtime, updtime, IndustryID, CompanyID, pid', 'safe', 'on'=>'search'),
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
			'cid' => '文章类别',
			'imgurl' => '图片',
			'content' => '内容',
			'remark' => '摘要',
			'addtime' => 'Addtime',
			'updtime' => '更新日期',
			'IndustryID' => '行业',
			'CompanyID' => '用户名称',
			'pid' => '类别',
			'aid' =>'所在地区',
			'aname' =>'所在地区',
			'IndustryName' =>'所属行业',
			'cname' => '公司名称',
			'uid'=>'舵主姓名',
			'uname'=>'舵主姓名'
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
		$criteria->compare('cname',$this->cname,true);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('CompanyID',$this->CompanyID);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('aid',$this->aid);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('aname',$this->aname,true);
		$criteria->compare('IndustryName',$this->IndustryName,true);
		$criteria->order = 'updtime DESC' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
		/**
	 * 获取文章列表
	 */
	public static function getMoreInfo($CompanyID=null,$uid=null,$limit = 5)
	{
		$cacheId = 'joint'.$uid.'_'.$limit;
// 		$menus = Yii::app()->getCache()->get($cacheId);
// 		if($menus)
// 			return $menus;
		$criteria = new CDbCriteria();
		$criteria->select = 'id,title,pid,CompanyID,updtime,cid,uid,uname';
		$criteria->compare('CompanyID',$CompanyID);
		if($uid)
			$criteria->compare('uid',$uid);
		$criteria->limit = $limit;
		$data = self::model()->findAll($criteria);
		$result = array();	
		$media = Alltype::getAllType(4);
		foreach($data as $i)
		{
			$arr = $i->attributes;				
			$arr['cname'] = isset($media[$arr['cid']])?$media[$arr['cid']]['name']:"";
			$arr['upddate'] = date('Y-m-d',strtotime($arr['updtime']));
			$result[$arr['uid']]['uname'] = $arr['uname'];
			$result[$arr['uid']]['uid'] = $arr['uid'];
			$result[$arr['uid']]['data'][] = $arr;
		}
		if($result)
			Yii::app()->getCache()->set($cacheId,$result,86400);
		return $result;
	}
	
	public static function getListByUid($uid)
	{
		$data = self::model()->findAllByAttributes(array('uid'=>$uid));
		return $data;
	}
	public static function enterprise($reData)
	{
		$Company_city_id = isset($reData['aid'])?$reData['aid']:'';
		$Company_Industry_id= isset($reData['IndustryID'])?$reData['IndustryID']:'';
		$keyword = isset($reData['cname'])?$reData['cname']:'';
		$pid=isset($reData['pid'])?$reData['pid']:'';
		
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
			$criteria->addSearchCondition('c.name', $keyword,true);
		
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
			$uid = $arr['uid'];
			if(!isset($list[$arr['CompanyID']]['name'])){
				$cc = Company::model()->findByPk($arr['CompanyID']);
				$companyName = '';
				if($cc){
					$temp = $cc->attributes;
					$companyName = $temp['name'];
				}
				$list[$arr['CompanyID']]['name'] = $companyName;
				$list[$arr['CompanyID']]['id'] = $arr['CompanyID'];
			}
			
			$list[$arr['CompanyID']]['data'] = self::getMoreInfo($arr['CompanyID']);
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
				$this->updtime=date('Y-m-d H:i:s');
			}
			if($this->cid>0)
			{
				$cc = Company::model()->findByPk($this->cid);
				$this->cname = $cc?$cc->name:"";
			}
			if($this->uid>0)
			{
				$uid = intval($this->uid);
				$uu = Users::model()->findByPk($uid);
				$this->uname = $uu?$uu->linkuser:"";
			}
			
			return true;
		}
		else
			return false;
	}
}
