<?php

/**
 * This is the model class for table "{{theory}}".
 *
 * The followings are the available columns in table '{{theory}}':
 * @property integer $id
 * @property string $title
 * @property string $imgurl
 * @property string $content
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property integer $IndustryID
 * @property integer $CompanyID
 * @property integer $mid
 * @property string $mname
 * @property string $pdf
 * @property integer $zzid
 * @property integer $hxid
 * @property integer $zxid
 */
class Theory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Theory the static model class
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
		return '{{theory}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,zzid,hxid,zxid,IndustryID,aid,CompanyID,mname,remark', 'required'),
			array('zzid, hxid, zxid', 'required'),
			array('IndustryID, CompanyID, mid, zzid, hxid, zxid,aid', 'numerical', 'integerOnly'=>true),
			array('title, mname', 'length', 'max'=>100),
			array('imgurl, pdf,aname', 'length', 'max'=>255),
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, imgurl, content, remark, addtime, updtime, IndustryID, CompanyID, mid, mname, pdf, zzid, hxid, zxid', 'safe', 'on'=>'search'),
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
			'imgurl' => '图片',
			'content' => '内容',
			'remark' => '类别摘要',
			'addtime' => 'Addtime',
			'updtime' => '更新时间',
			'IndustryID' => '所属行业',
			'CompanyID' => '用户名称',
			'mid' => '专家名称',
			'mname' => '专家名称',
			'pdf' => '媒体文件',
			'zzid' => '主旨管理',
			'hxid' => '横向行里',
			'zxid' => '纵向管理',
			'aid' =>'所在地区',
			'aname' =>'所在地区'
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
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('CompanyID',$this->CompanyID);
		$criteria->compare('mid',$this->mid);
		$criteria->compare('mname',$this->mname,true);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('zzid',$this->zzid);
		$criteria->compare('hxid',$this->hxid);
		$criteria->compare('zxid',$this->zxid);
		$criteria->order = 'updtime desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getArticleList($Technology)
	{
		//解析$Company_city_id,$Company_Industry_id
		$criteria = new CDbCriteria();
		if(isset($Technology['CompanyID']))
			$criteria->addCondition('CompanyID='.$Technology['CompanyID']);
		if(isset($Technology['zzid']) && $Technology['zzid']>0)
			$criteria->addCondition('zzid='.$Technology['zzid']);
		if(isset($Technology['hxid']) && $Technology['hxid']>0)
			$criteria->addCondition('hxid='.$Technology['hxid']);
		if(isset($Technology['zxid']) && $Technology['zxid']>0)
			$criteria->addCondition('zxid='.$Technology['zxid']);		
		if(isset($Technology['IndustryID']) && $Technology['IndustryID']>0)
			$criteria->addCondition('t.IndustryID='.$Technology['IndustryID']);
		if(isset($Technology['title']))
			$criteria->addSearchCondition('title', $Technology['title']);
		if(isset($Technology['mname']))
			$criteria->addSearchCondition('mname', $Technology['mname']);
	
		$criteria->select = 't.*';
		$criteria->join = 'join {{company}} as c on c.id=t.CompanyID';
		$criteria->order = 'updtime desc';
	
	
		$count = self::model()->count($criteria);
	
	
		$pager = new CPagination($count);
		$pager->pageSize = 10;
		$pager->applyLimit($criteria);
		$artList = self::model()->findAll($criteria);
		$list = array();
	
		foreach($artList as $i)
		{
			$arr = $i->attributes;
	
			$cc = Company::model()->findByPk($arr['CompanyID']);
			$arr['CompanyName'] = trim($cc?$cc->name:'');
			
			$me = Member::model()->findByPk($arr['mid']);
			$arr['MemName'] = $me?$me->name:$arr['mname'];
			$list[] = $arr;
		}
		return array('pages'=>$pager,'posts'=>$list);
	
	}
	public static function getListByUid($uid)
	{
		$data = self::model()->findAllByAttributes(array('mid'=>$uid));
		return $data;
	}
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			date_default_timezone_set('PRC');
			if($this->isNewRecord)
			{
				$this->addtime=$this->updtime=date('Y-m-d H:i:s');
			}
			else
			{
				$this->updtime=date('Y-m-d H:i:s');
			}
			if(isset($this->mid) && $this->mid>0){
				$member = Users::model()->findByPk($this->mid);
				$this->mname=$member?$member->linkuser:"";
			}
			return true;
		}
		else
			return false;
	}
}