<?php

class AdminIndustryController extends AdminController
{

	/**
	 * 首页列表.
	 */
	public function actionIndex()
	{
		$menus = AdminIndustry::getTreeDATA('*', false);

		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($menus as $r) {

			$r['str_manage'] = '<a href="' . $this->createUrl('create', array('parentid' => $r['id'])) . '">添加子行业</a> |
				<a  href="' . $this->createUrl('update', array('id' => $r['id'])) . '">修改</a> |
                                    <a class="del" href="' . $this->createUrl('delete', array('id' => $r['id'])) . '" msg="确定删除.' . $r['name'] . '">删除</a> ';
			$array[] = $r;
		}
		$modules = $this->getModule()->id;
		$controller = $this->getId();  // controller
		$action = $this->getAction()->id;  // action

		$url = $modules.'/'.$controller.'/'.$action;
		$str = "<tr>
					<td><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input-text-c'></td>
					<td >\$spacer\$name</td>
					<td ><a href='\".Yii::app()->createUrl('$url').\"'>\".Yii::app()->createUrl('$url').\"</td>
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
	public function actionCreate($parentid = 0)
	{
		$model=new AdminIndustry;

		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['AdminIndustry']))
		{
			$model->attributes=$_POST['AdminIndustry'];
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		if ($parentid)
			$model->parentid = $parentid;
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

		if(isset($_POST['AdminIndustry']))
		{
			$model->attributes=$_POST['AdminIndustry'];
			
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
	 * 排序
	 */
	public function actionListorder() {
		$orders = Yii::app()->getRequest()->getPost('listorders');
		foreach ($orders as $k => $v) {
			adminIndustry::model()->updateByPk($k, array('listorder' => $v));
		}
		$this->success('更新排序成功！');
	}


	/**
	 * 载入
	 * @param integer $id 主键
	 */
	public function loadModel($id)
	{
		$model=AdminIndustry::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='admin-industry-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
