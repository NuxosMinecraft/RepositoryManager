<form action="plug-in.php" method="post">
    <fieldset>
        <legend>Modification du plug-in <?php echo $id; ?></legend>
        <label for="name">Name : </label><input class="input-xxlarge" type="text" name="name" id="name" value="<?php echo $this->plugIn['name']; ?>" />
        <label for="description">Description : </label>
        <textarea class="input-xxlarge" name="description" id="description" rows="5"><?php echo $this->plugIn['description']; ?></textarea>
        <label for="source">Source : </label>
        <input class="input-xxlarge" type="text" name="source" id="source" value="<?php echo $this->plugIn['source']; ?>" />
        <label for="destination">Destination : </label>
        <input type="text" name="destination" id="destination" value="<?php echo $this->plugIn['destination']; ?>" />
        <label for="md5">MD5 : </label>
        <input class="input-xlarge" type="text" name="md5" id="md5" value="<?php echo $this->plugIn['md5']; ?>" />
        <label for="version">Version : </label>
        <input class="input-mini" type="text" name="version" id="version" value="<?php echo $this->plugIn['version']; ?>" />
        <label for="mode">Mode : </label>
        <select name="mode" id="mode">
            <?php foreach ($this->modes as $mode): ?>
                <?php if ($mode == $this->plugIn['mode']): ?>
                    <option value="<?php echo $mode; ?>" selected><?php echo $mode; ?></option>
                <?php else: ?>
                    <option value="<?php echo $mode; ?>"><?php echo $mode; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="modif" value="<?php echo $id; ?>" />
        <br />
        <input class="btn btn-primary" type="submit">
        <a class="btn btn-danger" href="index.php">Annuler</a>
    </fieldset>
</form>