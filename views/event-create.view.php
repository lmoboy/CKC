<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>

<h1>No</h1>

<form method="POST">
  <label>
    Nosaukums <input name="title" type="text" value="<?= $_POST["title"] ?? "" ?>" /><br>
    Vieta <input name="location" type="text" value="<?= $_POST["location"] ?? "" ?>" /><br>
    Datums <input name="time" type="datetime-local" value="<?= $_POST["time"] ?? "" ?>"><br>
    <?php if (!empty($errors)) { ?>
      <p class="invalid-data">
        <?php foreach ($errors as $error) {
          echo $error . "<br>";
        } ?>
      </p>
    <?php } ?>
  </label>

  <button>Save</button>
</form>


<?php require "views/components/footer.php" ?>