<?php

/**
 * This is the model class for table "{{manage_case}}".
 *
 * The followings are the available columns in table '{{manage_case}}':
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
 * @property integer $cid
 * @property integer $nid
 * @property integer $fxid
 * @property integer $qid
 * @property integer $rid
 * @property integer $cwid
 * @property integer $kid
 * @property integer $sid
 * @property integer $mid
 * @property string $mname
 */
class ManageCase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ManageCase the static model class
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
		return '{{manage_case}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fid, IndustryID, CompanyID, cid, nid, fxid, qid, rid, cwid, kid, sid, mid', 'numerical', 'integerOnly'=>true),
			array('title, mname', 'length', 'max'=>100),
			array('imgurl,pdf', 'length', 'max'=>255),
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, fid, imgurl,pdf, content, remark, addtime, updtime, IndustryID, CompanyID, cid, nid, fxid, qid, rid, cwid, kid, sid, mid, mname', 'safe', 'on'=>'search'),
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
			'fid' => '经营战略',
			'imgurl' => '图片',
			'content' => '内容',
			'remark' => '摘要',
			'addtime' => 'Addtime',
			'updtime' => 'Updtime',
			'IndustryID' => 'Industry',
			'CompanyID' => '企业',
			'cid' => '采购供应',
			'nid' => '内部运营',
			'fxid' => '分销配送',
			'qid' => '企业组织',
			'rid' => '人力资源',
			'cwid' => '财务税收',
			'kid' => '开发战略',
			'sid' => '适用行业',
			'mid' => '专家名称',
			'pdf' => '媒体文件',
			'mname' => 'mname'
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
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('CompanyID',$this->CompanyID);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('nid',$this->nid);
		$criteria->compare('fxid',$this->fxid);
		$criteria->compare('qid',$this->qid);
		$criteria->compare('rid',$this->rid);
		$criteria->compare('cwid',$this->cwid);
		$criteria->compare('kid',$this->kid);
		$criteria->compare('sid',$this->sid);
		$criteria->compare('mid',$this->mid);
		$criteria->compare('pdf',$this->pdf);
		$criteria->compare('mname',$this->mname,true);
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
		if(isset($Technology['kid']))
			$criteria->addCondition('kid='.$Technology['kid']);
		if(isset($Technology['cwid']))
			$criteria->addCondition('cwid='.$Technology['cwid']);
		if(isset($Technology['nid']))
			$criteria->addCondition('nid='.$Technology['nid']);
		if(isset($Technology['fxid']))
			$criteria->addCondition('fxid='.$Technology['fxid']);
		if(isset($Technology['qid']))
			$criteria->addCondition('qid='.$Technology['qid']);
		if(isset($Technology['rid']))
			$criteria->addCondition('rid='.$Technology['rid']);
		if(isset($Technology['sid']))
			$criteria->addCondition('sid='.$Technology['sid']);
		if(isset($Technology['title']))
			$criteria->addSearchCondition('title', $Technology['title']);
		if(isset($Technology['mname']))
			$criteria->addSearchCondition('mname', $Technology['mname']);

		$criteria->select = 't.*';
		$criteria->join = 'join {{company}} as c on c.id=t.CompanyID';
		$criteria->order = 'updtime desc';


		$count = ManageCase::model()->count($criteria);


		$pager = new CPagination($count);
		$pager->pageSize = 10;
		$pager->applyLimit($criteria);
		$artList = ManageCase::model()->findAll($criteria);
		$list = array();

		foreach($artList as $i)
		{
			$arr = $i->attributes;

			$cc = Company::model()->findByPk($arr['CompanyID']);
			$companyName = '';
			if($cc){
				$temp = $cc->attributes;
				$companyName = $temp['name'];
			}
			$arr['CompanyName'] = $companyName;

			$me = Member::model()->findByPk($arr['mid']);
			$memName = '';
			if($me){
				$temp = $me->attributes;
				$memName = $temp['name'];
			}
			$arr['MemName'] = $memName;
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
				if(isset($this->mid) && $this->mid>0){
					$member = Member::model()->findByPk($this->mid);
					$member_arr = $member->attributes;
					$this->mname=$member_arr['name'];
				}
			}
			else
			{
				$this->updtime=date('Y-m-d H:i:s');
				$this->addtime=$this->updtime=date('Y-m-d H:i:s');
				if(isset($this->mid) && $this->mid>0){
					$member = Member::model()->findByPk($this->mid);
					$member_arr = $member->attributes;
					$this->mname=$member_arr['name'];
				}
			}

			return true;
		}
		else
			return false;
	}
}