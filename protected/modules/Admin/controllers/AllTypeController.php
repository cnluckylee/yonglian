<?php

class AllTypeController extends AdminController
{
	
	/**
	 * 首页列表.
	 */
	public function actionIndex($type = null)
	{
		
		
		$menus = AllType::getTreeTypeDATA('*', false,$type);	
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($menus as $r) {

			$r['str_manage'] = '<a href="' . $this->createUrl('create', array('parentid' => $r['id'],'type' => $r['type'])) . '">添加子栏目</a> |
				<a  href="' . $this->createUrl('update', array('id' => $r['id'])) . '">修改</a> |
                                    <a class="del" href="' . $this->createUrl('delete', array('id' => $r['id'])) . '" msg="确定删除.' . $r['name'] . '">删除</a> ';
			$array[] = $r;
		}
		$str = "<tr>
					<td><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input-text-c'></td>
					<td >\$spacer\$name</td>
					<td ><a href='\".Yii::app()->createUrl(\$modules.'/'.\$controller.'/'.\$action).\"'>\".Yii::app()->createUrl(\$modules.'/'.\$controller.'/'.\$action).\"</td>
					<td>\$str_manage</td>
				</tr>";
		
		$tree->init($array);
		$this->render('index', array(
				'menuTree' => $tree->get_tree('0', $str)
		));
		
		
	}

	/**
	 * 创建
	 */
	public function actionCreate($parentid = 0,$type = 0)
	{
		$model=new AllType;
		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['AllType']))
		{
			$model->attributes=$_POST['AllType'];
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		if ($parentid){
			$model->parentid = $parentid;
			$model->type = $type;
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * 修改
	 * @param integer $id 主键
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['AllType']))
		{
			$model->attributes=$_POST['AllType'];
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * 删除
	* @param integer $id 主键
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			
			$this->loadModel($id)->delete();

			// 如果是 AJAX 操作返回
			if (Yii::app()->request->isAjaxRequest) {
				$this->success('删除成功！');
			} else {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}
		else
			throw new CHttpException(400,'非法访问！');
	}

	

	

	/**
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=AllType::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'内容不存在！.');
		return $model;
	}

	/**
	 * Ajax验证
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='all-type-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	

}
