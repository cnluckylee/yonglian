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
class YlCase extends CActiveRecord
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
		return '{{yl_case}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('title,imgurl', 'required'),
			array('cid, IndustryID, CompanyID, pid', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('imgurl', 'length', 'max'=>255),
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, cid, imgurl, content, remark, addtime, updtime, IndustryID, CompanyID, pid', 'safe', 'on'=>'search'),
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
			'cid' => '类型',
			'imgurl' => '媒体上传',
			'content' => '内容',
			'remark' => '摘要',
			'addtime' => 'Addtime',
			'updtime' => '更新日期',
			'IndustryID' => '行业',
			'CompanyID' => '公司',
			'pid' => '类别',
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
		$media = AllType::getAllType(4);

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
		//解析$Company_city_id,$Company_Industry_id
		if($Company_city_id)
			$city_arr = explode('_', $Company_city_id);
		if($Company_Industry_id)
			$Industry_arr = explode('_', $Company_Industry_id);

		$criteria = new CDbCriteria();
		if(isset($city_arr[0]))
			$criteria->addCondition('city1='.$city_arr[0]);
		if(isset($city_arr[1]))
			$criteria->addCondition('city2='.$city_arr[1]);
		if(isset($city_arr[2]))
			$criteria->addCondition('city3='.$city_arr[2]);
		if(isset($city_arr[3]))
			$criteria->addCondition('city4='.$city_arr[3]);
		if(isset($Industry_arr[0]))
			$criteria->addCondition('IndustryID1='.$Industry_arr[0]);
		if(isset($Industry_arr[1]))
			$criteria->addCondition('IndustryID2='.$Industry_arr[1]);
		if(isset($Industry_arr[2]))
			$criteria->addCondition('IndustryID3='.$Industry_arr[2]);
		if(isset($Industry_arr[3]))
			$criteria->addCondition('IndustryID4='.$Industry_arr[3]);
		if($keyword)
			$criteria->addSearchCondition('c.name', $keyword);

		$criteria->select = 't.*';
		$criteria->join = 'join {{company}} as c on c.id=t.CompanyID';
		$criteria->order = 'updtime desc';
		$criteria->group = 'CompanyId';
		if($pid)
			$criteria->addCondition('t.pid='.$pid);
		$count = Joint::model()->count($criteria);


		$pager = new CPagination($count);
		$pager->pageSize = 2;
		$pager->applyLimit($criteria);
		$artList = Joint::model()->findAll($criteria);
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
				}
				$list[$arr['CompanyID']]['name'] = $companyName;
			}

			$list[$arr['CompanyID']]['data'] = self::getMoreInfo($arr['CompanyID'],$pid);
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
	public static function getDataList()
	{
		$model = self::model()->getDbConnection()->createCommand()
                ->from('{{yl_case}}')
                ->order('updtime DESC')
                ;
		 $data = $model->queryAll();
		return $data;
	}
}
