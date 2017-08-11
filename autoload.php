<?php
spl_autoload_register(function($className)
{
    $namespace=str_replace("\\","/",__NAMESPACE__);
    $className=str_replace("\\","/",$className);
    if (strpos($className, "PHPExcel") !== false) {
    	$class=str_replace("\\","/",__DIR__)."/".(empty($namespace)?"":$namespace."/")."{$className}.php";
    }
    else {
    	$class=str_replace("\\","/",__DIR__)."/".(empty($namespace)?"":$namespace."/")."{$className}.class.php";
	}
    //echo "Path : $class";
    require_once($class);
});