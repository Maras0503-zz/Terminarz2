<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
    //zapis do bazy wycięty z pod exsist
            
    if ($imie != $_GET[imie] && $nazwisko != $_GET[nazwisko] && $email != $_GET[email])
    {
        $zapytanie = "INSERT INTO klienci (id,imie,nazwisko,email) values (null,'$_GET[imie]','$_GET[nazwisko]','$_GET[email]')" ;
        
        if(mysql_query($zapytanie))
        {
           echo("Klient zapisany, ");
        }
        $idklienta = mysql_query("select id from klienci where email = '".$_GET[email]."'");
        $idklienta = mysql_fetch_assoc($idklienta);
        $idklienta = $idklienta[id];
                
                
        $zapytanie = "INSERT INTO spotkania (id,dzien,miesiac,rok,id_godziny,id_klienta,id_tematu) values (null,$_GET[dzien],$_GET[miesiac],$_GET[rok],$_GET[godzina],'$idklienta','$_GET[temat]')" ;
        if(mysql_query($zapytanie))
        {
           echo("Spotkanie zapisane");
        }
    }
        ?>
    </body>
</html>
