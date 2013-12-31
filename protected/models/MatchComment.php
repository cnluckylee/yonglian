<?php

/**
 * This is the model class for table "{{match_comment}}".
 *
 * The followings are the available columns in table '{{match_comment}}':
 * @property integer $id
 * @property string $title
 * @property integer $mid
 * @property integer $type
 * @property string $imgurl
 * @property string $content
 * @property string $remark
 * @property string $addtime
 * @property string $updtime
 * @property string $pdf
 */
class MatchComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatchComment the static model class
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
		return '{{match_comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mid, type', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('imgurl, pdf', 'length', 'max'=>255),
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, mid, type, imgurl, content, remark, addtime, updtime, pdf', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'mid' => 'Mid',
			'type' => 'Type',
			'imgurl' => 'Imgurl',
			'content' => 'Content',
			'remark' => 'Remark',
			'addtime' => 'Addtime',
			'updtime' => 'Updtime',
			'pdf' => 'Pdf',
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
		$criteria->compare('mid',$this->mid);
		$criteria->compare('type',$this->type);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('pdf',$this->pdf,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}