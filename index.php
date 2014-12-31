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
        if($i>=$pierwszydzien && $licznik>=10 && $licznik%7==0){echo("<li class='niedziela'>".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $licznik%7==0){echo("<li class='niedziela'>0".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $licznik<$ktorydzis){echo("<li class='nieaktywny'>0".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10 && $licznik<$ktorydzis){echo("<li class='nieaktywny'>".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $licznik == $ktorydzis){echo("<li class='akt'>"."<a href=index.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok."&temat=".$_GET[temat].">0".$licznik."</a>"."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10 && $licznik == $ktorydzis){echo("<li class='akt'>"."<a href=index.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok."&temat=".$_GET[temat].">".$licznik."</a>"."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10){echo("<li>"."<a href=index.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok."&temat=".$_GET[temat].">0".$licznik."</a>"."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10){echo("<li>"."<a href=index.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok."&temat=".$_GET[temat].">".$licznik."</a>"."</li>");$licznik++;}
        else {echo("<li class='hidden'>00</li>");}
        if(($i%7)==0){echo("<br>");}
    }
    echo("</div>");
//==========================================================================================================================================
    //kolejny miesiąc
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
    $pierwszydzien = abs((($iledni-$ktorydzis)%7+1+$aktualnydzien)%7);
    
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
        if($i>=$pierwszydzien && $licznik>=10 && $licznik%7==$pierwszydzien){echo("<li class='niedziela'>".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10 && $licznik%7==$pierwszydzien){echo("<li class='niedziela'>0".$licznik."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik<10){echo("<li>"."<a href=index.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok."&temat=".$_GET[temat].">0".$licznik."</a>"."</li>");$licznik++;}
        elseif($i>=$pierwszydzien && $licznik>=10){echo("<li>"."<a href=index.php?dzien=".$licznik."&miesiac=".$miesiac."&rok=".$rok."&temat=".$_GET[temat].">".$licznik."</a>"."</li>");$licznik++;}
        else {echo("<li class='hidden'>00</li>");}
        if(($i%7)==0){echo("<br>");}
    }
    echo("</div>");   
    
}
?>

<html>
<head>
    <title>Terminarz</title>

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
    if(isset($_GET[akcja])){
        if($_GET[akcja] == "logout"){
            unset($_SESSION[zalogowany]);
        }
    }
if(!isset($_GET[pyt1]))
{
if(isset($_GET[temat]))
{
    if(!$_GET[godzina] && !isset($_GET[imie]))
    {
    wyswietl_kalendarz();
    }
    if(!empty($_GET["dzien"]) && !isset($_GET[pyt1]))
    {
        echo("<br><br>Wybrałeś dzień ".$_GET[dzien]." ".miesiac_pl($_GET[miesiac])."<br>");
        if(!$_GET[godzina])
        {
            echo("Wybierz godzinę spotkania: <br>");
        }
        echo("<form></form>");
    }
    else
    {
        if(!isset($_GET[pyt1])){
        echo ("<br><font color='red'>Aby wybrać godzinę spotkania najpierw wybierz dzień z powyższego kalendarza!</font><br><br>");
        }
    }  
}
    $serwer = "localhost";
    $user = "mpadpl_admin";
    $password = "admin123";
    mysql_connect($serwer,$user,$password);
    mysql_select_db("mpadpl_terminarz");  
    $klient = mysql_query("select * from klienci where email = '".$_GET[email]."'");
    $txt = mysql_fetch_assoc($klient);
    $imie = ($txt["imie"]);
    $nazwisko = ($txt["nazwisko"]);
    $email = ($txt["email"]);
    $exist = mysql_query("select * from klienci where email = '".$_GET[email]."'");
    $exist = mysql_num_rows($exist); 
    
    if(isset($_GET[zmiana])){
        mysql_query('update klienci set imie = '.$_GET[imie].' nazwisko = '.$_GET[nazwisko].' telefon = '.$_GET[telefon].' where id='.$_GET[zmiana]);
    }
    
    if(isset($_SESSION[zalogowany])){
        $zal = mysql_query("select imie from pracownicy where id = '".$_SESSION[zalogowany]."'");
        $zal = mysql_fetch_assoc($zal);
        $zal = $zal[imie];
        echo('Witaj '.$zal);echo('<a href=index.php?akcja=logout>(Wyloguj)</a>');
    }        

    if(isset($_GET[dzien]) && isset($_GET[temat]))
    {
        $zajetegodziny = array();
        $sprgodz = mysql_query("select id_godziny from spotkania where dzien =".$_GET[dzien]);
        while ($sprawdzgodziny = mysql_fetch_assoc($sprgodz))
        {
            $zajetegodziny[]=$sprawdzgodziny[id_godziny];
        }    
    }    
    
?>
    <form action=<?php echo("index.php?dzien&miesiac&rok&godzina&temat&imie&nazwisko&telefon&email");?>>
        <?php if(isset($_GET[temat])){echo("<input type='hidden' value='$_GET[dzien]'name='dzien'>");} ?>
        <input type="hidden" value="<?php echo($_GET[miesiac]) ?>" name="miesiac">
        <input type="hidden" value="<?php echo($_GET[rok]) ?>" name="rok">
        <input type="hidden" value="<?php echo($_GET[godzina]) ?>" name="godzina">
        <?php if(isset($_GET[dzien])){echo("<input type='hidden' value='$_GET[temat]' name='temat'>");}
        ?>
    <?php
    if(isset($_GET[dzien]))
        {
            if(!isset($_GET[godzina]))
            {   
                if(date(G)>15 && date(j)==$_GET[dzien]){echo('<font color="red"><br>Firma dziś już nie czynna zapraszamy jutro !</font><br><br>');}
            }
        }
    if (isset($_GET[temat]) && isset($_GET[dzien]))
    {
        echo('Godzina: <select name=godzina required');
        if(isset($_GET[godzina])){echo(" disabled");}
        echo('>');
        echo('<option></option> ');
        if(isset($_GET[dzien]))
        {
            if(!isset($_GET[godzina]))
            {   
                if (8 > date(G) && $_GET[dzien]==date(j) && !in_array(1, $zajetegodziny)){
                    {echo('<option value="1">8:00</option>');}
                }
                elseif($_GET[dzien]<>date(j) && !in_array(1, $zajetegodziny)){echo('<option value="1">8:00</option>');}
                if (9 > date(G) && $_GET[dzien]==date(j)){
                    if (!in_array(2, $zajetegodziny)){echo('<option value="2">9:00</option>');}
                }
                elseif($_GET[dzien]<>date(j) && !in_array(2, $zajetegodziny)){echo('<option value="2">9:00</option>');}
                if (10 > date(G) && $_GET[dzien]==date(j)){
                    if (!in_array(3, $zajetegodziny)){echo('<option value="3">10:00</option>');}
                }
                elseif($_GET[dzien]<>date(j) && !in_array(3, $zajetegodziny)){echo('<option value="3">10:00</option>');}
                if (11 > date(G) && $_GET[dzien]==date(j)){
                    if (!in_array(4, $zajetegodziny)){echo('<option value="4">11:00</option>');}
                }
                elseif($_GET[dzien]<>date(j) && !in_array(4, $zajetegodziny)){echo('<option value="4">11:00</option>');}
                if (12 > date(G) && $_GET[dzien]==date(j)){
                    if (!in_array(5, $zajetegodziny)){echo('<option value="5">12:00</option>');}
                }
                elseif($_GET[dzien]<>date(j) && !in_array(5, $zajetegodziny)){echo('<option value="5">12:00</option>');}
                if (13 > date(G) && $_GET[dzien]==date(j)){
                    if (!in_array(6, $zajetegodziny)){echo('<option value="6">13:00</option>');}
                }
                elseif($_GET[dzien]<>date(j) && !in_array(6, $zajetegodziny)){echo('<option value="6">13:00</option>');}
                if (14 > date(G) && $_GET[dzien]==date(j)){
                    if (!in_array(7, $zajetegodziny)){echo('<option value="7">14:00</option>');}
                }
                elseif($_GET[dzien]<>date(j) && !in_array(7, $zajetegodziny)){echo('<option value="7">14:00</option>');}
                if (15 > date(G) && $_GET[dzien]==date(j)){
                    if (!in_array(8, $zajetegodziny)){echo('<option value="8">15:00</option>');}
                }
                elseif($_GET[dzien]<>date(j) && !in_array(8, $zajetegodziny)){echo('<option value="8">15:00</option>');}
            }
            if(isset($_GET[godzina]))
            {          
                if ($_GET[godzina] == 1){echo('<option value="1" selected>8:00</option>');} else {echo('<option value="1">8:00</option>');}
                if ($_GET[godzina] == 2){echo('<option value="2" selected>9:00</option>');} else {echo('<option value="2">9:00</option>');}
                if ($_GET[godzina] == 3){echo('<option value="3" selected>10:00</option>');} else {echo('<option value="3">10:00</option>');}
                if ($_GET[godzina] == 4){echo('<option value="4" selected>11:00</option>');} else {echo('<option value="4">11:00</option>');}
                if ($_GET[godzina] == 5){echo('<option value="5" selected>12:00</option>');} else {echo('<option value="5">12:00</option>');}
                if ($_GET[godzina] == 6){echo('<option value="6" selected>13:00</option>');} else {echo('<option value="6">13:00</option>');}
                if ($_GET[godzina] == 7){echo('<option value="7" selected>14:00</option>');} else {echo('<option value="7">14:00</option>');}  
                if ($_GET[godzina] == 8){echo('<option value="8" selected>15:00</option>');} else {echo('<option value="8">15:00</option>');}

            }
        }
    }
    ?>
        </select>
        <?php
            if(isset($_GET[temat]))
            {
                echo('Temat');
            }
            else
            {
                echo('Wybierz temat spotkania na które chcesz się umówić !');
                    echo('   
                        <select name="temat" required>
                        <option></option>
                        <option value="1">Pompy ciepła</option>
                        <option value="2">Piana poliuretanowa</option>
                        <option value="3">Prace inżynieryjne</option>
                        <option value="4">Termowizja</option>
                        </select>
                        <input type="submit" value="Wybierz">
                    ');
            }
            if(isset($_GET[temat]))
            {
                
                    echo('
                        <select name="temat" disabled>
                    ');
                        if($_GET[temat]==1){ echo('<option value="1" selected>Pompy ciepła</option>'); } else { echo('<option value="1">Pompy ciepła</option>'); }
                        if($_GET[temat]==2){ echo('<option value="2" selected>Piana poliuretanowa</option>'); } else { echo('<option value="2">Piana poliuretanowa</option>'); }
                        if($_GET[temat]==3){ echo('<option value="3" selected>Prace inżynieryjne</option>'); } else { echo('<option value="3">Prace inżynieryjne</option>'); }
                        if($_GET[temat]==4){ echo('<option value="4" selected>Termowiza</option>'); } else { echo('<option value="4">Termowizja</option>'); }
                    echo('
                        </select><br><br>
                    ');
                    if(isset($_GET[godzina])){
                    echo('Podaj dane kontaktowe<br>
                        Imię: <input type="text" name="imie" required>
                        Nazwisko: <input type="text" name="nazwisko" required>
                        Tel.<input type="tel" name="telefon" required>
                        E-mail <input type="email" name="email" required>
                    ');}
                    if(isset($_GET[imie]) && isset($_GET[nazwisko]) && isset($_GET[telefon])&& isset($_GET[email])){
                    echo('Podaj dane kontaktowe<br>');
                        echo('Imię: <input type="text" name="imie" value='.$_GET[imie].' required disabled>
                        Nazwisko: <input type="text" name="nazwisko" value='.$_GET[nazwisko].' required disabled>
                        Tel.<input type="tel" name="telefon" value='.$_GET[telefon].' required disabled>
                        E-mail <input type="email" name="email" value='.$_GET[email].' required disabled>
                    ');}
                    

                    if(isset($_GET[dzien]) && !isset($_GET[godzina]) && !isset($_GET[imie])){
                    echo('
                        <input type="submit" value="Wybierz termin">
                    ');}
            }
            if(isset($_GET[dzien]) && isset($_GET[godzina]) && isset($_GET[temat])){
                echo('<br><br>Podaj informacje dodatkowe:');
                if($_GET[temat] == 1){echo('<br>
                    Pytanie Pompy 1: <input type="text" name="pyt1" required><br>
                    Pytanie Pompy 2: <input type="text" name="pyt2" required>
                ');}
                if($_GET[temat] == 2){echo('<br>
                    Pytanie Piana 1: <input type="text" name="pyt1" required><br>
                    Pytanie Piana 2: <input type="text" name="pyt2" required>                
                ');}                
                if($_GET[temat] == 3){echo('<br>
                    Pytanie Prace 1: <input type="text" name="pyt1" required><br>
                    Pytanie Prace 2: <input type="text" name="pyt2" required>                   
                ');}
                if($_GET[temat] == 4){echo('<br>
                    Pytanie Termowizja 1: <input type="text" name="pyt1" required><br>
                    Pytanie Termowizja 2: <input type="text" name="pyt2" required>                 
                ');}
                echo('<br><br>
                    <input type="submit" value="Zapisz dane">
                ');
            }
            if(isset($_GET[imie])){
            echo('
                <br><input type="submit" value="Zapisz na spotkanie">
            ');}
            ?>
    </form>
    <?php
    if (isset($_GET[temat]))
    {
        echo("<br><br><br><a href='index.php'>Zacznij od nowa</a>");
    }
}
else{
    if($_GET[akcja]=="zapis"){
        $serwer = "localhost";
        $user = "mpadpl_admin";
        $password = "admin123";
        mysql_connect($serwer,$user,$password);
        mysql_select_db("mpadpl_terminarz");      
        
        //jeśli wszystko poprawne 

         
                $zapytanie = "INSERT INTO klienci (id,imie,nazwisko,email) values (null,'$_GET[imie]','$_GET[nazwisko]','$_GET[email]')" ;
                if(mysql_query($zapytanie))
                {
                   echo("Klient zapisany<br>");
                }
                //zapis spotkania
                $idklienta = mysql_query("select id from klienci where email = '".$_GET[email]."' and imie = '".$_GET[imie]."'");
                $idklienta = mysql_fetch_assoc($idklienta);
                $idklienta = $idklienta[id];

                $zapytanie = "INSERT INTO spotkania (id,dzien,miesiac,rok,id_godziny,id_klienta,id_tematu) values (null,'$_GET[dzien]','$_GET[miesiac]','$_GET[rok]','$_GET[godzina]','$idklienta','$_GET[temat]')" ;

                if(mysql_query($zapytanie))
                {
                   echo("Spotkanie zapisane<br>");
                }
        }

    }
    if($_GET[akcja]!='zapis'){
    $serwer = "localhost";
    $user = "mpadpl_admin";
    $password = "admin123";
    mysql_connect($serwer,$user,$password);
    mysql_select_db("mpadpl_terminarz"); 
    $checkklient = mysql_query("select * from klienci where email = '".$_GET[email]."'");
    $checkklient = mysql_fetch_assoc($checkklient);
    $checkimie = $checkklient[imie];
    $checknazwisko = $checkklient[nazwisko];
    $checkemail = $checkklient[email];
    $checktelefon = $checkklient[telefon];
    $checkidk = $checkklient[id];
                
    $checkspotkanie = mysql_query("select * from spotkania where dzien = '".$_GET[dzien]."' and miesiac = '".$_GET[miesiac]."' and rok = '".$_GET[rok]."' and id_godziny = '".$_GET[godzina]."' and id_tematu = '".$_GET[temat]."'");
    $checkspotkanie = mysql_fetch_assoc($checkspotkanie);
    $checkdzien = $checkspotkanie[dzien];
    $checkmiesiac = $checkspotkanie[miesiac];
    $checkrok = $checkspotkanie[rok];      
    $checkgodzina = $checkspotkanie[id_godziny];       
    $checktemat = $checkspotkanie[id_tematu];
    $checkklienta = $checkspotkanie[id_klienta]; 
    
    $to      = $_GET[email];
    $subject = 'Link do zapisu na spotkanie';
    
    if($_GET[imie] != $checkimie && $_GET[nazwisko] != $checknazwisko && $_GET[email] != $checkemail && $_GET[dzien] != $checkdzien && $_GET[miesiac] != $checkmiesiac &&  
        $_GET[rok] != $checkrok && $_GET[godzina] != $checkgodzina && $_GET[temat] != $checktemat){
        
        }
    
    if($checkimie == $_GET[imie] && $checknazwisko == $_GET[nazwisko]){
        $message = 'www.mpad.pl/Terminarz/index.php?dzien='.$_GET[dzien].'&miesiac='.$_GET[miesiac].'&rok='.$_GET[rok].'&godzina='.$_GET[godzina].'&imie='.$_GET[imie].'&nazwisko='.$_GET[nazwisko].'&telefon='.$_GET[telefon].'&email='.$_GET[email].'&temat='.$_GET[temat].'&pyt1='.$_GET[pyt1].'&pyt2='.$_GET[pyt2].'&akcja=zapis';
        $headers = 'From: marekpiesik1@wp.pl';
        mail($to, $subject, $message, $headers);
    } 
    elseif($checkimie != $_GET[imie] || $checknazwisko != $_GET[nazwisko] || $checktelefon != $_GET[telefon]) {
        echo("<b>Ktory zestaw danych jest poprawny:</b><br>");
        echo("Dane z formularza:<b> $_GET[imie] $_GET[nazwisko] $_GET[telefon] $_GET[email] ==></b><a href=index.php?dzien=".$_GET[dzien]."&miesiac=".$_GET[miesiac]."&rok=".$_GET[rok]."&godzina=".$_GET[godzina]."&imie=".$_GET[imie]."&nazwisko=".$_GET[nazwisko]."&telefon=".$_GET[telefon]."&email=".$_GET[email]."&temat=".$_GET[temat]."&pyt1=".$_GET[pyt1]."&pyt2=".$_GET[pyt2]."&akcja=zapis>Wybierz</a><br><br>");
        echo("Dane z bazy danych:<b> $checkimie $checknazwisko $checktelefon $checkemail ==></b><a href=index.php?dzien=".$_GET[dzien]."&miesiac=".$_GET[miesiac]."&rok=".$_GET[rok]."&godzina=".$_GET[godzina]."&imie=".$checkimie."&nazwisko=".$checknazwisko."&telefon=".$_GET[telefon]."&email=".$_GET[email]."&temat=".$_GET[temat]."&pyt1=".$_GET[pyt1]."&pyt2=".$_GET[pyt2]."&akcja=zapis&zmiana=$checkidka'>Wybierz</a><br><br>");
    }
    if($_GET[imie] == $checkimie && $_GET[nazwisko] == $checknazwisko && $_GET[email] == $checkemail && $_GET[dzien] == $checkdzien && $_GET[miesiac] == $checkmiesiac &&  
           $_GET[rok] == $checkrok && $_GET[godzina] == $checkgodzina && $_GET[temat] == $checktemat && $checkklienta == $checkidk){
                echo('Prawdopodobnie użyłeś już linku, wpis o spotkaniu istnieje już w bazie!<br>');
            
        }
            elseif($_GET[email] == $checkemail && $_GET[dzien] != $checkdzien && $_GET[miesiac] != $checkmiesiac &&  
           $_GET[rok] != $checkrok && $_GET[godzina] != $checkgodzina && $_GET[temat] != $checktemat){
                //zapis spotkania
                $idklienta = mysql_query("select id from klienci where email = '".$_GET[email]."'");
                $idklienta = mysql_fetch_assoc($idklienta);
                $idklienta = $idklienta[id];

                $zapytanie = "INSERT INTO spotkania (id,dzien,miesiac,rok,id_godziny,id_klienta,id_tematu) values (null,'$_GET[dzien]','$_GET[miesiac]','$_GET[rok]','$_GET[godzina]','$idklienta','$_GET[temat]')" ;

                if(mysql_query($zapytanie))
                {
                   echo("Spotkanie zapisane<br>");
                }
        }

    }
    echo('Dzien: '.$_GET[dzien].'<br>');
    echo('Miesiac: '.$_GET[miesiac].'<br>');
    echo('Rok: '.$_GET[rok].'<br>');
    echo('Godzina: '.$_GET[godzina].'<br>');
    echo('Imie: '.$_GET[imie].'<br>');
    echo('Nazwisko: '.$_GET[nazwisko].'<br>');
    echo('Telefon: '.$_GET[telefon].'<br>');
    echo('Email: '.$_GET[email].'<br>');
    echo('Temat spotkania: '.$_GET[temat].'<br>');
    echo('Pytanie1: '.$_GET[pyt1].'<br>');
    echo('Pytanie2: '.$_GET[pyt2].'<br>');
    echo('<a href=index.php>Zakończ</a>');
    ?>
    
       <a href="panel.php">Panel administracyjny</a>
</body>
</html>