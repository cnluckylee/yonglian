<?php

/**
 * This is the model class for table "{{admin_menu}}".
 *
 * The followings are the available columns in table '{{admin_menu}}':
 * @property string $id
 * @property string $name
 * @property string $parentid
 * @property string $modules
 * @property string $controller
 * @property string $action
 * @property string $data
 * @property string $ico
 * @property integer $listorder
 * @property integer $display
 *
 * The followings are the available model relations:
 * @property AdminRole[] $flyAdminRoles
 */
class AdminMenu extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AdminMenu the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{admin_menu}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('modules,parentid,name,controller,action,data,display', 'required'),
            array('listorder, display', 'numerical', 'integerOnly' => true),
            array('name, modules', 'length', 'max' => 50),
            array('parentid, controller, action, ico', 'length', 'max' => 20),
            array('data', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, parentid, modules, controller, action, data, ico, listorder, display', 'safe', 'on' => 'search'),
        );

    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'flyAdminRoles' => array(self::MANY_MANY, 'AdminRole', '{{admin_role_priv}}(menu_id, role_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => '菜单名称',
            'parentid' => '上级菜单',
            'modules' => '指定模快',
            'controller' => '目标控制',
            'action' => '目标动作',
            'data' => '附加参数',
            'ico' => '图标',
            'listorder' => '排序',
            'display' => '是否显示',
        );
        //  $this->search()
    }
    public static $isDisplay= array(
	'否', '是'
    );
    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('parentid', $this->parentid, true);
        $criteria->compare('modules', $this->modules, true);
        $criteria->compare('controller', $this->controller, true);
        $criteria->compare('action', $this->action, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('ico', $this->ico, true);
        $criteria->compare('listorder', $this->listorder);
        $criteria->compare('display', $this->display);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
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
    //后台菜单
    public static function getTreeDATA($select = null,$cache = TRUE) {
        $cacheId = 'admin_menu'.($select !== null?'_'.$select:'');

        if($cache) {

            $menus = Yii::app()->getCache()->get($cacheId);

            if($menus)
                return $menus;
        }
        $model = self::model()->getDbConnection()->createCommand()
                ->from('{{admin_menu}}')
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

    public static function getSelectTree($empty = NULL, $pid = 0) {

        $menus = self::getTreeDATA(null, FALSE);
        $tree = new tree();
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
    
    public static function getAdminMenu()
    {
		$result = array ();
		$I = array ();
		$cacheId = 'getAdminMenu';

        if($cacheId) {
            $menus = Yii::app()->getCache()->get($cacheId);

            if($menus)
                return $menus;
        }
		$model = self::model()->getDbConnection()->createCommand()
                ->from('{{admin_menu}}')
                ->order('listorder DESC')
                ->select ('id,parentid,name,modules,controller,action,data');
		 $data = $model->queryAll();
		//定义索引数组，用于记录节点在目标数组的位置
		foreach ($data as $val) {
			
			$url = '';
			if($val['modules'])
				$url .= '/'.$val['modules'];
			if($val['controller'])
				$url .=  '/'.$val['controller'];
			if($val['action'])
				$url .=  '/'.$val['action'];
			if($val['data'])
				$url .= '/'.$val['data'];
			$val['url'] = $url;	
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
		$menus = $result;
		Yii::app()->getCache()->set($cacheId,$menus,86400);
		return $menus;
	}

}
