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
    private $messageFlash;
    private $version;
    private $repository;
    private $categories;
    private $plugIn;
    private $annee;
    private $mois;
    private $jour;
    private $nbModif;
    private $modes;
    private $cesure;


    public function __construct()
    {
    	$this->modele = new PlugInM();
        $this->cesure = array('\r\n', '\n\r', '\n', '\r');
    }
    
    /*
     * LES VUES
     */
    
    public function vueIndex()
    {
        $this->formatVersion();
        
        $this->categories = $this->modele->getCategories();
        
	$title = 'Accueil';
	$corps = 'View/indexV.php';
		
	
		
	include_once 'View/base.php';
    }
    
    public function vueModif($id)
    {
        $this->plugIn = $this->modele->getPlugIn($id);
        $this->modes  = $this->modele->getModes();
        
        $title = 'Modification du plug-in '.$id;
        $corps = 'View/modifV.php';
        
        include_once 'View/base.php';
    }

    public function vueAjout()
    {
        $this->modes      = $this->modele->getModes();
        $this->categories = $this->modele->getCategories();
        
        $title = 'Ajout d\'un plug-in';
        $corps = 'View/addV.php';
        
        include_once 'View/base.php';
    }
    
    
    /*
     * LES ACTIONS
     */
    
    public function add()
    {
        array_pop($_POST);
        $categorie = array_pop($_POST);
        $nomPlugIn = array_shift($_POST);
        
        foreach ($_POST as $key => $valeur)
            $this->plugIn[$nomPlugIn][$key] = htmlspecialchars($valeur);
        
        $this->modele->addPlugIn($this->plugIn, $categorie);
        
        $this->messageFlash = 'Ajout du plug-in '.$nomPlugIn.' effectué !';
        
        $this->vueIndex();
    }

    public function modif()
    {
        $nomPlugIn = array_pop($_POST);
        
        foreach ($_POST as $key => $valeur)
            $this->plugIn[$nomPlugIn][$key] = htmlspecialchars($valeur);
        
        //$this->plugIn[$nomPlugIn]['description'] = str_replace($this->cesure, '', $this->plugIn[$nomPlugIn]['description']);
        
        //$this->plugIn[$nomPlugIn]['source'] = '"'.$this->plugIn[$nomPlugIn]['source'].'"';
        
        $this->modele->setPlugIn($this->plugIn);
        
        $this->messageFlash = 'Modification du plug-in '.$nomPlugIn.' effectué !';
        
        $this->vueIndex();
    }

    public function suppr($id)
    {
        $this->modele->deletePlugIn($id);
        
        $this->messageFlash = 'Suppression du plug-in '.$id.' faite !';
        
        $this->vueIndex();
    }

    /*
     * DIVERS
     */
    
    public function formatVersion()
    {
        $this->annee   = $this->modele->getAnnee();
        $this->mois    = $this->modele->getMois();
        $this->jour    = $this->modele->getJour();
        $this->nbModif = $this->modele->getNbModif();
        
        $this->version = 'Modifié ';
        
        if ($this->nbModif > 1)
            $this->version = $this->version .'pour la '. (int) $this->nbModif .' ème fois ';
        
        $this->version = $this->version .'le '. $this->jour .'/'. $this->mois .'/'. $this->annee;
    }
}