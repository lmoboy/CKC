<?php require "components/head.php" ?>
<?php require "components/navbar.php" ?>

<H1>Pasākumi Cēsīs</H1>
<ul>
<?php 
foreach($events as $event){
    echo "<li>" . $event["date_and_time"] . " / " . $event["NAME"] . " / " . $event["location"];
}
?>
</ul>


<?php require "components/footer.php" ?>