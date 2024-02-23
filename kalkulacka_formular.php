<html>
 <head>
  <title>PHP Test</title>
  <link rel="stylesheet" href="tlacitko.css">
</head>
 <body>
 <p>
     <?php
        $message_sent = false;
        if(isset($_POST['email']) && $_POST['email'] != '' &&
        isset($_POST['Jmeno']) && $_POST['Jmeno'] != '' &&
        isset($_POST['Prijmeni']) && $_POST['Prijmeni'] != '' &&
        isset($_POST['adres_kon_svat']) && $_POST['adres_kon_svat'] != '' &&
        isset($_POST['adres_kon_obrad']) && $_POST['adres_kon_hos'] != '' &&
        isset($_POST['pred_poc_host']) && $_POST['pred_poc_host'] != '' &&
        isset($_POST['datum']) && $_POST['datum'] != '' &&
        isset($_POST['snatek']) && $_POST['snatek'] != '' &&
        isset($_POST['Predpok_rozp']) && $_POST['Predpok_rozp'] != '' &&
        isset($_POST['Souhlas']) && $_POST['Souhlas'] != '' &&
        isset($_POST['Svat_koor']) && $_POST['Svat_koor'] != '' &&
        isset($_POST['ochrana']) && $_POST['ochrana'] == '5'){
                //"odeslat formular"            
                //echo "<prev>";
                //print_r($_POST);
                //echo "</prev>";
                $Jmeno = $_POST['Jmeno'];
                $Prijmeni = $_POST['Prijmeni'];
                $Telefon = $_POST['Telefon'];
                $Email = $_POST['email'];
                $AdresaKonaniSvatby = $_POST['adres_kon_svat'];
                $AdresaKonaniObradu = $_POST['adres_kon_obrad'];
                $AdresaKonaniHostiny = $_POST['adres_kon_hos'];
                $PredbeznyPocetHostu = $_POST['pred_poc_host'];
                $DatumSvatby = $_POST['datum'];
                $BarvaStylSvatby = $_POST['barv_styl_svat'];

                //tlacitka zacatek
                $SvatebniObrad = $_POST['snatek'];
                $VyzdobaSvatebniHostiny = $_POST['Vyzdoba_svat_hos'];
                $UklidVyzdoby = $_POST['Uklid_vyz'];
                $SvatebniKoordinace = $_POST['Svat_koor'];
                $SvatebniKvetiny = $_POST['Svat_kvet'];
                $SvatebniTiskoviny = $_POST['Svat_tisk'];
                $Fotograf = $_POST['Fotograf'];
                $Kameraman = $_POST['Kameraman'];
                $Hudba = $_POST['Hudba'];
                $Catering = $_POST['Catering'];
                $BarDort = $_POST['Bar_dort'];
                $HlidaniDeti = $_POST['Hlid_deti'];
                $SvatebniHry = $_POST['Hry'];
                $DarkyProHosty = $_POST['Darky_pro_hos'];
                $PodekovaniHostum = $_POST['Podek_hos'];
                //tlacitka konec

                //Podmínky pro tlačítka:
                if($SvatebniObrad == "CIVIL"){
                    $SvatebniObrad = "Civilní obřad";
                }
                else if($SvatebniObrad == "CIRKEVNI"){
                    $SvatebniObrad = "Církevní obřad";
                }
                else if($SvatebniObrad == "CEREMONIALNI"){
                    $SvatebniObrad = "Ceremoniální nebo jiný";
                }

                if($SvatebniKoordinace == "OBRAD"){
                    $SvatebniKoordinace = "Obřad";
                }
                else if($SvatebniKoordinace == "HOSTINA"){
                    $SvatebniKoordinace = "Hostina";
                }
                else if($SvatebniKoordinace == "CELY_DEN"){
                    $SvatebniKoordinace = "Celý den";
                }
                else if($SvatebniKoordinace == "SVATBA_KLIC"){
                    $SvatebniKoordinace = "Svatba na klíč";
                }

                $PredpokladanyRozpocet = $_POST['Predpok_rozp'];
                $DoplnujiciInformace = $_POST['Dopl_info'];
 
                $messageSubject = "Žádost o výpočet ceny (kalkulačka)";
               
                $to = "pohadkova.svatba.mezi@gmail.com";
                $body = "";

                $body .= "Jméno: ".$Jmeno. "\r\n";
                $body .= "Příjemní: ".$Prijmeni. "\r\n";
                $body .= "Telefon: ".$Telefon. "\r\n";
                $body .= "Email: ".$Email. "\r\n";
                $body .= "\r\n";
                $body .= "Adresa konání svatby: ".$AdresaKonaniSvatby. "\r\n";
                $body .= "Adresa konání obradu: ".$AdresaKonaniObradu. "\r\n";
                $body .= "Adresa konání hostiny: ".$AdresaKonaniHostiny. "\r\n";
                $body .= "Předběžný počet hostů: ".$PredbeznyPocetHostu. "\r\n";
                $body .= "Datum svatby: ".$DatumSvatby. "\r\n";
                $body .= "Barva a styl svatby: ".$BarvaStylSvatby. "\r\n";
                //Tlacitka
                $body .= "Svatební obřad: ".$SvatebniObrad. "\r\n";
                $body .= "Výzdoba svatební hostiny: ".$VyzdobaSvatebniHostiny. "\r\n";
                $body .= "Úklid výzdoby: ".$UklidVyzdoby. "\r\n"; 
                $body .= "Svatební koordinace: ".$SvatebniKoordinace. "\r\n"; 
                $body .= "Svatební květiny: ".$SvatebniKvetiny. "\r\n";
                $body .= "Svatební tiskoviny: ".$SvatebniTiskoviny. "\r\n";
                $body .= "Fotograf: ".$Fotograf. "\r\n";
                $body .= "Kameraman: ".$Kameraman. "\r\n";
                $body .= "Hudba: ".$Hudba. "\r\n";
                $body .= "Catering: ".$Catering. "\r\n";
                $body .= "Sladký bar, dort: ".$BarDort. "\r\n";
                $body .= "Hlídání dětí: ".$HlidaniDeti. "\r\n";
                $body .= "Svatební hry: ".$SvatebniHry. "\r\n";
                $body .= "Dárky pro hosty: ".$DarkyProHosty. "\r\n";
                $body .= "Poděkování hostům: ".$PodekovaniHostum. "\r\n";

                //Zase texty....
                $body .= "Předpokládaný rozpočet: ".$PredpokladanyRozpocet. " Kč\r\n";
                $body .= "Doplňující informace: ".$DoplnujiciInformace. "\r\n";
                mail($to,$messageSubject,$body);

                //Proti e-mail, protože potřebuješ vědět co potřebuješ... 
                mail($Email,$messageSubject,"Vaše žádost byla úspěšně zpracována. \n Nyní vyčkejte na odpověď. \n S pozdravem Pohádková Svatba.");
                echo "<center><h1>Formulář se úspěšně odeslal</h1></center>";
                echo "<center><h2>Nyní vyčkejte než Vás kontaktujeme zpět</h2><center>";
                echo '<h2><a class="button" href="http://pohadkova-svatba.cz/#kalkulacka">Vrátit zpět</a></h2>';
                $message_sent = true;            
    } 
    else{
        echo "<center><h1>Formulář se nepodařilo odeslat, vynechali jste některé z polí s hvězdičkou (povinné)</h1></center>";
        echo "<center><h2>Zkuste to znovu</h2><center>";
        echo '<h2><a href="http://pohadkova-svatba.cz/#kalkulacka">Zpět</a></h2>';
    }
     ?>
</p>
 </body>
</html>