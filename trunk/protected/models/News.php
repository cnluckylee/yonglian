<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $id
 * @property string $title
 * @property string $keywords
 * @property string $remark
 * @property string $content
 * @property string $imgurl
 * @property string $imgurls
 * @property string $updtime
 * @property string $addtime
 * @property integer $state
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return '{{news}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('state,aid', 'numerical', 'integerOnly'=>true),
			array('title, keywords', 'length', 'max'=>200),
			array('imgurl, imgurls ,pdf', 'length', 'max'=>255),
			array('remark, content, updtime, addtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, aid,title, keywords, remark, content, imgurl, imgurls, pdf,updtime, addtime, state', 'safe', 'on'=>'search'),
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
			'title' => '标题',
			'keywords' => '关键词',
			'remark' => '摘要',
			'content' => '内容',
			'imgurl' => '图片',
			'imgurls' => '图片集合',
			'updtime' => 'Updtime',
			'addtime' => 'Addtime',
			'state' => '状态',
			'pdf' => '媒体文件',
			'aid' => '新闻位置',
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
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('imgurls',$this->imgurls,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('pdf',$this->pdf);
		$criteria->compare('aid',$this->aid);
		$criteria->order = 'updtime desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	/**
	 * (non-PHPdoc)
	 * @see CActiveRecord::beforeSave()
	 */
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
			if(isset($_POST['sszb']) && $_POST['sszb'])
			{
				$sszb = $_POST['sszb'];
				$this->sszb = implode(",",$sszb);
			}
			if(isset($_POST['ssxb']) && $_POST['ssxb'])
			{
				$ssxb = $_POST['ssxb'];
				$this->ssxb = implode(",",$ssxb);
			}		
			return true;
		}
		else
			return false;
	}
}
