<?php
/**
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * @file Html template that renders the Boleto output.
 */

//convert array into string variables
foreach($this->output as $key => $value){
    ${$key} = $value;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <TITLE><?php echo $title; ?></TITLE>
    <META http-equiv=Content-Type content=text/html charset=utf-8>
    <meta charset="utf-8">
    <meta name="Generator" content="Boleto PHP Library - http://drupalista-br.github.com" />
    <style type="text/css">
        <?php echo $style;?>
    </style>
</head>
<BODY>
<table cellspacing=0 cellpadding=0 border=0 width=666>
    <tr><td class=cp width=150>
            <span class="campo"><IMG src="<?php echo $bank_logo; ?>" width="150" height="40" border=0></span></td>
        <td width=3 valign=bottom><img height=22 src="<?php echo $image_3; ?>" width=2 border=0></td>
        <td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $codigo_banco_com_dv; ?></font></div></td>
        <td width=3 valign=bottom><img height=22 src="<?php echo $image_3; ?>" width=2 border=0></td>
        <td class=ld align=right width=453 valign=bottom><span class=ld><span class="campotitulo"><?php echo $linha_digitavel; ?></span></span></td>
    </tr>
    <tbody>
    <tr>
        <td colspan=5><img height=2 src="<?php echo $image_2; ?>" width=666 border=0></td>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <?php
        $widths = array(268, 156, 34, 53, 120,);
        $titles = array('Cedente', 'Ag&ecirc;ncia/C&oacute;digo do Cedente', 'Esp&eacute;cie', 'Quantidade', 'Nosso n&uacute;mero',);

        foreach($widths as $key => $width){
            $title = $titles[$key];
            echo "<td class=ct valign=top width=7      height=13> <img height=13 src='$image_1' width=1 border=0></td>".
                "<td class=ct valign=top width=$width height=13>$title</td>";
        }
        ?>
    </tr>
    <tr>
        <?php
        $widths = array(268, 156, 34, 53, 53);
        $values = array($cedente, $agencia_codigo_cedente, $especie, $quantidade, $nosso_numero);

        foreach($widths as $key => $width){
            $value = $values[$key];
            echo "<td class=cp valign=top width=7      height=12><img height=12 src='$image_1' width=1 border=0></td>".
                "<td class=cp valign=top width=$width height=12 class='campo'>$value</td>";
        }
        ?>
    </tr>
    <tr>
        <?php
        $widths = array(7, 268, 7, 156, 7, 34, 7, 53, 7, 120);
        foreach($widths as $width){
            echo "<td valign=top width=$width height=1><img height=1 src='$image_2' width=$width border=0></td>";
        }
        ?>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <?php
        $widths = array('colspan' => 3, 132, 134, 180,);
        $titles = array('N&uacute;mero do documento', 'CPF/CNPJ', 'Vencimento', 'Valor documento', );
        $count = 0;
        foreach($widths as $key => $width){
            $title = $titles[$count]; $count += 1;
            $key   = (is_numeric($key)) ? 'width' : $key;
            echo "<td class=ct valign=top width=7      height=13> <img height=13 src='$image_1' width=1 border=0></td>".
                "<td class=ct valign=top $key=$width height=13>$title</td>";
        }
        ?>
    </tr>
    <tr>
        <?php
        $widths = array('colspan' => 3, 132, 134, 180, );
        $values = array($numero_documento, $cpf_cnpj, $data_vencimento, $valor_boleto,);
        $alighs = array('left', 'left', 'left', 'right');
        $count = 0;
        foreach($widths as $key => $width){
            $value = $values[$count]; $aligh = $alighs[$count]; $count += 1;
            $key   = (is_numeric($key)) ? 'width' : $key;
            echo "<td class=cp valign=top width=7      height=12><img height=12 src='$image_1' width=1 border=0></td>".
                "<td class=cp valign=top $key=$width height=12 align=$aligh class='campo'>$value</td>";
        }
        ?>
    </tr>
    <tr>
        <?php
        $widths = array(7, 113, 7, 72, 7, 132, 7, 134, 7, 180);
        foreach($widths as $width){
            echo "<td valign=top width=$width height=1><img height=1 src='$image_2' width=$width border=0></td>";
        }
        ?>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <?php
        $widths = array(113, 112, 113, 113, 180,);
        $titles = array('(-) Desconto / Abatimentos', '(-) Outras dedu&ccedil;&otilde;es', '(+) Mora / Multa', '(+) Outros acr&eacute;scimos', '(=) Valor cobrado', );

        foreach($widths as $key => $width){
            $title = $titles[$key];
            echo "<td class=ct valign=top width=7      height=13><img height=13 src='$image_1' width=1 border=0></td>".
                "<td class=ct valign=top width=$width height=13>$title</td>";
        }
        ?>
    </tr>
    <tr>
        <?php
        $widths = array(113, 112, 113, 113, 180,);
        $values = array($desconto_abatimento, $outras_deducoes, $mora_multa, $outros_acrescimos, $valor_cobrado,);

        foreach($widths as $key => $width){
            $value = $values[$key];
            echo "<td class=cp valign=top width=7      height=12><img height=12 src='$image_1' width=1 border=0></td>".
                "<td class=cp valign=top width=$width height=12 align=right class='campo'>$value</td>";
        }
        ?>
    </tr>
    <tr>
        <?php
        $widths = array(7, 113, 7, 112, 7, 113, 7, 113, 7, 180);
        foreach($widths as $width){
            echo "<td valign=top width=$width height=1><img height=1 src='$image_2' width=$width border=0></td>";
        }
        ?>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=ct valign=top width=659 height=13>Sacado</td>
    </tr>
    <tr>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top width=659 height=12><span class="campo"><?php echo $sacado; ?></span></td>
    </tr>
    <tr>
        <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=7 border=0></td>
        <td valign=top width=659 height=1><img height=1 src="<?php echo $image_2; ?>" width=659 border=0></td>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <td class=ct width=7 height=12></td>
        <td class=ct width=564>Demonstrativo</td>
        <td class=ct width=7 height=12></td>
        <td class=ct width=88>Autentica&ccedil;&atilde;o mec&acirc;nica</td>
    </tr>
    <tr>
        <td width=7></td>
        <td class=cp width=564>
	  <span class="campo">
	        <?php echo $demonstrativo1; ?>
          <br><?php echo $demonstrativo2; ?>
          <br><?php echo $demonstrativo3; ?>
          <br>
	  </span>
        </td>
        <td width=7></td>
        <td width=88></td>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0 width=666>
    <tbody>
    <tr>
        <td width=7></td>
        <td width=500 class=cp><br><br><br></td>
        <td width=159></td>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0 width=666>
    <tr>
        <td class=ct width=666></td>
    </tr>
    <tbody>
    <tr>
        <td class=ct width=666><div align=right>Corte na linha pontilhada</div></td>
    </tr>
    <tr>
        <td class=ct width=666><img height=1 src="<?php echo $image_6; ?>" width=665 border=0></td>
    </tr>
    </tbody>
</table>
<br>
<table cellspacing=0 cellpadding=0 border=0 width=666>
    <tr>
        <td class=cp width=150><span class="campo"><IMG src="<?php echo $bank_logo; ?>" width="150" height="40" border=0></span></td>
        <td width=3 valign=bottom><img height=22 src="<?php echo $image_3; ?>" width=2 border=0></td>
        <td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $codigo_banco_com_dv; ?></font></div></td>
        <td width=3 valign=bottom><img height=22 src="<?php echo $image_3; ?>" width=2 border=0></td>
        <td class=ld align=right width=453 valign=bottom><span class=ld><span class="campotitulo"><?php echo $linha_digitavel; ?></span></span></td>
    </tr>
    <tbody>
    <tr>
        <td colspan=5><img height=2 src="<?php echo $image_2; ?>" width=666 border=0></td>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=ct valign=top width=472 height=13>Local de pagamento</td>
        <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=ct valign=top width=180 height=13>Vencimento</td>
    </tr>
    <tr>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top width=472 height=12>Pag&aacute;vel em qualquer Banco at&eacute; o vencimento</td>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo $data_vencimento; ?></span>
        </td>
    </tr>
    <tr>
        <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=7 border=0></td>
        <td valign=top width=472 height=1><img height=1 src="<?php echo $image_2; ?>" width=472 border=0></td>
        <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=7 border=0></td>
        <td valign=top width=180 height=1><img height=1 src="<?php echo $image_2; ?>" width=180 border=0></td>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=ct valign=top width=472 height=13>Cedente</td>
        <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=ct valign=top width=180 height=13>Ag&ecirc;ncia/C&oacute;digo cedente</td>
    </tr>
    <tr>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top width=472 height=12><span class="campo"><?php echo $cedente; ?></span></td>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo $agencia_codigo_cedente; ?></span></td>
    </tr>
    <tr>
        <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=7 border=0></td>
        <td valign=top width=472 height=1><img height=1 src="<?php echo $image_2; ?>" width=472 border=0></td>
        <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=7 border=0></td>
        <td valign=top width=180 height=1><img height=1 src="<?php echo $image_2; ?>" width=180 border=0></td>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <?php
        $widths = array(113, 133, 62, 34, 102, 180,);
        $titles = array('Data do documento', 'N<u>o</u> documento', 'Esp&eacute;cie doc.', 'Aceite', 'Data processamento', 'Nosso n&uacute;mero',);

        foreach($widths as $key => $width){
            $title = $titles[$key];
            echo "<td class=ct valign=top width=7      height=13> <img height=13 src='$image_1' width=1 border=0></td>".
                "<td class=ct valign=top width=$width height=13>$title</td>";
        }
        ?>
    </tr>
    <tr>
        <?php
        $widths = array(113, 133, 62, 34, 102, 180,);
        $values = array($data_documento, $numero_documento, $especie_doc, $aceite, $data_processamento, $nosso_numero,);
        $alighs = array('left', 'left','left','left','left','right',);

        foreach($widths as $key => $width){
            $value = $values[$key]; $aligh = $alighs[$key];
            echo "<td class=cp valign=top width=7      height=12><img height=12 src='$image_1' width=1 border=0></td>".
                "<td class=cp valign=top width=$width height=12 align=$aligh class='campo'>$value</td>";
        }
        ?>
    </tr>
    <tr>
        <?php
        $widths = array(7, 113, 7, 133, 7, 62, 7, 34, 7, 102, 7, 180);
        foreach($widths as $width){
            echo "<td valign=top width=$width height=1><img height=1 src='$image_2' width=$width border=0></td>";
        }
        ?>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <?php
        $widths = array('COLSPAN' => 3, 83, 43, 103, 102, 180,);
        $titles = array('Uso do banco', 'Carteira', 'Esp&eacute;cie', 'Quantidade', 'Valor Documento', '(=) Valor documento',);
        $count = 0;
        foreach($widths as $key => $width){
            $title = $titles[$count]; $count += 1;
            $key   = (is_numeric($key)) ? 'width' : $key;

            echo "<td class=ct valign=top width =7   height=13> <img height=13 src='$image_1' width=1 border=0></td>".
                "<td class=ct valign=top $key=$width height=13>$title</td>";
        }
        ?>
    </tr>
    <tr>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td valign=top class=cp height=12 COLSPAN="3"><div align=left> </div></td>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top width=83><div align=left> <span class="campo"><?php echo $carteira; ?></span></div></td>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top width=43><div align=left><span class="campo"><?php echo $especie; ?></span>
            </div></td>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top width=103><span class="campo"><?php echo $quantidade; ?></span>
        </td>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top width=102>
            <span class="campo"><?php echo $valor_unitario; ?></span></td>
        <td class=cp valign=top width=7 height=12> <img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top align=right width=180 height=12><span class="campo"><?php echo $valor_boleto; ?></span></td>
    </tr>
    <tr>
        <?php
        $widths = array(7, 75, 7, 31, 7, 83, 7, 43, 7, 103, 7, 102, 7, 180);
        foreach($widths as $width){
            echo "<td valign=top width=$width height=1><img height=1 src='$image_2' width=$width border=0></td>";
        }
        ?>
    </tr>
    </tbody>

</table>
<table cellspacing=0 cellpadding=0 border=0 width=666>
    <tbody>
    <tr>
        <td align=right width=10>
            <table cellspacing=0 cellpadding=0 border=0 align=left>
                <tbody>
                <tr>       <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
                </tr>
                <tr>
                    <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=1 border=0></td>
                </tr>
                </tbody>
            </table></td>
        <td valign=top width=468 rowspan=5>
            <font class=ct>Instru&ccedil;&otilde;es (Texto de responsabilidade do cedente)</font>
            <br><br>
            <span class=cp><FONT class=campo><?php echo $instrucoes1; ?>
                    <br><?php echo $instrucoes2; ?>
                    <br><?php echo $instrucoes3; ?>
                    <br><?php echo $instrucoes4; ?>
        </FONT>
        <br><br>
        </span>
        </td>
        <td align=right width=188>
            <table cellspacing=0 cellpadding=0 border=0>
                <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
                    <td class=ct valign=top width=180 height=13>(-) Desconto / Abatimentos</td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
                    <td class=cp valign=top align=right width=180 height=12><?php echo $desconto_abatimento; ?></td>
                </tr>
                <tr>
                    <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=7 border=0></td>
                    <td valign=top width=180 height=1><img height=1 src="<?php echo $image_2; ?>" width=180 border=0></td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td align=right width=10>

            <table cellspacing=0 cellpadding=0 border=0 align=left>
                <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
                </tr>
                <tr>
                    <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=1 border=0></td>
                </tr>
                </tbody>
            </table></td>
        <td align=right width=188>
            <table cellspacing=0 cellpadding=0 border=0>
                <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
                    <td class=ct valign=top width=180 height=13>(-) Outras dedu&ccedil;&otilde;es</td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12> <img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
                    <td class=cp valign=top align=right width=180 height=12><?php echo $outras_deducoes; ?></td>
                </tr>
                <tr>
                    <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=7 border=0></td>
                    <td valign=top width=180 height=1><img height=1 src="<?php echo $image_2; ?>" width=180 border=0></td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td align=right width=10>
            <table cellspacing=0 cellpadding=0 border=0 align=left>
                <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
                </tr>
                <tr>
                    <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=1 border=0></td>
                </tr>
                </tbody>
            </table></td>
        <td align=right width=188>

            <table cellspacing=0 cellpadding=0 border=0>
                <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
                    <td class=ct valign=top width=180 height=13>(+) Mora / Multa</td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
                    <td class=cp valign=top align=right width=180 height=12><?php echo $mora_multa; ?></td>
                </tr>
                <tr>
                    <td valign=top width=7 height=1> <img height=1 src="<?php echo $image_2; ?>" width=7 border=0></td>
                    <td valign=top width=180 height=1><img height=1 src="<?php echo $image_2; ?>" width=180 border=0></td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td align=right width=10>
            <table cellspacing=0 cellpadding=0 border=0 align=left>
                <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
                </tr>
                <tr>
                    <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=1 border=0></td>
                </tr>
                </tbody>
            </table></td>
        <td align=right width=188>

            <table cellspacing=0 cellpadding=0 border=0>
                <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
                    <td class=ct valign=top width=180 height=13>(+) Outros acr&eacute;scimos</td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
                    <td class=cp valign=top align=right width=180 height=12><?php echo $outros_acrescimos; ?></td>
                </tr>
                <tr>
                    <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=7 border=0></td>
                    <td valign=top width=180 height=1><img height=1 src="<?php echo $image_2; ?>" width=180 border=0></td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td align=right width=10>
            <table cellspacing=0 cellpadding=0 border=0 align=left>
                <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
                </tr>
                </tbody>
            </table></td>
        <td align=right width=188>
            <table cellspacing=0 cellpadding=0 border=0>
                <tbody>
                <tr>
                    <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
                    <td class=ct valign=top width=180 height=13>(=) Valor cobrado</td>
                </tr>
                <tr>
                    <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
                    <td class=cp valign=top align=right width=180 height=12><?php echo $valor_cobrado; ?></td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0 width=666>
    <tbody>
    <tr>
        <td valign=top width=666 height=1><img height=1 src="<?php echo $image_2; ?>" width=666 border=0></td>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=ct valign=top width=659 height=13>Sacado</td>
    </tr>
    <tr>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top width=659 height=12><span class="campo"><?php echo $sacado; ?></span></td>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <td class=cp valign=top width=7 height=12><img height=12 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top width=659 height=12><span class="campo"><?php echo $endereco1; ?></span></td>
    </tr>
    </tbody>
</table>
<table cellspacing=0 cellpadding=0 border=0>
    <tbody>
    <tr>
        <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=cp valign=top width=472 height=13><span class="campo"><?php echo $endereco2; ?></span></td>
        <td class=ct valign=top width=7 height=13><img height=13 src="<?php echo $image_1; ?>" width=1 border=0></td>
        <td class=ct valign=top width=180 height=13>C&oacute;d. baixa</td>
    </tr>
    <tr>
        <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=7 border=0></td>
        <td valign=top width=472 height=1><img height=1 src="<?php echo $image_2; ?>" width=472 border=0></td>
        <td valign=top width=7 height=1><img height=1 src="<?php echo $image_2; ?>" width=7 border=0></td>
        <td valign=top width=180 height=1><img height=1 src="<?php echo $image_2; ?>" width=180 border=0></td>
    </tr>
    </tbody>
</table>
<table cellSpacing=0 cellPadding=0 border=0 width=666>
    <tbody>
    <tr>
        <td class=ct width=7 height=12></TD>
        <td class=ct width=409>Sacador/Avalista</TD>
        <td class=ct width=250><div align=right>Autentica&ccedil;&atilde;o mec&acirc;nica - <b class=cp>Ficha de Compensa&ccedil;&atilde;o</b></div></TD>
    </tr>
    <tr>
        <td class=ct  colspan=3><?php echo $avalista; ?></TD>
        <td class=ct  colspan=3></TD>
        <td class=ct  colspan=3></TD>
    </tr>
    </tbody>
</table>
<table cellSpacing=0 cellPadding=0 border=0 width=666>
    <tbody>
    <tr>
        <td vAlign=bottom align=left height=50><?php echo $codigo_barras; ?></TD>
    </tr>
    </tbody>
</table>
<table cellSpacing=0 cellPadding=0 border=0 width=666>
    <tr>
        <td class=ct width=666></TD>
    </tr>
    <tbody>
    <tr>
        <td class=ct width=666><div align=right>Corte na linha pontilhada</div></TD>
    </tr>
    <tr>
        <td class=ct width=666><img height=1 src="<?php echo $image_6; ?>" width=665 border=0></TD>
    </tr>
    </tbody>
</table>
</BODY>
</HTML>
