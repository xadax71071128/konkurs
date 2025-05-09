<?php
$conn = new mysqli("localhost", "root", "", "szachy");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁo SZACHOWE</title>
 <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <h2>Koło szachowe <i>gambit</i> piona</h2>
    </header>
    <div id="lewy">
     <h4>Polecane Linki</h4>
     <ul>
        <li><a href="kw1.png"></a>kwerenda1</li>
        <li><a href="kw2.png"></a>kwerenda2</li>
        <li><a href="kw3.png"></a>kwerenda3</li>
        <li><a href="kw4.png"></a>kwerenda4</li>
     </ul>
     <img src="logo.png" alt="logo koła">
    </div>
    <div id="prawy">
<h3>najlepszi gracze naszego koła</h3>
<table>
<tr>
<th>pozycja</th>
<th>pseudonim</th>
<th>tytuł</th>
<th>ranking</th>
<th>klasa</th>
</tr>
<?php
$sql = "SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC;";
$result = $conn->query($sql);
$i=1;
While ($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" .$i . "</td>";
echo "<td>" .$row["pseudonim"] . "</td>";
echo "<td>" .$row["tytul"] . "</td>";
echo "<td>" .$row["ranking"] . "</td>";
echo "<td>" .$row["klasa"] . "</td>";
echo "</tr>";
$i++;
}
echo "<tr>";
echo "</tr>";
?>
</table>
<form action="szachy1.php" method="post">
    <input type="submit" value="Losuj nową pare graczy" id="losuj" name="losuj">
</form>
<?php
if (isset($_POST['losuj'])){
    $sql = "SELECT pseudonim,klasa FROM zawodnicy ORDER BY RAND()LIMIT 2;";
    $result = $conn->query($sql);
    echo "<h4>";
        while ($row =$result->fetch_assoc()){
            echo $row["pseudonim"]."".$row['klasa']."";
        }
}
?>
<p>Legenda:AM - Absolutny Mistrz,SM - Szkolny Mistrz,PM - Mistrz Poziomu,KM - Mistrz Klasowy</p>
</div>
</table>
</body>
</html>
<?php
$conn->close();
?>