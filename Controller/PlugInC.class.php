<?php

/**
 * Description of PlugInC
 *
 * @author timothee
 */

include_once 'Model/PlugInM.class.php';

class PlugInC
{
    private $modele;
    private $version;
    private $repository;
    private $categories;
    private $annee;
    private $mois;
    private $jour;
    private $nbModif;


    public function __construct()
    {
    	$this->modele = new PlugInM();
    }
    
    /*
     * LES VUES
     */
    
    public function vueIndex()
    {
        $this->formatVersion();
	$title = 'Accueil';
	$corps = 'View/indexV.php';
		
	$this->categories = $this->modele->getCategories();
		
	include_once 'View/base.php';
    }
    
    /*
     * DIVERS
     */
    
    public function formatVersion()
    {
        $this->version = (string) $this->modele->getVersion();
        
        $this->annee = substr($this->version, 0, 4);
        $this->mois  = substr($this->version, 4, 2);
        $this->jour  = substr($this->version, 6, 2);
        $this->nbModif = substr($this->version, 8, 2);
        
        $this->version = 'Modifié ';
        
        if ($this->nbModif > 2)
            $this->version = $this->version .'pour la '. (int) $this->nbModif .' ème fois ';
        
        $this->version = $this->version .'le '. $this->jour .'/'. $this->mois .'/'. $this->annee;
    }
}