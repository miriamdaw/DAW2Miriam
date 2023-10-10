<?php
/*ordenar por longitud de numero de matricula
cadena diferentes longitudes
por la clave*/
?>

<HTML>
 <HEAD>
 <TITLE>Ejercicio de clase -> ordenar arrays</TITLE>
 </HEAD>
 <BODY>
 <CENTER>
 <H2>Ejercicio matrículas, ordenar por longitud <I>usort y uksort</I></H2>


 <?php
$matriculas = [
    "01234" => "Yuri",
    "0123456" => "Miriam",
    "01" => "Santi",
    "092" => "Marina"
];
 ?>


 <TABLE BORDER="0" CELLPADDING="4" CELLSPACING="6">
 <TR ALIGN="center"><TD>
 <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
 <TR ALIGN="center" BGCOLOR="yellow">
 <TH colspan='2'>Array Original</TH>
 <TR ALIGN="center" BGCOLOR="yellow">
 <TD>Posición</TD><TD>Valor</TD></TR>


 <?php
 foreach($matriculas as $pos => $valor){
 echo "<TR ALIGN='center'><TD>".$pos."</TD>";
 echo "<TD>".$valor."</TD></TR>";
 }
 ?>


 </TABLE></TD>
 <TD>
 <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
 <TR ALIGN="center" BGCOLOR="yellow">
 <TH colspan='2'>usort()</TH>
 <TR ALIGN="center" BGCOLOR="yellow">
 <TD>Posición</TD><TD>Valor</TD></TR>


 <?php
//funcion ordena las matriculas por longitud, compara longitudes de las matriculas --> uksort
function ordenarLongitud($a,$b){
        $a=$a%2;
        $b=$b%2;
        if ($a == $b) return 0;
        return ($a > $b) ? -1 : 1;
        }

        uksort($matriculas,"ordenarLongitud");
        foreach($matriculas as $pos => $valor ){
            echo "<TR ALIGN='center'><TD>".$pos."</TD>";
            echo "<TD>".$valor."</TD></TR>";
        
        }
 ?>


 </TABLE></TD><TD>
 <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
 <TR ALIGN="center" BGCOLOR="yellow">
 <TH colspan='2'>uksort()</TH>
 <TR ALIGN="center" BGCOLOR="yellow">
 <TD>Posición</TD><TD>Valor</TD></TR>


 <?php

 ?>


 </TABLE></TD></TR>
 </TABLE>
 </CENTER>
 </BODY>
</HTML>