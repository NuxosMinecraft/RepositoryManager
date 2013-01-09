<?php

class PlugInM
{
    private $fileRepository;
    private $repository;
    private $version;
	
    public function __construct()
    {
	/* 
	 * Cible de fichier yaml du dépôt
	 * Tous les fichiers sont inclus au fur à mesure dans le front-contrôleur index.php donc le chemin cible se fait à partir de index.php
	 */
	$this->fileRepository = 'repo.yml';
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
        
    // Retourne toutes les catégories de plug-in + les plug-in attachés aux catégories
    public function getCategories()
    {
        $repository = $this->getRepository();
        $version = array_shift($repository);
            
        return $repository;            
    }
}