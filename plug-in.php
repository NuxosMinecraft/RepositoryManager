<?php

include_once 'Controller/PlugInC.class.php';

$controller = new PlugInC();

/*
 * TRAITEMENT
 */

if (isset($_POST['plugin']))
{
    
}
// Traitement du formulaire de modif
elseif (isset($_POST['modif']))
    $controller->modif();
// Traitement d'une demande de suppression
elseif (isset($_GET['suppr']))
{
    $id = htmlspecialchars($_GET['suppr']);
    
    $controller->suppr($id);
}
    
/*
 * DEMANDE DE VUE
 */

// Modif
elseif (isset($_GET['modif']))
{
    $id = htmlspecialchars($_GET['modif']);
    
    $controller->vueModif($id);
}