<?php
$i = 1;
$j = 1;
?>

<?php if ($this->messageFlash): ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert" type="button">x</button>
        <?php echo $this->messageFlash; ?>
    </div>
    <?php $this->messageFlash = NULL; ?>
<?php endif; ?>

<div class="well">
    <?php echo $this->version; ?>
</div>

<ul class="nav nav-list">
    <?php foreach ($this->categories as $categorie => $listPlugInByCategorie): ?>
        <li class="nav-header"><?php echo $categorie; ?></li>
        
        <?php foreach ($listPlugInByCategorie as $nomPlugIn => $contenuPlugIn): ?>
            <div class="accordion" id="accordion<?php echo $i; ?>">
                <div class="accordion-group">
                    <li>
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $j; ?>">
                                <?php echo $nomPlugIn; ?>
                            </a>
                        </div>
                        <div id="collapse<?php echo $j; ?>" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <table class="table">
                                    <?php foreach ($contenuPlugIn as $champ => $contenu): ?>
                                        <tr>
                                            <td><strong><?php echo $champ ?></strong></td>
                                            <td><?php echo $contenu; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                                <a class="btn btn-primary" href="plug-in.php?modif=<?php echo $nomPlugIn; ?>">Modifier</a>
                                <a class="btn btn-danger" data-toggle="modal" href="#myModal<?php echo $nomPlugIn; ?>">Supprimer</a>
                            </div>
                        </div>
                    </li>
                </div>
            </div>
            <div class="modal hide" id="myModal<?php echo $nomPlugIn; ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h3>Voulez-vous vraiment supprimez ...?</h3>
                </div>
                <div class="modal-body">
                    <p>Le plug-in <?php echo $nomPlugIn; ?></p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Non</a>
                    <a href="#" class="btn btn-primary">Oui</a>
                </div>
            </div>
            <?php $j = $j + 1; ?>
        <?php endforeach; ?>
        
        <li class="divider"></li>
        <?php $i = $i + 1; ?>
    <?php endforeach; ?>
</ul>