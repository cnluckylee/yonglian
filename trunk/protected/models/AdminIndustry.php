<?php

/**
 * This is the model class for table "{{admin_industry}}".
 *
 * The followings are the available columns in table '{{admin_industry}}':
 * @property integer $id
 * @property string $name
 * @property string $pinyin
 * @property integer $parentid
 * @property integer $listorder
 * @property string $addTime
 * @property string $updTime
 */
class AdminIndustry extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdminIndustry the static model class
	 */
	public $aname;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{admin_industry}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('parentid,listorder,name', 'required'),
			array('parentid, listorder', 'numerical', 'integerOnly'=>true),
			array('name, pinyin', 'length', 'max'=>255),
			array('addTime, updTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, pinyin, parentid, listorder, addTime, updTime', 'safe', 'on'=>'search'),
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
			'name' => '行业名称',
			'pinyin' => '拼音',
			'listorder' => '排列序号',
			'parentid' =>'上级行业',
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
		$criteria->compare('parentid',$this->parentid);
		$criteria->compare('listorder',$this->listorder);
		$criteria->compare('addTime',$this->addTime,true);
		$criteria->compare('updTime',$this->updTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	 public static function getTreeDATA($select = null,$cache = TRUE,$type=null) {
        $cacheId = 'industry'.($select !== null?'_'.$select:'').$type;
        if($cache) {
            $menus = Yii::app()->getCache()->get($cacheId);
            if($menus)
                return $menus;
        }
        $model = self::model()->getDbConnection()->createCommand()
                ->from('{{admin_industry}}')
                ->order('listorder asc');
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

       public static function getSelectTree($empty = NULL, $pid = 0,$type=null) {
//		$cacheId = 'industry'.($select !== null?'_'.$select:'').$type;
//		if($cache) {
//
//			$menus = Yii::app()->getCache()->get($cacheId);
//
//			if($menus)
//				return $menus;
//		}
        $menus = self::getTreeDATA(null, FALSE,$type);
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
     * 删除前
     */
    public function beforeDelete() {
        if(!parent::beforeDelete())
            return FALSE;

        $count = self::model()->count('parentid=:parentid', array('parentid'=>$this->id));
        if($count != 0)
            throw new CDbException('有子菜单不能删除！');
        return true;
    }

    /**
     * 行业json数据
     */
    public static function IndustryJson()
    {
    	$model = self::model()->getDbConnection()->createCommand()
                ->from('{{admin_industry}}')
       			->select ('id,parentid,name')
    			->order('listorder asc,id asc');
        $data = $model->queryAll();
    	 $result = array ();
    	 $I = array ();
    	 //定义索引数组，用于记录节点在目标数组的位置
   		 foreach ($data as $val) {
				if ($val['parentid'] == 0) {
					$i = count($result);
					$result[$i] = $val;
					$I[$val['id']] = & $result[$i];
				} else {
					$i = @ count($I[$val['parentid']]['child']);
					$I[$val['parentid']]['child'][$i] = $val;
					$I[$val['id']] = & $I[$val['parentid']]['child'][$i];
				}
			}
    	return $result;
    }
    /**
	 * 所有类型列表;
	 * type:1文章类型;2图片
	 */
	public static function getAllType($type=null,$typeId = null)
	{

		$type = self::getTreeDATA(null, FALSE,$type);
		if(!empty($typeId))
		{
			return $type[$typeId];
		}else{
			return $type;
		}
	}
	
	/**
	 * findnextIdByAid
	 */
	public  function findnextIdByAid($id,$next=null)
	{
		if(!$next){
			$tmp = self::model()->findByPk($id);
			$datas[] = $tmp;
		}else {
			$datas = self::model()->findAll('parentid='.$id);
	
		}
		 
		foreach($datas as $i)
		{
			$data = $i->attributes;
			$this->aname[] = $data['id'];
			self::findnextIdByAid($data['id'],1);
		}
		return $this->aname?array_unique($this->aname):array();
	}
}
