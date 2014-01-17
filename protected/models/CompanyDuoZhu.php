<?php

/**
 * This is the model class for table "{{CompanyProduct}}".
 *
 * The followings are the available columns in table '{{CompanyProduct}}':
 * @property integer $id
 * @property string $name
 * @property string $keywords
 * @property string $desc
 * @property string $content
 * @property integer $class1
 * @property integer $class2
 * @property integer $class3
 * @property integer $order
 * @property string $imgurl
 * @property string $imgurls
 * @property integer $cid
 * @property string $updtime
 * @property string $addtime
 * @property string $pdf
 */
class CompanyDuoZhu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompanyProduct the static model class
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
		return '{{CompanyDuoZhu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class1, class2, class3, order, cid,aid', 'numerical', 'integerOnly'=>true),
			array('name, keywords,cname', 'length', 'max'=>200),
			array('imgurl, imgurls, pdf,aname', 'length', 'max'=>255),
			array('desc, content,aname, updtime, addtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, keywords, desc, content,aname, aid,class1, class2, class3, order, imgurl, imgurls, cid, updtime, addtime, pdf', 'safe', 'on'=>'search'),
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
			'desc' => '摘要',
			'content' => '内容',
			'class1' => '分类',
			'class2' => 'Class2',
			'class3' => 'Class3',
			'order' => '排序',
			'imgurl' => '图片',
			'imgurls' => 'Imgurls',
			'cid' => '公司',
			'cname' => '公司名称',
			'updtime' => 'Updtime',
			'addtime' => 'Addtime',
			'pdf' => '媒体文件',
			'aid' => '地区',
			'aname'=>'地区'
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
		$criteria->compare('aid',$this->aid);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('imgurls',$this->imgurls,true);
		$criteria->compare('aname',$this->aname,true);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('cname',$this->cname,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->order = 'updtime desc' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getListByCid($cid,$limit=5)
	{
		$sqlData = MentorSite::model()->findAll();
		foreach($sqlData as $i)
		{
			$criteria = new CDbCriteria();
			$criteria->select = 'id,name,pdf';
			$criteria->compare('cid',$cid);
			$criteria->compare('class1',$i->id);
			$criteria->limit = $limit;
			$criteria->order = 'updtime desc';
			$data = self::model()->findAll($criteria);
			$result = array();
			foreach($data as $ii)
			{
				$result[$i->id]['data'][] = array('id'=>$ii->id,'name'=>$ii->name,'pdf'=>$ii->pdf);
				$result[$i->id]['name'] = $i->name;
			}
		}
		return array('name'=>'舵主风采','data'=>$result);
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
			if($this->cid)
			{
				$d = Company::model()->findByPk($this->cid);
				if($d)
					$this->cname = $d->name;
			}
			return true;
		}
		else
			return false;
	}
	
	public static function getCidById($id)
	{
		$d = self::model()->findByPk($id);
		return $d?$d->cid:0;
	}
}