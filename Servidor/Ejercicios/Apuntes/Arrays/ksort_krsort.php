<HTML>
 <HEAD>
 <TITLE>Trabajando con Matrices</TITLE>
 </HEAD>
 <BODY>
 <CENTER>
 <H2>Arrays funciones <I>ksort y krsort</I></H2>


 <?php
 $matriz1["d"]="Madrid";
 $matriz1["c"]="Zaragoza";
 $matriz1["e"]="Bilbao";
 $matriz1["b"]="Valencia";
 $matriz1["f"]="Lerida";
 $matriz1["a"]="Alicante";
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


 </TABLE>
 </TD>
 <TD>
 <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
 <TR ALIGN="center" BGCOLOR="yellow"><TH colspan='2'>k
 <TR ALIGN="center" BGCOLOR="yellow">
 <TD>Posición</TD><TD>Valor</TD></TR>


 <?php
 ksort($matriz1);
 foreach($matriz1 as $pos => $valor){
    echo "<TR ALIGN='center'><TD>".$pos."</TD>";
    echo "<TD>".$valor."</TD></TR>";
 }
 ?>


 </TABLE></TD><TD>
 <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
 <TR ALIGN="center" BGCOLOR="yellow"><TH colspan='2'>kr
 <TR ALIGN="center" BGCOLOR="yellow">
 <TD>Posición</TD><TD>Valor</TD></TR>


 <?php
 krsort($matriz1);
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