<?php

/**
 * This is the model class for table "{{download}}".
 *
 * The followings are the available columns in table '{{download}}':
 * @property integer $id
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $content
 * @property integer $class1
 * @property integer $class2
 * @property integer $class3
 * @property integer $no_order
 * @property integer $new_ok
 * @property integer $wap_ok
 * @property string $downloadurl
 * @property string $filesize
 * @property integer $com_ok
 * @property integer $hits
 * @property string $updatetime
 * @property string $addtime
 * @property string $issue
 * @property integer $access
 * @property integer $top_ok
 * @property integer $downloadaccess
 * @property string $filename
 * @property string $lang
 */
class Download extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Download the static model class
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
		return '{{download}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class1, class2, class3, no_order, new_ok, wap_ok, com_ok, hits, access, top_ok, downloadaccess', 'numerical', 'integerOnly'=>true),
			array('title, keywords', 'length', 'max'=>200),
			array('downloadurl, filename', 'length', 'max'=>255),
			array('filesize, issue', 'length', 'max'=>100),
			array('lang', 'length', 'max'=>50),
			array('description, content, updatetime, addtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, keywords, description, content, class1, class2, class3, no_order, new_ok, wap_ok, downloadurl, filesize, com_ok, hits, updatetime, addtime, issue, access, top_ok, downloadaccess, filename, lang', 'safe', 'on'=>'search'),
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
			'keywords' => 'Keywords',
			'description' => 'Description',
			'content' => 'Content',
			'class1' => 'Class1',
			'class2' => 'Class2',
			'class3' => 'Class3',
			'no_order' => 'No Order',
			'new_ok' => 'New Ok',
			'wap_ok' => 'Wap Ok',
			'downloadurl' => 'Downloadurl',
			'filesize' => 'Filesize',
			'com_ok' => 'Com Ok',
			'hits' => 'Hits',
			'updatetime' => 'Updatetime',
			'addtime' => 'Addtime',
			'issue' => 'Issue',
			'access' => 'Access',
			'top_ok' => 'Top Ok',
			'downloadaccess' => 'Downloadaccess',
			'filename' => 'Filename',
			'lang' => 'Lang',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('class1',$this->class1);
		$criteria->compare('class2',$this->class2);
		$criteria->compare('class3',$this->class3);
		$criteria->compare('no_order',$this->no_order);
		$criteria->compare('new_ok',$this->new_ok);
		$criteria->compare('wap_ok',$this->wap_ok);
		$criteria->compare('downloadurl',$this->downloadurl,true);
		$criteria->compare('filesize',$this->filesize,true);
		$criteria->compare('com_ok',$this->com_ok);
		$criteria->compare('hits',$this->hits);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('issue',$this->issue,true);
		$criteria->compare('access',$this->access);
		$criteria->compare('top_ok',$this->top_ok);
		$criteria->compare('downloadaccess',$this->downloadaccess);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('lang',$this->lang,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}