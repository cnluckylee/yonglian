<?php

/**
 * This is the model class for table "{{all_type}}".
 *
 * The followings are the available columns in table '{{all_type}}':
 * @property integer $id
 * @property integer $parentid
 * @property string $name
 * @property integer $type
 * @property integer $listorder
 * @property integer $display
 */
class AllType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AllType the static model class
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
		return '{{all_type}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parentid, type, listorder, display', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parentid, name, type, listorder, display', 'safe', 'on'=>'search'),
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
			'parentid' => '上级菜单',
			'name' => '名称',
			'type' => '类型',
			'listorder' => '排序',
			'display' => '是否显示',
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
		$criteria->compare('parentid',$this->parentid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('listorder',$this->listorder);
		$criteria->compare('display',$this->display);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	//后台菜单
	public static function getTreeTypeDATA($select = null,$cache = TRUE,$type = null) {
		$cacheId = 'all_type'.($select !== null?'_'.$select:'');
		if($cache) {
	
			$menus = Yii::app()->getCache()->get($cacheId);
	
			if($menus)
				return $menus;
		}
		$where = '1';
		if(!empty($type))
		{
			$where = 'type='.$type;
		}
		$model = self::model()->getDbConnection()->createCommand()
		->from('{{all_type}}')
		->where($where)
		->order('listorder DESC');
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
	//类型下来列表
	public static function getSelectTree($empty = NULL, $pid = 0,$type = null) {
		$menus = self::getTreeTypeDATA(null, FALSE,$type);
		$tree = new tree();
		$array = array();
		foreach ($menus as $r) {
			$r['selected'] = ($pid != 0 && $pid === $r['id']) ? 'selected' : '';
			$array[] = $r;
		}
		
		$str = "<option value='\$id' \$selected>\$spacer \$name</option>";
		$tree->init($array);	
		if ($empty !== NULL)
			return '<option value="0">' . $empty . '</option>' . $tree->get_tree('0', $str);
		else
			return $tree->get_tree('0', $str);
	}
	
	public static $isDisplay= array(
			'否', '是'
	);
	
	
	//所有文章类型列表
	public static function getAllNewsType($pid = null)
	{
		$type = Yii::app()->params['NewsType'];
			 
		foreach($type as  $k=>$v)
		{
			if($v['id'] == $pid)
			{
				$str .= "<option value='".$v['id']."' selected>".$v['name']."</option>";
			}else
			{
				$str .= "<option value='".$v['id']."'>".$v['name']."</option>";
			}
				
		}
		
		return $str;
	}
	
	//所有图片类型列表
	public static function getAllPicType($typeId = null)
	{
		$type = Yii::app()->params['PicType'];
		if(!empty($typeId))
		{
			return $type[$typeId];
		}else{
			return $type;
		}
	}
}