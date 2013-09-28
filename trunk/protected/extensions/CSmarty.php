    <?php
    /**
    *Author:Elite
    */

    require_once(Yii::getPathOfAlias('application.extensions.smarty').DIRECTORY_SEPARATOR.'Smarty.class.php');
    define('SMARTY_VIEW_DIR', Yii::getPathOfAlias('application.views'));
class CSmarty
{
    function __construct()
    {
    	
        $this->_smarty = new Smarty();
        $this->_smarty->caching = 0;
        $this->_smarty->template_dir = SMARTY_VIEW_DIR.DS.'tpl';
        $this->_smarty->compile_dir = SMARTY_VIEW_DIR.DS.'tpl_c';
		$this->_smarty->cache_lifetime = 0;
		$this->_smarty->left_delimiter = "{{";
		$this->_smarty->right_delimiter = "}}";
		$this->_smarty->compile_check = false;
    }

    function init(){
        Yii::registerAutoloader('smartyAutoload');
    }
    }
    ?>