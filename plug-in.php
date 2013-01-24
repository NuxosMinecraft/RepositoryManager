<?php

include_once 'Controller/PlugInC.class.php';

$controller = new PlugInC();

/*
 * TRAITEMENT
 */

if (isset($_POST['add']))
{
    $controller->add();
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

// Add
elseif (isset ($_GET['add']))
{
    $controller->vueAjout();
}
// Modif
elseif (isset($_GET['modif']))
{
    $id = htmlspecialchars($_GET['modif']);
    
    $controller->vueModif($id);
}