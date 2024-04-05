<?php require "components/head.php" ?>
<?php require "components/navbar.php" ?>

<H1>CKC kolektīvi</H1>
<table>
    <tr>
        <td>
            <h2>Kolektīvs</h2>
        </td>
        <td>
            <h2>Apraksts</h2>
        </td>
    </tr>
    <?php
    foreach ($collectives as $collective) { ?>
        <tr>
            <td><a href="/show-kolektivi?id=<?= $collective["id"] ?>">
                    <?= $collective["NAME"] ?>
                </a></td>
            <td>
                <?= $collective["DESCRIPTION"] ?>
            <td>
                <a href="<?=
                    '/collective-edit?id=' . $collective["id"] .
                    '&name=' . urlencode($collective["NAME"]) .
                    '&description=' . urlencode($collective["DESCRIPTION"]) ?>">
                    <button>Edit</button>
                </a>
        </tr>
    <?php } ?>
</table>




<?php require "components/footer.php" ?>