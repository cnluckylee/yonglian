<?php

class AllTypeController extends AdminController
{
	protected  $type;
	protected  $parentid;
	public function init()
	{
		$this->type = Tools::getParam('type');
		$this->parentid = Tools::getParam('parentid');
	}
	/**
	 * 首页列表.
	 */
	public function actionIndex($type = null)
	{
		$menus = Alltype::getTreeTypeDATA('*', false,$type);
		$type = Tools::getParam('type');
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$array = array();
		foreach ($menus as $r) {

			$r['str_manage'] = '<a href="' . $this->createUrl('create', array('parentid' => $r['id'],'type' => $r['type'])) . '">添加子栏目</a> |
				<a  href="' . $this->createUrl('update', array('id' => $r['id'],'type'=>$type)) . '">修改</a> |
                                    <a class="del" href="' . $this->createUrl('delete', array('id' => $r['id'])) . '" msg="确定删除.' . $r['name'] . '">删除</a> ';
			$array[] = $r;
		}

		$str = "<tr>
					<td><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input-text-c'></td>
					<td >\$spacer\$name</td>
					<td>\$str_manage</td>
				</tr>";

		$tree->init($array);
		$result = array();
		$result['menuTree'] = $tree->get_tree('0', $str);
		$result['parentid'] = $this->parentid;
		$result['type'] = $this->type;
		$this->render('index', $result);


	}

	/**
	 * 创建
	 */
	public function actionCreate($parentid = 0,$type = 0)
	{
		$model=new Alltype;
		// AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Alltype']))
		{
			$model->attributes=$_POST['Alltype'];

			$type = $model->attributes['type'];
			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index&type='.$type."&parentid=".$this->parentid));
		}
		if ($parentid){
			$model->parentid = $parentid;
			$model->type = $type;
		}
		$this->render('create',array(
			'model'=>$model,
			'type'=>$model->type,
		));
	}

	/**
	 * 修改
	 * @param integer $id 主键
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$type = Tools::getParam('type');
		//AJAX 表单验证
		$this->performAjaxValidation($model);

		if(isset($_POST['Alltype']))
		{
			$model->attributes=$_POST['Alltype'];

			if($model->save())
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index&type='.$type));
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
		$model=Alltype::model()->findByPk($id);
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

	/**
	 * 查询城市
	 */
	public function actiongetCity()
	{
		return AllType::getCity();
	}
	/**
	 * 排序
	 */
	public function actionListorder() {
		$orders = Yii::app()->getRequest()->getPost('listorders');
		foreach ($orders as $k => $v) {
			Alltype::model()->updateByPk($k, array('listorder' => $v));
		}
		$this->success('更新排序成功！');
	}
}
