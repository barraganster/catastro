<html>
    <header>
<style type="text/css">
            @page invitacion {
              size: A4 portrait;
              margin: 2cm;
            }
            .invitacionPage {
               page: invitacion;
               page-break-after: always;
            }
.texto{
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 12px;
  color: #0000000;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height:15px;
 }
 .texto3{
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 13px;
  color: #0000000;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height:15px;
 }
 .texto2{
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 35px;
  color: #0000000;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height:15px;
 }
 #datos{
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 10px;
 }
 #encabezado{
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 12px;
  color: #0000000;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
 }
</style>
        <title>Carta Invitación</title>
    </header>
    <body>
      <?php
  $fechas=date_parse($fecha);
      $fecha = array();

        $fecha['1'] = "Enero";
        $fecha['2'] = "Febrero";
        $fecha['3'] = "Marzo";
        $fecha['4'] = "Aabril";
        $fecha['5'] = "Mayo";
        $fecha['6'] = "Junio";
        $fecha['7'] = "Julio";
        $fecha['8'] = "Agosto";
        $fecha['9'] = "Septiembre";
        $fecha['10'] = "Octubre";
        $fecha['11'] = "Noviebre";
        $fecha['12'] = "Diciembre";
        foreach ($configutacion as $key ) {
        $nombrec=$key->nombre;
        $cargo=$key->cargo;
        $logo=$key->file;
        $des_recargo=$key->descuento_recargo;
          }
        ?>
        <!-- Recorro todos los elementos -->

        <div class="invitacionPage">
            <!-- saco el valor de cada elemento -->
            <!-- nuevo fotmato -->
    <table width="100%" border="0" align="center">
  <tr>
    <td width="12%"><img src="logos/escudo.png" width="70" height="70"></td>
    <td width="72%"><p align="center">AYUNTAMIENTO CONSTITUCIONAL DE <?php echo $municipio; ?>, TAB.<br>DIRECCIÓN DE FINANZAS MUNICIPALES</p></td>
    <td width="16%"><img src="css/images/logos/{{$logo}}" width="70" height="70"><br/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right" class="texto3">INVITACION: DF/INV/0/2015</div></td>
  </tr>
</table>

<p align="left" class="texto3">ESTIMADO (A): <b> <?php echo $nombre ?> </b> R.F.C:</p>
  </p>
<p class="texto" align="justify">
La dirección de finanzas del municipio de <?php echo $municipio; ?>, no tiene registrado el cumplimiento del pago impuesto predial de un predio inscrito a su nombre, con número  de cuenta: <b> <?php echo $clave ?>, Ubicado en: CHICOACAN ?, Sup. Predio: 710430m2, Sup. Construcion: 0 m2 de este municipio; por lo que confundamento   en los artículos 1,6,8 fracción IV, 16 fracciones I, II y XII, 19, 22, 24, 31, 44, 45, 46, 47, 48, 72 fracciones I y IV, 87, 88 fracciones I, II y III, 103 y 105 fracciones IV y VII, 153, 154 y 155   de la ley de Hacienda Municipal del Estado de Tabasco; se le invita   a que realice su pago correspondiente de  a los años detallados a continuación:</strong></p>

<table width="100%" border="0" class="texto">
  <tr>
    <td>
    <table width="42%" border="0" align="right">
            <thead>
                <tr>
                    <th>VENCIDOS</th>
                    <th><div align="right">ADEUDO</div></th>
                </tr>
            </thead>
            <tr>
                <td><div align="center">2013</div></td>
                <td><div align="right">$192.00</div></td>
            </tr>
            <tr>
                <td><div align="center">2014</div></td>
                <td><div align="right">$192.00</div></td>
            </tr>
            <tr>
                <td><div align="center">2015</div></td>
                <td><div align="right">$199.00</div></td>
            </tr>
            <tr>
                <td><div align="center">2015</div></td>
                <td><div align="right">$199.00</div></td>
            </tr>
            <tr>
                <td><div align="center">2015</div></td>
                <td><div align="right">$199.00</div></td>
            </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td>
        <br><br><br><br><br><br><br>
        <table width="42%" border="0" align="right">
        <tr>
          <th width="55%"><div align="right">SUB-TOTAL:</div></th>
        <td width="45%"><div align="right">$583.00</div></td>
        </tr>
        <tr>
          <th><div align="right">ACTUALIZACION:</div></th>
          <td><div align="right">$19.00</div></td>
        </tr>
        <tr>
          <th><div align="right">RECARGOS</div></th>
          <td><div align="right">$130.00</div></td>
        </tr>
        <tr>
          <th><div align="right">MULTAS</div></th>
          <td><div align="right">$134.00</div></td>
        </tr>
        <tr>
          <th><div align="right">GSTO DE EJECUCION:</div></th>
          <td><div align="right">$266.00</div></td>
        </tr>
        <tr>
          <th><div align="right">TOTAL ADEUDO:</div></th>
          <td><div align="right">1,132.00</div></td>
        </tr>
    </table></td>
  </tr>
</table>

<br><br><br><br><br><br>



<p align="right" class="texto"><?php echo $municipio; ?>, Tab. a <?php echo $fechas['day']. " de " . $fecha[$fechas['month']] . " del " . $fechas['year']; ?></p>

<br/>
<p class="texto" align="center">ATENTAMENTE</p>
<hr align="center" color="#000000" width="250">
<p class="texto" align="center"><?php echo $nombrec ?></p>
<p class="texto" align="center"><?php echo $cargo ?></p>
<p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __ _ _ _ _ _ _ _ _ _ _ _ _ _  _ _ _</p>
<table width="100%" border="0">
  <tr>
      <td width="33%"><b class="texto3"><strong>C. <?php echo $nombre ?>.</strong></b><br>
          <b class="texto">CUENTA: 08-R-005373</b><br>
          <b class="texto">ENTREGA dd/mm/aaaa:</b>
      </td>
      <td width="33%"><p align="center" class="texto2">VALE</p></td>
    <td width="33%"><p align="right"><img src="css/images/logos/{{$logo}}" width="60" height="60"></p></td>
  </tr>
</table>
<hr align="left" color="#000000" width="250">


<p class="texto" align="justify">
  <strong>La Autoridad Municipal, en apoyo al contribuyente, brinda un plazo de 5 días hábiles para efectuar el pago correspondiente; al presentar este vale en caja usted recibirá la CONDENACION DEL 100% en MULTAS y GASTOS DE EJECUCION, además de un DESCUENTO DEL <?php echo $des_recargo ?>% sobre los RECARGOS, Pagando solamente Usted:</p>

  <p align="right">TOTAL A PAGAR: $732.00</p>
  <br>
  <p align="center" class="texto2">¡ACTUALIZATE!</p><br/>

<p class="texto" align="center"><strong>¡ESTE VALE SE HACE EXTENSIVO PARA TODOS SUS PREDIOS! Si usted ya realizo sus pagos, hace caso omiso de esta Invitación.</strong>.

    </body>
</html>