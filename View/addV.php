<form action="plug-in.php" method="post">
    <fieldset>
        <legend>Ajout d'un plug-in</legend>
        <label for="nom">Nom formaté pour le fichier yaml : </label><input class="input-xxlarge" type="text" name="nom" id="name" />
        <label for="name">Name : </label><input class="input-xxlarge" type="text" name="name" id="name" />
        <label for="description">Description : </label>
        <textarea class="input-xxlarge" name="description" id="description" rows="5"></textarea>
        <label for="source">Source : </label>
        <input class="input-xxlarge" type="text" name="source" id="source" />
        <label for="destination">Destination : </label>
        <input type="text" name="destination" id="destination" />
        <label for="md5">MD5 : </label>
        <input class="input-xlarge" type="text" name="md5" id="md5" />
        <label for="version">Version : </label>
        <input class="input-mini" type="text" name="version" id="version" />
        <label for="mode">Mode : </label>
        <select name="mode" id="mode">
            <?php foreach ($this->modes as $mode): ?>
                <option value="<?php echo $mode; ?>"><?php echo $mode; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="categorie">Catégorie : </label>
        <select name="categorie" id="categorie">
            <?php foreach ($this->categories as $categorie => $listPlugInByCategorie): ?>
                <option value="<?php echo $categorie; ?>"><?php echo $categorie; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="add" value="1" />
        <br />
        <input class="btn btn-primary" type="submit">
        <a class="btn btn-danger" href="index.php">Annuler</a>
    </fieldset>
</form>