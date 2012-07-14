<?php

Yii::import('zii.widgets.grid.CGridView');
Yii::import('admin.widgets.grid.AdminCLinkPager');
class AdminGridView extends CGridView{
	public $pager = 'AdminCLinkPager';
	public $summaryText = " {count} 条记录 {page}/{pages} 页 ";

	//public $cssFile = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('admin.assets'))
	public function init() {
		$this->cssFile = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('admin.assets')).'/style/grid.css';
		$setting = AdminModule::getUser()->setting;
	
		$pageSize = isset($setting['page_listrows'])?$setting['page_listrows']:15;
		$this->dataProvider->setPagination(array('pageSize'=>$pageSize));
		parent::init();
		
	}
	public function renderSummary() {
		
	}
	
	public function renderPager() {
		echo '<div class="page" style="float:right; margin-right:20px;">';
		
		parent::renderSummary();
		if(!$this->enablePagination)
			return;

		$pager=array();
		$class='AdminCLinkPager';
		if(is_string($this->pager))
			$class=$this->pager;
		else if(is_array($this->pager))
		{
			$pager=$this->pager;
			if(isset($pager['class']))
			{
				$class=$pager['class'];
				unset($pager['class']);
			}
		}
		$pager['pages']=$this->dataProvider->getPagination();

		if($pager['pages']->getPageCount()>1)
		{
			echo '<div class="'.$this->pagerCssClass.'">';
			$this->widget($class,$pager);
			echo '</div>';
		}
		else
			$this->widget($class,$pager);

		echo '</div>';
	}
}

?>
