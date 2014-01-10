<?php

/**
 * This is the model class for table "{{company}}".
 *
 * The followings are the available columns in table '{{company}}':
 * @property integer $id
 * @property string $name
 * @property string $pinyin
 * @property string $city
 * @property integer $city1
 * @property integer $city2
 * @property integer $city3
 * @property integer $city4
 * @property string $Industry
 * @property integer $IndustryID1
 * @property integer $IndustryID2
 * @property integer $IndustryID3
 * @property integer $IndustryID4
 * @property string $desc
 * @property integer $recommend
 * @property integer $rank
 * @property string $updTime
 * @property string $addTime
 */
class Company extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Company the static model class
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
		return '{{company}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city1, city2, city3, city4, IndustryID1, IndustryID2, IndustryID3, IndustryID4, recommend, rank', 'numerical', 'integerOnly'=>true),
			array('name, city', 'length', 'max'=>20),
			array('pinyin, Industry', 'length', 'max'=>100),
			array('desc, updTime, addTime,accountdate', 'safe'),
				
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pinyin, city, city1, city2, city3, city4, Industry, IndustryID1, IndustryID2, IndustryID3, IndustryID4, desc, recommend, rank, updTime, addTime,accountdate', 'safe', 'on'=>'search'),
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
			'name' => '名称',
			'pinyin' => '简称',
			'city' => '地区',
			'city1' => 'City1',
			'city2' => 'City2',
			'city3' => 'City3',
			'city4' => 'City4',
			'Industry' => '行业',
			'IndustryID1' => 'Industry Id1',
			'IndustryID2' => 'Industry Id2',
			'IndustryID3' => 'Industry Id3',
			'IndustryID4' => 'Industry Id4',
			'desc' => '描述',
			'recommend' => '是否推荐',
			'rank' => '权重',
			'updTime' => 'Upd Time',
			'addTime' => 'Add Time',
			'accountdate' => '账期'
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
		$criteria->compare('pinyin',$this->pinyin,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('city1',$this->city1);
		$criteria->compare('city2',$this->city2);
		$criteria->compare('city3',$this->city3);
		$criteria->compare('city4',$this->city4);
		$criteria->compare('Industry',$this->Industry,true);
		$criteria->compare('IndustryID1',$this->IndustryID1);
		$criteria->compare('IndustryID2',$this->IndustryID2);
		$criteria->compare('IndustryID3',$this->IndustryID3);
		$criteria->compare('IndustryID4',$this->IndustryID4);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('recommend',$this->recommend);
		$criteria->compare('rank',$this->rank);
		$criteria->compare('updTime',$this->updTime,true);
		$criteria->compare('addTime',$this->addTime,true);
		$criteria->compare('accountdate',$this->accountdate,true);
		$criteria->order = 'updtime DESC' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->addTime=$this->updTime=date('Y-m-d H:i:s');
			}else{
				$this->updTime=date('Y-m-d H:i:s');
			}
	
			return true;
		}
		else
			return false;
	}
	public static $isDisplay= array(
	'否', '是'
    );
	
	public static function getTreeDATA($select = null,$cache = TRUE) {
		$cacheId = 'company'.($select !== null?'_'.$select:'');
		if($cache) {
			$menus = Yii::app()->getCache()->get($cacheId);
			if($menus)
				return $menus;
		}
		$model = self::model()->getDbConnection()->createCommand()
		->from('{{company}}')
		->order('rank DESC');
		if ($select !== null)
			$model->select($select);
		else
			$model->select ('id,name');
	
		$menus = $model->queryAll();
	
		$array = array();
		foreach($menus as $menu) {
			$menu['parentid'] = '0';
			$array[$menu['id']] = $menu;
		}
		$menus = $array;
		if($cache)  Yii::app()->getCache()->set($cacheId,$menus);
		return $menus;
	}
	
	public static function getSelectTree($empty = NULL, $pid = 0) {
	
		$menus = self::getTreeDATA(null, FALSE);
		$tree = new Tree();
		$array = array();
		foreach ($menus as $r) {
			$r['selected'] = ($pid != 0 && $pid === $r['id']) ? 'selected' : '';
			$array[] = $r;
		}
		// print_r($array);
		$str = "<option value='\$id' \$selected>\$spacer \$name</option>";
		$tree->init($array);
	
		if ($empty !== NULL)
			return '<option value="0">' . $empty . '</option>' . $tree->get_tree('0', $str);
		else
			return $tree->get_tree('0', $str);
	}
	
	/**
	 * 获取公司并分页
	 */
	public static function getCompany($cid)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition('id in('.$cid.')');
		$artList = self::model()->findAll($criteria);
		$result = array();
		foreach($artList as $i)
		{
			$arr = $i->attributes;
			$result[] = $arr;
		}
		return $result;
	}
}
