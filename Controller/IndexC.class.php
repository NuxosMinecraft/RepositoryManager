<?php

/**
 * Description of IndexC
 *
 * @author timothee
 */

include_once 'Controller/PlugInC.class.php';

class IndexC 
{
    private $plugInC;
	
    public function __construct()
    {
        $this->plugInC = new PlugInC();
    }
	
    public function vueIndex()
    {
        $this->plugInC->vueIndex();
    }
}