<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>

<h1>No</h1>

<form method="POST">
    <label>
        <input hidden value="<?= $_GET["id"] ?>">
        Nosaukums <input name="name" value="<?= $_GET["name"] ?? "" ?>" /><br>
        Apraksts <input name="description" value="<?= $_GET["description"] ?? "" ?>" /><br>
        <button>Edit</button>
        <?php if (!empty($errors)) { ?>
            <p class="invalid-data">
                <?php foreach ($errors as $error) {
                    echo $error . "<br>";
                } ?>
            </p>
        <?php } ?>
    </label>
</form>


<?php require "views/components/footer.php" ?>