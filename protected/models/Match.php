<?php

/**
 * This is the model class for table "{{match}}".
 *
 * The followings are the available columns in table '{{match}}':
 * @property integer $id
 * @property string $title
 * @property integer $fid
 * @property string $imgurl
 * @property string $content
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property integer $IndustryID
 * @property integer $CompanyID
 * @property integer $zzid
 * @property integer $hxid
 * @property integer $zxid
 * @property string $stopdate
 * @property string $sszb
 * @property string $ssxb
 * @property integer $ssxs
 * @property integer $ctid
 */
class Match extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Match the static model class
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
		return '{{match}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('title,IndustryID,zzid,hxid,zxid,fid,stopdate,sszb,ssxb,ssxs,ctid', 'required'),
			array('fid, IndustryID, CompanyID, zzid, hxid, zxid, ssxs, ctid,aid,aid2', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('imgurl, sszb, ssxb,Prize,Prize2,Prize3,PostName,Post,Post2Name,Post2,Post3Name,Post3,pdf,aname,aname2', 'length', 'max'=>255),
			array('content, remark, addtime, updtime, stopdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, fid, imgurl,Prize,Prize2,Prize3,PostName,Post,Post2Name,Post2,Post3Name,Post3,pdf, content, remark, addtime, updtime, IndustryID, CompanyID, zzid, hxid, zxid, stopdate, sszb, ssxb, ssxs, ctid', 'safe', 'on'=>'search'),
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
			'title' => '赛事名称',
			'fid' => '综合其他',
			'imgurl' => '图片',
			'content' => '内容',
			'remark' => '摘要',
			'addtime' => 'Addtime',
			'updtime' => 'Updtime',
			'IndustryID' => '所属行业',
			'CompanyID' => 'Company',
			'zzid' => '主旨类别',
			'hxid' => '横向类别',
			'zxid' => '纵向类别',
			'stopdate' => '截至日期',
			'sszb' => '赛事主办',
			'ssxb' => '赛事协办',
			'ssxs' => '赛事形式',
			'ctid' => '所在地区',
			'Prize'=>'一等奖',
			'Prize2'=>'二等奖',
			'Prize3'=>'三等奖',
			'PostName'=>'岗位一名称',
			'Post'=>'岗位一获奖人员',
			'Post2Name'=>'岗位二名称',
			'Post2'=>'岗位二获奖人员',
			'Post3Name'=>'岗位三名称',
			'Post3'=>'岗位三获奖人员',
			'pdf'=>'媒体文件',
			'aid'=>'地区选择1',
			'aname'=>'地区选择1',
			'aid2'=>'地区选择2',
			'aname2'=>'地区选择2',	
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
		$criteria->compare('fid',$this->fid);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime);
		$criteria->compare('updtime',$this->updtime);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('CompanyID',$this->CompanyID);
		$criteria->compare('zzid',$this->zzid);
		$criteria->compare('hxid',$this->hxid);
		$criteria->compare('zxid',$this->zxid);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('stopdate',$this->stopdate,true);
		$criteria->compare('sszb',$this->sszb,true);
		$criteria->compare('ssxb',$this->ssxb,true);
		$criteria->compare('Prize',$this->Prize,true);
		$criteria->compare('Prize2',$this->Prize2,true);
		$criteria->compare('Prize3',$this->Prize3,true);
		$criteria->compare('PostName',$this->PostName,true);
		$criteria->compare('Post',$this->Post,true);
		$criteria->compare('Post2Name',$this->Post2Name,true);
		$criteria->compare('Post2',$this->Post2,true);
		$criteria->compare('Post3Name',$this->Post3Name,true);
		$criteria->compare('Post3',$this->Post3,true);
		$criteria->compare('ssxs',$this->ssxs);
		$criteria->compare('ctid',$this->ctid);
		$criteria->order = 'updtime DESC' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getCRApply()
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition('imgurl!=""');
		$criteria->limit = 5;
		$data = self::model()->findAll($criteria);
		$result = array();
		foreach($data as $i)
		{
			$arr = $i->attributes;
			$result[] = $arr;
		}
		return $result;
	}
	/**
	 * 
	 * @param unknown $Technology
	 * @return multitype:CPagination multitype:unknown
	 */
	public static function getDataList($Technology)
	{
		//解析$Company_city_id,$Company_Industry_id
		$criteria = new CDbCriteria();
		if(isset($Technology['zzid']) && $Technology['zzid'])
			$criteria->addCondition('zzid='.$Technology['zzid']);
		if(isset($Technology['hxid']) && $Technology['hxid'])
			$criteria->addCondition('hxid='.$Technology['hxid']);
		if(isset($Technology['IndustryID']) && $Technology['IndustryID'])
			$criteria->addCondition('IndustryID='.$Technology['IndustryID']);
		if(isset($Technology['zxid']) && $Technology['zxid'])
			$criteria->addCondition('zxid='.$Technology['zxid']);
		if(isset($Technology['fid']) && $Technology['fid'])
			$criteria->addCondition('fid='.$Technology['fid']);
		if(isset($Technology['stopdate']) && $Technology['stopdate'])
			$criteria->addCondition('stopdate<="'.$Technology['stopdate'].'"');
		if(isset($Technology['title']) && $Technology['title'])
			$criteria->compare('title',$Technology['title'],true);
		if(isset($Technology['ssxs']) && $Technology['ssxs'])
			$criteria->addCondition('ssxs='.$Technology['ssxs']);
		
	
		$criteria->select = 't.*';
		
		$criteria->order = 'updtime desc';

		$count = self::model()->count($criteria);
		$pager = new CPagination($count);
		$pager->pageSize = 10;
		$pager->applyLimit($criteria);
		$artList = self::model()->findAll($criteria);
		$list = array();
		$ssxs_arr = RaceForms::getList();
		foreach($artList as $i)
		{
			$arr = $i->attributes;
	
			$cc = HorizontalManagement::model()->findByPk($arr['hxid']);
			$zxgg = $hxgg = $ssxb='';
			if($cc){
				$temp = $cc->attributes;
				$hxgg = $temp['name'];
			}
			$arr['hxgg'] = $hxgg;
	
			$me = VerticalManagement::model()->findByPk($arr['zxid']);
			if($me){
				$temp = $me->attributes;
				$zxgg = $temp['name'];
			}
			$arr['zxgg'] = $zxgg;
			$ssxs = isset($ssxs_arr[$arr['ssxs']])?$ssxs_arr[$arr['ssxs']]['name']:"";
			$arr['ssxs'] = $ssxs;

			$arr['sszb']  = $arr['sszb']?Company::getCompany($arr['sszb']):"";
			
			$arr['ssxb'] = $arr['ssxb']?Company::getCompany($arr['ssxb']):"";

			
			$list[] = $arr;
		}

		return array('pages'=>$pager,'posts'=>$list);
	
	}
	
	/**
	 * 获取比赛详情
	 */
	public  static function MatchDetail($id)
	{
		$data = self::model()->findByPk($id);
		$data = $data?$data->attributes:array();
		
		$commentArr = array();
		$comment = MatchComment::model()->findAllByAttributes(array('mid'=>$id));
		foreach($comment as $i)
		{
			$dd = $i->attributes;
			$commentArr[$dd['type']][] = array('id'=>$dd['id'],'name'=>$dd['title'],'pdf'=>$dd['pdf']);
		}
		$data['comment'] = $commentArr;
		return $data;
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