<?php 
if (!isset($title))
    $title = NULL;
else
    $title = $title . ' - ';
?>

<html>
    <head>
        <title><?php echo $title; ?>RepositoryManager</title>
		
	<meta charset="utf-8">
		
	<link rel="stylesheet" href="Resources/bootstrap/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="Resources/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
	<div class="navbar">
            <div class="navbar-inner">
		<a class="brand" href="index.php">RepositoryManager</a>
                <ul class="nav">
                    <li><a href="plug-in.php?add=1">Ajouter un plug-in</a></li>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <?php include_once $corps;?>
        </div>
        <script src="Resources/js/jquery-1.8.3.min.js"></script>
        <script src="Resources/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>