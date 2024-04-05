<?php require "components/head.php" ?>
<?php require "components/navbar.php" ?>

<H1>Pasākumi Cēsīs</H1>
<ul>
  <?php foreach ($events as $event) { ?>
    <li>
      <tr>
        <td><a href="/show-pasakumi?id=<?= $event["id"] ?>">
            <?= $event["date_and_time"] ?>
          </a></td>
        <td><a href="/show-pasakumi?id=<?= $event["id"] ?>">
            <?= $event["NAME"] ?>
          </a></td>
        <td><a href="/show-pasakumi?id=<?= $event["id"] ?>">
            <?= $event["location"] ?>
          </a></td>
        <form class="delete-form" method="POST" action="/event-delete">
          <button name="id" value="<?= $event["id"] ?>">Delete</button>
        </form>
        <a
          href="<?= '/event-edit?id=' . $event["id"] . '&name=' . urlencode($event["NAME"]) . '&time=' . urlencode($event["date_and_time"]) . '&location=' . urlencode($event["location"]) ?>">
          <button>Edit</button>
        </a>
        </td>


    </li>
    </tr>
  <?php } ?>
</ul>
</ul>


<?php require "components/footer.php" ?>