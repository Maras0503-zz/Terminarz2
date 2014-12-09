<!DOCTYPE html>
<?php

function dni_mies($mies,$rok) {

 $dni = 31;
 while (!checkdate($mies, $dni, $rok)) $dni--;


return $dni;
}


function dzien_tyg_nr($mies,$rok) {

 $dzien = date("w", mktime(0,0,0,$mies,1,$rok));
 
return $dzien;
}

function dzien_tyg($nr) {

 $dzien = array(0 => "Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Pi&#177;tek", "Sobota");

return $dzien[$nr];
}


function miesiac_pl($mies) {

 $mies_pl = array(1=>"Stycznia", "Lutego", "Marca", "Kwietnia", "Maja", "Czerwieca", "Lipieca", "Sierpnia", "Wrze&#182;nia", "PaĽdziernika", "Listopada", "Grudnia");

return $mies_pl[$mies];
}

?>

<html>
<head>
    <title>Terminarz</title>

    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="pl" />
    <link href="CSS/main.css" rel="stylesheet" type="text/css"/>

    <style type="text/css">
        #kalendarz {width:250px;}
        #kalendarz p {text-align: right;}
        #kalendarz li {display: inline; padding:2px 5px; }
        #kalendarz .akt {color: #990000; font-weight: bold;}
        #kalendarz .hidden {visibility: hidden;}
    </style>
</head>
<body>
<?php
if(isset($_GET[imie]) && isset($_GET[nazwisko]))
{
    $serwer = "localhost";
    $user = "mpadpl_admin";
    $password = "admin123";
    mysql_connect($serwer,$user,$password);
    mysql_select_db("mpadpl_terminarz");
    
    $wpis = mysql_query("select * from klienci where email = '".$_GET[email]."'");
    $txt = mysql_fetch_assoc($wpis);
    $imie = ($txt["imie"]);
    $nazwisko = ($txt["nazwisko"]);
    $email = ($txt["email"]);
    if ($imie != $_GET[imie] && $nazwisko != $_GET[nazwisko] && $email != $_GET[email])
    {
        $zapytanie = "INSERT INTO klienci (id,imie,nazwisko,email) values (null,'$_GET[imie]','$_GET[nazwisko]','$_GET[email]')" ;
        $zapytanie = "INSERT INTO spotkania (id,termin,id_klienta,id_tematu) values (null,'$_GET[imie]','$_GET[nazwisko]','$_GET[email]')" ;
        if(mysql_query($zapytanie))
        {
           echo("Umówiłeś się na spotkanie. Zapraszamy!");
        }
    }
}
?>
<div class="mce2">

<div id="kalendarz">    
<?php
echo '<p>'.dzien_tyg(date("w")).', '.date("d").' '.miesiac_pl(date("n")).' '.date("Y").'</p>';
?>
<ul>
 <li>N&nbsp;</li>
 <li>Pn</li>
 <li>Wt</li>
 <li>Śr</li>
 <li>Cz</li>
 <li>Pt</li>
 <li>Sb</li>
</ul>

<ul>
<?php
for($i=0;$i<dzien_tyg_nr(date("n"),date("Y"));$i++)
 echo '<li class="hidden">00</li> ';

for($i=1;$i<dni_mies(date("n"),date("Y")) +1;$i++) {
 if ($i<10) $i = '0'.$i;
 if ($i == date("d")) echo '<li>'.'<a href=index.php?dzien='.$i.' class="act">'.$i.'</a>'.'</li>';
  else echo '<li>'.'<a href=index.php?dzien='.$i.' class="dzien">'.$i.'</a>'.'</li> ';
}

?>
</ul>
</div>
</div>
<?php
//if(!empty($GET["dzien"]))
{
    echo("<br><br>Wybrałeś dzień ".$_GET["dzien"]." ".miesiac_pl(date("n"))."<br> Wybierz godzinę spotkania: <br>");
    echo("<form></form>");
}
?>
    <form action=<?php echo("index.php?dzien?godzina?imie?nazwisko?temat?email");?>>
        <input type="hidden" value="<?php echo($_GET["dzien"]) ?>" name="dzien">
        <select name="godzina" required>
            <option></option>
            <option value="1">8:00</option>
            <option value="2">8:30</option>
            <option value="3">9:00</option>
            <option value="4">9:30</option>
            <option value="5">10:00</option>
            <option value="6">10:30</option>
            <option value="7">11:00</option>
            <option value="8">11:30</option>
            <option value="9">12:00</option>
            <option value="10">12:30</option>
            <option value="11">13:00</option>
            <option value="12">13:30</option>
            <option value="13">14:00</option>
            <option value="14">14:30</option>
            <option value="15">15:00</option>
        </select>
        Temat:<select name="temat" required>
            <option></option>
            <option value="1">Pompy ciepła</option>
            <option value="2">Piana poliuretanowa</option>
            <option value="3">Prace inżynieryjne</option>
            <option value="4">Dotacje</option>
            <option value="5">Termowizja</option>
            <option value="6">Wycena</option>
            <option value="7">Reklamacja</option>
            <option value="8">Inne</option>
        </select>
        Imię: <input type="text" name="imie" required>
        Nazwisko: <input type="text" name="nazwisko" required>
        E-mail <input type="email" name="email" required>
        <input type="submit" value="Umów">
    </form>
</body>
</html>