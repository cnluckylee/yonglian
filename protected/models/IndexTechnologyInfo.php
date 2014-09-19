<?php

/**
 * This is the model class for table "{{IndexMarketInfo}}".
 *
 * The followings are the available columns in table '{{IndexMarketInfo}}':
 * @property integer $id
 * @property string $title
 * @property string $imgurl
 * @property string $content
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property integer $pid
 */
class IndexTechnologyInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IndexMarketInfo the static model class
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
		return '{{IndexTechnologyInfo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,remark', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title,remark', 'length', 'max'=>70),
			array('imgurl,pdf', 'length', 'max'=>255),
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, imgurl, pdf,content, remark, addtime, updtime, status', 'safe', 'on'=>'search'),
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
			'title' => '信息标题',
			'imgurl' => '图片',
			'content' => '内容',
			'remark' => '信息备注',
			'addtime' => 'Addtime',
			'updtime' => '更新日期',
			'status' =>'状态',
			'pdf' =>'媒体文件'	
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
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('status',$this->status);
		$criteria->order = 'updtime desc' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getList()
	{
		$data = self::model()->findAll(array('limit'=>10,'order'=>'updtime'));
		return $data;
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