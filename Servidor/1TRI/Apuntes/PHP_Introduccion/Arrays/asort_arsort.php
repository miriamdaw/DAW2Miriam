<HTML>
 <HEAD>
 <TITLE>Trabajando con Matrices</TITLE>
 </HEAD>
 <BODY>
 <CENTER>
 <H2>Arrays funciones <I>asort y arsort</I></H2>


 <?php
 $matriz1[0]="Madrid";
 $matriz1[1]="Zaragoza";
 $matriz1[2]="Bilbao";
 $matriz1[3]="Valencia";
 $matriz1[4]="Lerida";
 $matriz1[5]="Alicante";
 ?>


 <TABLE BORDER="0" CELLPADDING="4" CELLSPACING="6">
 <TR ALIGN="center"><TD>
 <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
 <TR ALIGN="center" BGCOLOR="yellow"><TH colspan='2'>A
 <TR ALIGN="center" BGCOLOR="yellow">
 <TD>Posición</TD><TD>Valor</TD>


 <?php
foreach($matriz1 as $pos => $valor){
    echo "<TR ALIGN='center'><TD>".$pos."</TD>";
    echo "<TD>".$valor."</TD></TR>";
 }  
?>


 </TABLE></TD>
 <TD>
 <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
 <TR ALIGN="center" BGCOLOR="yellow"><TH colspan='2'>as
 <TR ALIGN="center" BGCOLOR="yellow">
 <TD>Posición</TD><TD>Valor</TD></TR>


 <?php
 asort($matriz1);
 foreach($matriz1 as $pos => $valor){
    echo "<TR ALIGN='center'><TD>".$pos."</TD>";
    echo "<TD>".$valor."</TD></TR>";
 }
 ?>


 </TABLE></TD><TD>
 <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
 <TR ALIGN="center" BGCOLOR="yellow"><TH colspan='2'>ar
 <TR ALIGN="center" BGCOLOR="yellow">
 <TD>Posición</TD><TD>Valor</TD></TR>


 <?php
 arsort($matriz1);
 foreach($matriz1 as $pos => $valor){
    echo "<TR ALIGN='center'><TD>".$pos."</TD>";
    echo "<TD>".$valor."</TD></TR>";
 }
 ?>


 </TABLE></TD></TR>
 </TABLE>
 </CENTER>
 </BODY>
</HTML>