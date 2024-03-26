<?php require "components/head.php" ?>
<?php require "components/navbar.php" ?>

<H1>CKC kolektīvi</H1>
<table>
    <tr>
    <td><h2>Kolektīvs</h2></td>
    <td><h2>Apraksts</h2></td>
</tr>
<?php 
foreach($collectives as $collective){
    echo "<tr>
    <td>" .$collective["name"] . "</td>
    <td>". $collective["description"]. "<td>
    </tr>";
}
?>
</table>




<?php require "components/footer.php" ?>