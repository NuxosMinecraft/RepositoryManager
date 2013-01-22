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
{
    $controller->modif();
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