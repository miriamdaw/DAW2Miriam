<HTML>
<HEAD>
    <TITLE>Trabajando con Matrices</TITLE>
</HEAD>
<BODY>
<CENTER>
    <H2>Arrays funciones <I>usort y uksort</I></H2>

    <?php
    $matriz1[] = "Madrid";
    $matriz1[] = "Zaragoza";
    $matriz1[] = "Bilbao";
    $matriz1[] = "Valencia";
    $matriz1[] = "Lerida";
    $matriz1[] = "Alicante";
    ?>

    <TABLE BORDER="0" CELLPADDING="4" CELLSPACING="6">
        <TR ALIGN="center">
            <TD>
                <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
                    <TR ALIGN="center" BGCOLOR="yellow">
                        <TH colspan='2'>Array Original</TH>
                    </TR>
                    <TR ALIGN="center" BGCOLOR="yellow">
                        <TD>Posición</TD>
                        <TD>Valor</TD>
                    </TR>

                    <?php
                    foreach ($matriz1 as $pos => $valor) {
                        echo "<TR ALIGN='center'><TD>" . $pos . "</TD>";
                        echo "<TD>" . $valor . "</TD></TR>";
                    }
                    ?>

                </TABLE>
            </TD>
            <TD>
                <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
                    <TR ALIGN="center" BGCOLOR="yellow">
                        <TH colspan='2'>usort()</TH>
                    </TR>
                    <TR ALIGN="center" BGCOLOR="yellow">
                        <TD>Posición</TD>
                        <TD>Valor</TD>
                    </TR>

                    <?php
                    // ordena alfabéticamente en función de la última
                    function ordenarValores($a, $b)
                    {
                        $fina = $a[strlen($a) - 1];
                        $finb = $b[strlen($b) - 1];
                        if ($fina == $finb) return 0;
                        return ($fina > $finb) ? 1 : -1;
                    }

                    usort($matriz1, "ordenarValores");
                    foreach ($matriz1 as $pos => $valor) {
                        echo "<TR ALIGN='center'><TD>" . $pos . "</TD>";
                        echo "<TD>" . $valor . "</TD></TR>";
                    }
                    ?>

                </TABLE>
            </TD>
            <TD>
                <TABLE BORDER="1" CELLPADDING="2" CELLSPACING="2">
                    <TR ALIGN="center" BGCOLOR="yellow">
                        <TH colspan='2'>uksort()</TH>
                    </TR>
                    <TR ALIGN="center" BGCOLOR="yellow">
                        <TD>Posición</TD>
                        <TD>Valor</TD>
                    </TR>

                    <?php
                    // ordena primero índices impares y después pares
                    function ordenarClaves($a, $b)
                    {
                        $a = $a % 2;
                        $b = $b % 2;
                        if ($a == $b) return 0;
                        return ($a > $b) ? -1 : 1;
                    }

                    uksort($matriz1, "ordenarClaves");
                    foreach ($matriz1 as $pos => $valor) {
                        echo "<TR ALIGN='center'><TD>" . $pos . "</TD>";
                        echo "<TD>" . $valor . "</TD></TR>";
                    }
                    ?>

                </TABLE>
            </TD>
        </TR>
    </TABLE>
</CENTER>
</BODY>
</HTML>
