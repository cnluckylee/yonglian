<?php
Yii::import('zii.widgets.CPortlet');

class AdminMenu extends CPortlet
{
	public function init()
	{
		$this->title='管理';
		parent::init();
	}
	
	protected function renderContent()
	{
		$this->render('Menu');
	}
}
