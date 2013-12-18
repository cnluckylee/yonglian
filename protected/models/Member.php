<?php

/**
 * This is the model class for table "{{member}}".
 *
 * The followings are the available columns in table '{{member}}':
 * @property integer $id
 * @property string $name
 * @property integer $pid
 * @property string $addtime
 * @property string $updtime
 * @property integer $IndustryID
 * @property integer $CompanyID
 * @property integer $cid
 * @property string $entrydate
 */
class Member extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Member the static model class
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
		return '{{member}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, IndustryID, CompanyID, cid', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>200),
			array('addtime, updtime, entrydate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pid, addtime, updtime, IndustryID, CompanyID, cid, entrydate', 'safe', 'on'=>'search'),
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
			'name' => '姓名',
			'pid' => '职位',
			'addtime' => 'Addtime',
			'updtime' => 'Updtime',
			'IndustryID' => '行业',
			'CompanyID' => '公司名称',
			'cid' => '管理类型',
			'entrydate' => '入职日期',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('CompanyID',$this->CompanyID);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('entrydate',$this->entrydate,true);
		$criteria->order = 'updtime DESC' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


		public static function getTreeDATA($select = null,$cache = TRUE,$type=null) {
        $cacheId = 'member'.($select !== null?'_'.$select:'').$type;
        if($cache) {
            $menus = Yii::app()->getCache()->get($cacheId);
            if($menus)
                return $menus;
        }
        $model = self::model()->getDbConnection()->createCommand()
                ->from('{{member}}')
                ->order('listorder DESC');
        if($type)
			$model->where('parentid='.$type);
        if ($select !== null)
            $model->select($select);
        else
            $model->select ('id,parentid,name');

        $menus = $model->queryAll();
        $array = array();
        foreach($menus as $menu) {
            $array[$menu['id']] = $menu;
        }
        $menus = $array;
        if($cache)  Yii::app()->getCache()->set($cacheId,$menus);
        return $menus;
    }


	/**
	 * 获取文章列表
	 */
	public static function getMemberlByTypeAndCompanyID($CompanyID=null,$cid=null,$pid=null,$limit = 5)
	{
		$cacheId = 'member'.$cid.'_'.$pid.'_'.$limit;
// 		$menus = Yii::app()->getCache()->get($cacheId);
// 		if($menus)
// 			return $menus;
		$criteria = new CDbCriteria();
		$criteria->select = 'id,name,pid,CompanyID,entrydate,cid';
		$criteria->addCondition('CompanyID='.$CompanyID);
		if($cid)
		$criteria->addCondition('cid='.$cid);
		$data = self::model()->findAll($criteria);
		$result = array();
		$post = Post::model()->findAll();
		$postArr = array();
		foreach($post as $ii)
		{
			$key = $ii->getAttribute('id');
			$name = $ii->getAttribute('name');
			$postArr[$key] = $name;
		}
		foreach($data as $i)
		{
			$arr = $i->attributes;
			$arr['pname'] = $postArr[$arr['pid']];
			$arr['cname'] = BaseData::CPTeamCategary($arr['cid']);
			$result[] = $arr;
		}

		if($result)
			Yii::app()->getCache()->set($cacheId,$result,86400);
		return $result;
	}

	public static function enterprise($Company_city_id = null,$Company_Industry_id=null,$keyword=null,$cid=null)
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
		$criteria->order = 'rank desc';
		$criteria->group = 'CompanyId';
		if($cid)
			$criteria->addCondition('t.cid='.$cid);
		$count = Member::model()->count($criteria);


		$pager = new CPagination($count);
		$pager->pageSize = 2;
		$pager->applyLimit($criteria);
		$artList = Member::model()->findAll($criteria);
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

			$list[$arr['CompanyID']]['data'] = self::getMemberlByTypeAndCompanyID($arr['CompanyID'],$cid);
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
			}else{
				$this->updtime=date('Y-m-d H:i:s');
			}
				
			return true;
		}
		else
			return false;
	}
}