<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property string $name
 * @property string $keywords
 * @property string $desc
 * @property string $content
 * @property integer $class1
 * @property integer $class2
 * @property integer $class3
 * @property integer $order
 * @property integer $wap_ok
 * @property integer $new_ok
 * @property string $imgurl
 * @property string $imgurls
 * @property string $displayimg
 * @property integer $com_ok
 * @property integer $cid
 * @property string $updtime
 * @property string $addtime
 * @property string $pdf
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class1, class2, class3, order, wap_ok, new_ok, com_ok, cid', 'numerical', 'integerOnly'=>true),
			array('name, keywords', 'length', 'max'=>200),
			array('imgurl, imgurls, pdf', 'length', 'max'=>255),
			array('displayimg', 'length', 'max'=>999),
			array('desc, content, updtime, addtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, keywords, desc, content, class1, class2, class3, order, wap_ok, new_ok, imgurl, imgurls, displayimg, com_ok, cid, updtime, addtime, pdf', 'safe', 'on'=>'search'),
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
			'keywords' => '关键词',
			'desc' => '描述',
			'content' => '详情',
			'class1' => 'Class1',
			'class2' => 'Class2',
			'class3' => 'Class3',
			'order' => '排序',
			'wap_ok' => 'Wap Ok',
			'new_ok' => 'New Ok',
			'imgurl' => '图片',
			'imgurls' => 'Imgurls',
			'displayimg' => 'Displayimg',
			'com_ok' => 'Com Ok',
			'cid' => '所属公司',
			'updtime' => 'Updtime',
			'addtime' => 'Addtime',
			'pdf' => '媒体文件',
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
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('class1',$this->class1);
		$criteria->compare('class2',$this->class2);
		$criteria->compare('class3',$this->class3);
		$criteria->compare('order',$this->order);
		$criteria->compare('wap_ok',$this->wap_ok);
		$criteria->compare('new_ok',$this->new_ok);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('imgurls',$this->imgurls,true);
		$criteria->compare('displayimg',$this->displayimg,true);
		$criteria->compare('com_ok',$this->com_ok);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('pdf',$this->pdf,true);
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
				$this->addtime=$this->updtime=date('Y-m-d H:i:s');
			}else{
				$this->updtime=date('Y-m-d H:i:s');
			}
	
			return true;
		}
		else
			return false;
	}
	
	/**
	 * 根据id获取产品
	 */
	public static function getProductByCompanyId($cid)
	{
		$result = array();
		$criteria = new CDbCriteria();
		$criteria->select = 'name,id';
		$criteria->addCondition('cid='.$cid);
		$criteria->limit=5;
		$data = self::model()->findAll($criteria);
		foreach($data as $v)
		{
			$result[] = $v->attributes;
		}
		return $result;
	}
}