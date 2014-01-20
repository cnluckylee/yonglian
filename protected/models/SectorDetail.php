<?php

/**
 * This is the model class for table "{{sectorDetail}}".
 *
 * The followings are the available columns in table '{{sectorDetail}}':
 * @property integer $id
 * @property string $title
 * @property string $imgurl
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property string $pdf
 * @property string $content
 */
class SectorDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SectorDetail the static model class
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
		return '{{sectorDetail}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sid', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('imgurl, pdf,sname', 'length', 'max'=>255),
			array('remark, addtime, updtime, content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, imgurl, remark, addtime, updtime, pdf, content', 'safe', 'on'=>'search'),
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
			'imgurl' => '图片',
			'remark' => '摘要',
			'addtime' => 'Addtime',
			'updtime' => 'Updtime',
			'pdf' => '媒体文件',
			'content' => '内容',
			'sid'=>'关联板块',
			'sname'=>'关联板块'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($sid = null)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('pdf',$this->pdf,true);
		if($sid>0)
			$criteria->compare('sid',$sid);
		$criteria->compare('sname',$this->sname,true);
		$criteria->compare('content',$this->content,true);
		$criteria->order = 'updtime asc' ;
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
}