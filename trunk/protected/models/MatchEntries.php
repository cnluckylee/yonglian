<?php

/**
 * This is the model class for table "{{MatchEntries}}".
 *
 * The followings are the available columns in table '{{MatchEntries}}':
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
 * @property string $mname
 * @property string $author
 */
class MatchEntries extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatchEntries the static model class
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
		return '{{MatchEntries}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mid, type,isRecommend,times', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('imgurl, pdf, mname, author', 'length', 'max'=>255),
			array('content, remark, addtime, updtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title,times, isRecommend,mid, type, imgurl, content, remark, addtime, updtime, pdf, mname, author', 'safe', 'on'=>'search'),
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
				'mid' => '比赛名称',
				'type' => '类型',
				'imgurl' => '图片',
				'content' => '内容',
				'remark' => '摘要',
				'addtime' => 'Addtime',
				'updtime' => 'Updtime',
				'pdf' => '媒体文件',
				'mname' => '比赛名称',
				'author' => '作者',
				'isRecommend'=>'推荐',
				'times' => '参赛次数'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($mid=null)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		if($mid>0)
			$criteria->compare('mid',$mid);
		$criteria->compare('type',$this->type);
		$criteria->compare('isRecommend',$this->isRecommend);
		$criteria->compare('times',$this->times);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updtime',$this->updtime,true);
		$criteria->compare('pdf',$this->pdf,true);
		$criteria->compare('mname',$this->mname,true);
		$criteria->compare('author',$this->author,true);
		$criteria->order = 'updtime DESC' ;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function getListByMid($mid)
	{
		$data = self::model()->findAllByAttributes(array('mid'=>$mid));
		$result = array();
		$Site = EntriesSite::getList();		
		foreach($data as $i)
		{
			$arr = $i->attributes;
			$result[$arr['type']]['data'][] = $arr;
			$result[$arr['type']]['name'] = $Site[$arr['type']]['name'];
		}
		return $result;
	}
	
	public static function getRecommendList($mid)
	{
		$data = self::model()->findAllByAttributes(array('mid'=>$mid,'isRecommend'=>1));
		$result = array();
		foreach($data as $i)
		{
			$arr = $i->attributes;
			$result[] = $arr;
		}
		return $result;
	}
	
	public static $isRecommend= array(
			'否', '是'
	);
	
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