<?php

/**
 * This is the model class for table "{{company}}".
 *
 * The followings are the available columns in table '{{company}}':
 * @property integer $id
 * @property string $name
 * @property string $pinyin
 * @property string $city
 * @property integer $distid
 * @property integer $provid
 * @property integer $ctid
 * @property integer $IndustryID
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
			array('distid, provid, ctid, IndustryID, recommend, rank', 'numerical', 'integerOnly'=>true),
			array('name, city', 'length', 'max'=>20),
			array('pinyin', 'length', 'max'=>100),
			array('desc, updTime, addTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pinyin, city, distid, provid, ctid, IndustryID, desc, recommend, rank, updTime, addTime', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'pinyin' => 'Pinyin',
			'city' => 'City',
			'distid' => 'Distid',
			'provid' => 'Provid',
			'ctid' => 'Ctid',
			'IndustryID' => '行业',
			'CompanyID' => '公司',
			'desc' => 'Desc',
			'recommend' => 'Recommend',
			'rank' => 'Rank',
			
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
		$criteria->compare('distid',$this->distid);
		$criteria->compare('provid',$this->provid);
		$criteria->compare('ctid',$this->ctid);
		$criteria->compare('IndustryID',$this->IndustryID);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('recommend',$this->recommend);
		$criteria->compare('rank',$this->rank);
		$criteria->compare('updTime',$this->updTime,true);
		$criteria->compare('addTime',$this->addTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getTreeDATA($select = null,$cache = TRUE) {
 		$cacheId = 'company'.($select !== null?'_'.$select:'');
// 		if($cache) {
// 			$menus = Yii::app()->getCache()->get($cacheId);
// 			if($menus)
// 				return $menus;
// 		}
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
		$tree = new tree();
		$array = array();
		if($pid)
		{
			foreach ($menus as $r) {
				$r['selected'] = ($pid != 0 && $pid === $r['id']) ? 'selected' : '';
				$array[] = $r;
			}
		}else{
			$array = $menus;
		}
		$str = "<option value='\$id' \$selected>\$spacer \$name</option>";
		$tree->init($array);
	
		if ($empty !== NULL)
			return '<option value="0">' . $empty . '</option>' . $tree->get_tree('0', $str);
		else
			return $tree->get_tree('0', $str);
	}
}