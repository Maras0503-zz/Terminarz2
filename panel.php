<?php session_start(); ?>
<!DOCTYPE html>
<?php
function miesiac_pl($mies) {

 $mies_pl = array(1=>"Stycznia", "Lutego", "Marca", "Kwietnia", "Maja", "Czerwieca", "Lipieca", "Sierpnia", "Wrze&#182;nia", "PaĽdziernika", "Listopada", "Grudnia");

return $mies_pl[$mies];
}

function miesiac_pl_odm($mies) {

 $mies_pl = array(1=>"Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień");

return $mies_pl[$mies];
}
//=========================================================================================================================================
function wyswietl_kalendarz()
{
    // 1-31 2-28/29 3-31 4-30 5-31 6-30 7-31 8-31 9-30 10-31 11-30 12-31
    // pierwszy miesiąc
    $miesiac = date(n);
    $iledni;
    if($miesiac == 1 || $miesiac == 3 || $miesiac == 5 || $miesiac == 7 || $miesiac == 8 || $miesiac == 10 || $miesiac == 12)
    {
        $iledni = 31;
    }
    elseif($miesiac == 4 || $miesiac == 6 || $miesiac == 9 || $miesiac == 11)
    {
        $iledni = 30;
    }
    elseif(date(L) && $miesiac ==2)
    {
        $iledni = 29;
    }
    else
    {
        $iledni = 28;
    }
    $aktualnydzien = date(N);
    $ktorydzis = date(j);
    $licznik = 1;
    $pierwszydzien = ((7-($ktorydzis%7-$aktualnydzien))%7)+1;
    $rok = date(Y);
    echo ('<p>'.miesiac_pl_odm(date("n")).' '.date("Y").'</p>');
    echo("<div class=kalendarz>
            <li>Pn</li>
            <li>Wt</li>
            <li>Śr</li>
            <li>Cz</li>
            <li>Pt</li>
            <li>Sb</li>
            <li>Nd</li>
            <br>
    ");
    for ($i=1;$i<=($iledni+$pierwszydzien-1);$i++)
    {   
        if($i>=$pierwszydzien && $licznik>=10 && $i%7==0){echo("<li class='niedziela'>".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $i%7==0){echo("<li class='niedziela'>0".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $licznik<$ktorydzis){echo("<li class='nieaktywny'>0".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10 && $licznik<$ktorydzis){echo("<li class='nieaktywny'>".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $licznik == $ktorydzis){echo("<li class='akt'>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">0".$licznik."</a>"."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10 && $licznik == $ktorydzis){echo("<li class='akt'>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">".$licznik."</a>"."</li>");$licznik++;}

        elseif($i>=$pierwszydzien && $licznik<10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">0".$licznik."</a>"."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">".$licznik."</a>"."</li>");$licznik++;}
        else {echo("<li class='hidden'>00</li>");}
        if(($i%7)==0){echo("<br>");}
    }
    echo("</div>");
//==========================================================================================================================================
    //kolejny miesiąc 1
    if($miesiac!=12){$miesiac++;}
    else {$miesiac=1;
        $rok++;
    }

    if($miesiac == 1 || $miesiac == 3 || $miesiac == 5 || $miesiac == 7 || $miesiac == 8 || $miesiac == 10 || $miesiac == 12)
    {
        $iledni = 31;
    }
    elseif($miesiac == 4 || $miesiac == 6 || $miesiac == 9 || $miesiac == 11)
    {
        $iledni = 30;
    }
    elseif(date(L) && $miesiac ==2)
    {
        $iledni = 29;
    }
    else
    {
        $iledni = 28;
    }
    $licznik = 1;
    $pierwszydzien = date(N, mktime(0, 0, 0, $miesiac, 1, $rok));
    
    echo ('<p>'.miesiac_pl_odm(date($miesiac)).' '); if(date(n)==12){echo(date(Y)+1);} else {echo(date(Y));} echo('</p>');
    echo("<div class=kalendarz>
            <li>Pn</li>
            <li>Wt</li>
            <li>Śr</li>
            <li>Cz</li>
            <li>Pt</li>
            <li>Sb</li>
            <li>Nd</li>
            <br>
    ");
    for ($i=1;$i<=($iledni+$pierwszydzien-1);$i++)
    {
        if($i>=$pierwszydzien && $licznik>=10 && $i%7==0){echo("<li class='niedziela'>".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $i%7==0){echo("<li class='niedziela'>0".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">0".$licznik."</a>"."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">".$licznik."</a>"."</li>");$licznik++;}
        else {echo("<li class='hidden'>00</li>");}
        if(($i%7)==0){echo("<br>");}
    }
    echo("</div>");   
//kolejny miesiąc 2==============================================================================================================
    $miesiac++;
    if ($miesiac == 13){$miesiac=1; $rok++;}


    if($miesiac == 1 || $miesiac == 3 || $miesiac == 5 || $miesiac == 7 || $miesiac == 8 || $miesiac == 10 || $miesiac == 12)
    {
        $iledni = 31;
    }
    elseif($miesiac == 4 || $miesiac == 6 || $miesiac == 9 || $miesiac == 11)
    {
        $iledni = 30;
    }
    elseif(date(L) && $miesiac ==2)
    {
        $iledni = 29;
    }
    else
    {
        $iledni = 28;
    }
    $licznik = 1;
    $pierwszydzien = date(N, mktime(0, 0, 0, $miesiac, 1, $rok));
    
    echo ('<p>'.miesiac_pl_odm(date($miesiac)).' '); if(date(n)==12 || date(n)==11){echo(date(Y)+1);} else {echo(date(Y));} echo('</p>');
    echo("<div class=kalendarz>
            <li>Pn</li>
            <li>Wt</li>
            <li>Śr</li>
            <li>Cz</li>
            <li>Pt</li>
            <li>Sb</li>
            <li>Nd</li>
            <br>
    ");
    for ($i=1;$i<=($iledni+$pierwszydzien-1);$i++)
    {
        if($i>=$pierwszydzien && $licznik>=10 && $i%7==0){echo("<li class='niedziela'>".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $i%7==0){echo("<li class='niedziela'>0".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">0".$licznik."</a>"."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">".$licznik."</a>"."</li>");$licznik++;}
        else {echo("<li class='hidden'>00</li>");}
        if(($i%7)==0){echo("<br>");}
    }
    echo("</div>");   
    
    //kolejny miesiąc 3==============================================================================================================
    $miesiac++;
    if ($miesiac == 13){$miesiac=1; $rok++;}


    if($miesiac == 1 || $miesiac == 3 || $miesiac == 5 || $miesiac == 7 || $miesiac == 8 || $miesiac == 10 || $miesiac == 12)
    {
        $iledni = 31;
    }
    elseif($miesiac == 4 || $miesiac == 6 || $miesiac == 9 || $miesiac == 11)
    {
        $iledni = 30;
    }
    elseif(date(L) && $miesiac ==2)
    {
        $iledni = 29;
    }
    else
    {
        $iledni = 28;
    }
    $licznik = 1;
    $pierwszydzien = date(N, mktime(0, 0, 0, $miesiac, 1, $rok));
    
    echo ('<p>'.miesiac_pl_odm(date($miesiac)).' '); if(date(n)==12 || date(n)==11){echo(date(Y)+1);} else {echo(date(Y));} echo('</p>');
    echo("<div class=kalendarz>
            <li>Pn</li>
            <li>Wt</li>
            <li>Śr</li>
            <li>Cz</li>
            <li>Pt</li>
            <li>Sb</li>
            <li>Nd</li>
            <br>
    ");
    for ($i=1;$i<=($iledni+$pierwszydzien-1);$i++)
    {
        if($i>=$pierwszydzien && $licznik>=10 && $i%7==0){echo("<li class='niedziela'>".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $i%7==0){echo("<li class='niedziela'>0".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">0".$licznik."</a>"."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">".$licznik."</a>"."</li>");$licznik++;}
        else {echo("<li class='hidden'>00</li>");}
        if(($i%7)==0){echo("<br>");}
    }
    echo("</div>");   
    //kolejny miesiąc 4==============================================================================================================
    $miesiac++;
    if ($miesiac == 13){$miesiac=1; $rok++;}


    if($miesiac == 1 || $miesiac == 3 || $miesiac == 5 || $miesiac == 7 || $miesiac == 8 || $miesiac == 10 || $miesiac == 12)
    {
        $iledni = 31;
    }
    elseif($miesiac == 4 || $miesiac == 6 || $miesiac == 9 || $miesiac == 11)
    {
        $iledni = 30;
    }
    elseif(date(L) && $miesiac ==2)
    {
        $iledni = 29;
    }
    else
    {
        $iledni = 28;
    }
    $licznik = 1;
    $pierwszydzien = date(N, mktime(0, 0, 0, $miesiac, 1, $rok));
    
    echo ('<p>'.miesiac_pl_odm(date($miesiac)).' '); if(date(n)==12 || date(n)==11){echo(date(Y)+1);} else {echo(date(Y));} echo('</p>');
    echo("<div class=kalendarz>
            <li>Pn</li>
            <li>Wt</li>
            <li>Śr</li>
            <li>Cz</li>
            <li>Pt</li>
            <li>Sb</li>
            <li>Nd</li>
            <br>
    ");
    for ($i=1;$i<=($iledni+$pierwszydzien-1);$i++)
    {
        if($i>=$pierwszydzien && $licznik>=10 && $i%7==0){echo("<li class='niedziela'>".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $i%7==0){echo("<li class='niedziela'>0".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">0".$licznik."</a>"."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">".$licznik."</a>"."</li>");$licznik++;}
        else {echo("<li class='hidden'>00</li>");}
        if(($i%7)==0){echo("<br>");}
    }
    echo("</div>");
    
        //kolejny miesiąc 5==============================================================================================================
    $miesiac++;
    if ($miesiac == 13){$miesiac=1; $rok++;}


    if($miesiac == 1 || $miesiac == 3 || $miesiac == 5 || $miesiac == 7 || $miesiac == 8 || $miesiac == 10 || $miesiac == 12)
    {
        $iledni = 31;
    }
    elseif($miesiac == 4 || $miesiac == 6 || $miesiac == 9 || $miesiac == 11)
    {
        $iledni = 30;
    }
    elseif(date(L) && $miesiac ==2)
    {
        $iledni = 29;
    }
    else
    {
        $iledni = 28;
    }
    $licznik = 1;
    $pierwszydzien = date(N, mktime(0, 0, 0, $miesiac, 1, $rok));
    
    echo ('<p>'.miesiac_pl_odm(date($miesiac)).' '); if(date(n)==12 || date(n)==11){echo(date(Y)+1);} else {echo(date(Y));} echo('</p>');
    echo("<div class=kalendarz>
            <li>Pn</li>
            <li>Wt</li>
            <li>Śr</li>
            <li>Cz</li>
            <li>Pt</li>
            <li>Sb</li>
            <li>Nd</li>
            <br>
    ");
    for ($i=1;$i<=($iledni+$pierwszydzien-1);$i++)
    {
        if($i>=$pierwszydzien && $licznik>=10 && $i%7==0){echo("<li class='niedziela'>".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $i%7==0){echo("<li class='niedziela'>0".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">0".$licznik."</a>"."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10){echo("<li>"."<a href=panel.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok.">".$licznik."</a>"."</li>");$licznik++;}
        else {echo("<li class='hidden'>00</li>");}
        if(($i%7)==0){echo("<br>");}
    }
    echo("</div>");   

}  
?>

<html>
<head>
    <title>Panel administracyjny</title>

    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="pl" />
    <link href="CSS/main.css" rel="stylesheet" type="text/css"/>

    <style type="text/css">
        .kalendarz {width:250px;}
        .kalendarz p {text-align: right;}
        .kalendarz li {display: inline; padding:2px 5px; }
        .nieaktywny {color: gray;}
        .niedziela {color: red; font-weight: bold;}
        .kalendarz a:link { color: black; text-decoration: none }
        .kalendarz a:visited { color: black; text-decoration: none }
        .kalendarz a:hover { color: black; text-decoration: underline }
        .akt a:link { color: blue; font-weight: bold; }
        .akt a:visited { color: blue; font-weight: bold; }
        .akt a:hover { color: blue; font-weight: bold; }
        .kalendarz .hidden {visibility: hidden;}
           
        #kalendarz {width:250px;}
        #kalendarz p {text-align: right;}
        #kalendarz li {display: inline; padding:2px 5px; }
        #kalendarz .akt {color: #990000; font-weight: bold;}
        #kalendarz .hidden {visibility: hidden;}
    </style>
</head>
<body>
   <?php
    $serwer = "localhost";
    $user = "mpadpl_admin";
    $password = "admin123";
    mysql_connect($serwer,$user,$password);
    mysql_select_db("mpadpl_terminarz");

    if(isset($_GET[akcja])){
        if($_GET[akcja] == "logout"){
            unset($_SESSION[zalogowany]);
        }
    }

    
    if(!isset($_SESSION[zalogowany]))
    {
        $haslo = mysql_query("select haslo from pracownicy where login='".$_POST[login]."'");
        $haslo = mysql_fetch_assoc($haslo);
        $haslo = $haslo[haslo];
      
        $idprac = mysql_query("select id from pracownicy where login='".$_POST[login]."'");
        $idprac = mysql_fetch_assoc($idprac);
        $idprac = $idprac[id];
        if($haslo == $_POST[haslo]){
            $_SESSION[zalogowany] = $idprac;
        }
    }
     if(isset($_SESSION[zalogowany])){
        $zal = mysql_query("select imie from pracownicy where id = '".$_SESSION[zalogowany]."'");
        $zal = mysql_fetch_assoc($zal);
        $zal = $zal[imie];
        echo('Witaj '.$zal);echo('<a href=panel.php?akcja=logout>(Wyloguj)</a>');
    } 
    
    if(!isset($_SESSION[zalogowany]))
    {
        echo('
            <form action=panel.php method="POST">
                Login: <input type="text" name="login">
                Hasło: <input type="password" name="haslo">
                <input type="submit" value="Zaloguj">
            </form>
             ');
    }
    ?>
    
    <a href="index.php">Powrót</a>
    <?php
    $tablica = array("zablokuj", "odblokuj");
//dla zalogowanego początek ===============================================================================
    if(isset($_SESSION[zalogowany])){
        if(isset($_GET[dzien]) && isset($_GET[miesiac]) && isset($_GET[rok]))
        {   
            if($_GET[akcja]=="zablokuj"){
                $zapytanie = mysql_query("select * from zablokowane_terminy where dzien=$_GET[dzien] and miesiac=$_GET[miesiac] and rok=$_GET[rok]");
                $zapytanie = mysql_fetch_assoc($zapytanie);
                if(empty($zapytanie)){
                    $zapytanie = "INSERT INTO zablokowane_terminy (id,dzien,miesiac,rok,zablokowany_id1,zablokowany_id2,zablokowany_id3,zablokowany_id4) values (null,'".$_GET[dzien]."','".$_GET[miesiac]."','".$_GET[rok]."',wolny,wolny,wolny,wolny)";
                    mysql_query($zapytanie);
                }
            }
            if($_GET[akcja]=="odblokuj"){
                mysql_query("UPDATE zablokowane_terminy SET zablokowany_id$_SESSION[zalogowany]='wolny' where dzien='".$_GET[dzien]."' and miesiac='".$_GET[miesiac]."' and rok='".$_GET[rok]."'");
            }
            echo("<br><br>test ".$_GET[dzien].'.'.$_GET[miesiac].'.'.$_GET[rok]);
            $zapytanie = mysql_query("select zablokowany_id$_SESSION[zalogowany] from zablokowane_terminy where dzien=$_GET[dzien] and miesiac=$_GET[miesiac] and rok=$_GET[rok]");
            $zapytanie = mysql_fetch_assoc($zapytanie);
            $czywolny = $zapytanie[zablokowany_id.$_SESSION[zalogowany]];
            if(empty($zapytanie)){$czywolny='wolny';}
            echo($czywolny);
            if ($czywolny == 'zablokowany' && !in_array($_GET[akcja],$tablica)){
                echo("<a href=panel.php?dzien=$_GET[dzien]&miesiac=$_GET[miesiac]&rok=$_GET[rok]&akcja=odblokuj> ODBLOKUJ TERMIN</a>");
            }
            if ($czywolny == 'wolny' && !in_array($_GET[akcja],$tablica)){
                echo("<a href=panel.php?dzien=$_GET[dzien]&miesiac=$_GET[miesiac]&rok=$_GET[rok]&akcja=zablokuj> ZABLOKUJ TERMIN</a>");
            }
        }
            wyswietl_kalendarz();
        }
        

        
//dla zalogowanego koniec ===============================================================================
    ?>
</body>
</html>
