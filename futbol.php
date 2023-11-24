<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link href="styl.css" rel="stylesheet">
</head>
<body>
    <div class="baner">
        <h2>Światowe Rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </div>
    <div class="mecze">
        <?php
        $lacz = mysqli_connect('localhost','root','','egzamin');
        $pyt = "SELECT `zespol1`,`zespol2`,`wynik`,`data_rozgrywki` FROM `rozgrywka` WHERE `zespol1` = 'EVG';";
        $wyn = mysqli_query($lacz, $pyt);
        while ($r = mysqli_fetch_array($wyn)) {
            echo '<div class="wyn">';
            echo "<h3>".$r[0]."-".$r[1]."</h3>";
            echo "<h4>".$r[2]."</h4>";
            echo "<p>W dniu: ".$r[3]."</p>";
            echo "</div>";
        }
        mysqli_close($lacz);
        ?>
    </div>
    <div class="glowny">
        <h2>Reprezentacja Polski</h2>
    </div>
    <div class="lewy">
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy)</p>
        <form action="futbol.php" method="post">
            <input type="text" name="text">
            <input type="submit" value="Sprawdź">
        </form>
        <ul>
            <?php
            $lacz = mysqli_connect('localhost','root','','egzamin');
            if(!empty ($_POST['text'])){
                $wy = $_POST['text'];
                $pyt = "SELECT zawodnik.`imie`,zawodnik.`nazwisko`,pozycja.nazwa FROM `zawodnik` JOIN pozycja ON zawodnik.pozycja_id = pozycja.id WHERE zawodnik.`pozycja_id` = '$wy';";
                $wyn = mysqli_query($lacz, $pyt);
                while($row = mysqli_fetch_array($wyn))
                {
                echo "<p><li>".$row[0]." ".$row[1]."</li></p>";
                }
            }
            mysqli_close($lacz);
            ?>
        </ul>
    </div>
    <div class="prawy">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: Martyna Borowska</p>
    </div>
</body>
</html>