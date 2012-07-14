<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminCLinkPager
 *
 * @author Administrator
 */
Yii::import('system.web.widgets.pagers');

class AdminCLinkPager extends CLinkPager {

	public $maxButtonCount = 5;
	public $cssFile = FALSE;
	public $header = '';
	public $firstPageLabel = '首页';
	public $prevPageLabel = '上一页';
	public $nextPageLabel = '下一页';
	public $lastPageLabel = '末页';
	public $htmlOptions = array(
		'class' => 'pages',
	);

	public function init() {
		
		parent::init();
	}

	protected function createPageButtons() {
		if (($pageCount = $this->getPageCount()) <= 1)
			return array();

		list($beginPage, $endPage) = $this->getPageRange();
		$currentPage = $this->getCurrentPage(false); // currentPage is calculated in getPageRange()
		$buttons = array();

		// first page
		$buttons[] = $this->createPageButton($this->firstPageLabel, 0, self::CSS_FIRST_PAGE, $currentPage <= 0, false);

		// prev page
		if (($page = $currentPage - 1) < 0)
			$page = 0;
		$buttons[] = $this->createPageButton($this->prevPageLabel, $page, self::CSS_PREVIOUS_PAGE, $currentPage <= 0, false);

		// internal pages
		for ($i = $beginPage; $i <= $endPage; ++$i)
			$buttons[] = $this->createPageButton($i + 1, $i, self::CSS_INTERNAL_PAGE, false, $i == $currentPage);

		// next page
		if (($page = $currentPage + 1) >= $pageCount - 1)
			$page = $pageCount - 1;
		$buttons[] = $this->createPageButton($this->nextPageLabel, $page, self::CSS_NEXT_PAGE, $currentPage >= $pageCount - 1, false);

		// last page
		$buttons[] = $this->createPageButton($this->lastPageLabel, $pageCount - 1, self::CSS_LAST_PAGE, $currentPage >= $pageCount - 1, false);

		return $buttons;
	}

	protected function createPageButton($label, $page, $class, $hidden, $selected) {
		if ($hidden || $selected)
			$class.=' ' . ($hidden ? self::CSS_HIDDEN_PAGE : self::CSS_SELECTED_PAGE);
		if ($hidden == self::CSS_HIDDEN_PAGE)
			return '';
		$htmlOptions = array();
		if ($selected)
			$htmlOptions = array('class' => 'current');
		return CHtml::link($label, $this->createPageUrl($page), $htmlOptions);
	}

}

?>
