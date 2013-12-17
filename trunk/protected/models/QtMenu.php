<?php

/**
 * This is the model class for table "{{qt_menu}}".
 *
 * The followings are the available columns in table '{{qt_menu}}':
 * @property string $id
 * @property string $name
 * @property string $parentid
 * @property integer $display
 * @property string $url
 * @property integer $sort
 */
class QtMenu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return QtMenu the static model class
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
		return '{{qt_menu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('display, sort', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('parentid', 'length', 'max'=>20),
			array('url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, parentid, display, url, sort', 'safe', 'on'=>'search'),
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
			'parentid' => 'Parentid',
			'display' => 'Display',
			'url' => 'Url',
			'sort' => 'Sort',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parentid',$this->parentid,true);
		$criteria->compare('display',$this->display);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getQtMenuList($pid=null)
	{
		$where = 'display = 1';
		if($pid)
			$where .=' and parentid='.$pid;
		$model = self::model()->getDbConnection()->createCommand()
		->from('{{qt_menu}}')
		->where($where)
		->order('sort desc');
		$menus = $model->queryAll();
		$result = array();
		foreach($menus as $v)
		{
			$result[$v['parentid']][] = $v;
		}
		return $result;
	}
}