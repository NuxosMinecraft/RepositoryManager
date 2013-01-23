<?php

class PlugInM
{
    private $fileRepository;
    private $repo;
    private $repository;
    private $version;
    private $annee;
    private $mois;
    private $jour;
    private $nbModif;
    private $categories;
    private $plugIn;
    private $modes;


    public function __construct()
    {
	/* 
	 * Cible du fichier yaml du dépôt
	 * Tous les fichiers sont inclus au fur à mesure dans le front-contrôleur index.php donc le chemin cible se fait à partir de 
         * index.php
	 */
	$this->fileRepository = 'repo.yml';
        $this->repo           = $this->getRepo();        
        $this->modes          = array('jarupdate', 'copy', 'extract');
    }
	
    // Donne tout le contenu du fichier yaml sous forme de tableau (array en php)
    public function getRepo()
    {
	return yaml_parse_file($this->fileRepository);
    }
	
    // Rentre d'un cran (dimension) dans le tableau Repo
    public function getRepository()
    {
	$repo = $this->getRepo();
	$this->repository = $repo['repository'];
		
	return $this->repository;
    }
	
    public function getVersion()
    {
	$repository = $this->getRepository();
	$this->version = $repository['version'];
		
	return $this->version;
    }
    
    public function getAnnee()
    {
        $this->version = (string) $this->getVersion();
        
        return $this->annee = substr($this->version, 0, 4);
    }
    
    public function getMois()
    {
        $this->version = (string) $this->getVersion();
        
        return $this->mois  = substr($this->version, 4, 2);
    }
    
    public function getJour()
    {
        $this->version = (string) $this->getVersion();
        
        return $this->jour  = substr($this->version, 6, 2);
    }
    
    public function getNbModif()
    {
        $this->version = (string) $this->getVersion();
        
        return $this->nbModif = substr($this->version, 8, 2);
    }

    // Retourne toutes les catégories de plug-in + les plug-in attachés aux catégories
    public function getCategories()
    {
        $repository = $this->getRepository();
        
        // Suppression de version dans le tableau
        array_shift($repository);
            
        return $repository;            
    }
    
    public function getCategorieByNamePlugin($namePlugInArg)
    {
        $repository = $this->getCategories();
        
        foreach ($repository as $categorie => $listPlugInByCategorie)
        {
            foreach ($listPlugInByCategorie as $nomPlugIn => $contenuPlugIn)
            {
                if ($nomPlugIn == $namePlugInArg)
                    return $categorie;                    
            }
        }
    }

    public function getCategorieByPlugIn($plugIn)
    {
        return $this->getCategorieByNamePlugin($this->getNomPlugIn($plugIn));
    }

    public function getPlugIn($id)
    {
        $this->categories = $this->getCategories();
        
        foreach ($this->categories as $listPlugInByCategorie)
        {
            foreach ($listPlugInByCategorie as $nomPlugIn => $contenuPlugIn)
            {
                if ($id == $nomPlugIn)
                    return $contenuPlugIn;
            }
        }
    }
    
    public function getNomPlugIn($plugIn)
    {
        foreach ($plugIn as $nomPlugIn => $contenuPlugIn)
            return $nomPlugIn;
    }

    public function getModes()
    {
        return $this->modes;
    }
    
    public function setVersion()
    {
        $annee   = date('Y');
        $mois    = date('m');
        $jour    = date('d');
        $nbModif = 1;
        
        $version = $annee.$mois.$jour;
        
        if ($annee == $this->getAnnee() && $mois == $this->getMois() && $jour == $this->getJour())
            $nbModif = $this->getNbModif() + 1;
        
        if ($nbModif < 10)
            $nbModif = '0'.$nbModif;
        
        $this->repo['repository']['version'] = $version.$nbModif;
    }

    public function setPlugIn($plugIn)
    {
        $categorie = $this->getCategorieByPlugIn($plugIn);
        $nomPlugIn = $this->getNomPlugIn($plugIn);
        
        $this->repo['repository'][$categorie][$nomPlugIn] = $plugIn[$nomPlugIn];
        
        $this->save();
    }
    
    public function deletePlugIn($nomPlugIn)
    {
        $categorie = $this->getCategorieByNamePlugin($nomPlugIn);
        
        unset($this->repo['repository'][$categorie][$nomPlugIn]);
        
        $this->save();
    }

    public function save()
    {
        $this->setVersion();
        
        file_put_contents($this->fileRepository, yaml_emit($this->repo, YAML_UTF8_ENCODING));
    }
}