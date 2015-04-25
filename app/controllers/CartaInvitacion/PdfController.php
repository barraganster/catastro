<?php
//--Controlador para generar carta invitacion
setlocale(LC_MONETARY, 'es_MX');

class CartaInvitacion_PdfController extends BaseController {

public function get_pdf()
    {
      //creamos array de todas las claves enviadas para generar carta invitacióm
       $clave = Input::all();
    print_r($clave);
        //limpiamos y ordenamos el array
        $token      = $clave['_token'];
        $fecha      = $clave['date'];
        $boton      = $clave['boton'];
        $mun_actual = strtoupper($clave['mun']);
        $pagi       =$clave['pagi'];
        $id_mun     =$clave['id_municipio'];

        if(array_key_exists('checktodos', $clave))
        {
          unset($clave['checktodos']);
        }


        unset($clave['id_municipio']);
        unset($clave['pagi']);
        unset($clave['mun']);
        unset($clave['boton']);
        unset($clave['_token']);
        unset($clave['date']);
            //BUCLE PARA GUARDAR LOS DATOS A LA BASE DE DATOS


       foreach($clave as $cla => $value)
        {

          $cv     =($claves2['captura']['clave']=$value);
          $cv     = str_replace('(', '',$cv);
          $vale[] = $cv;
          $fecha  =($claves2['captura']['fecha']=$fecha);

          foreach ($vale as $clave ) 
            {
                $claves=$clave[0];
                $verificacion = ejecucion::where('clave',$claves)->pluck('clave');
                 //echo $resul=$verificacion;
                  if($verificacion=='')
                  {
                  //insert a la tabla ejecucion_fiscal
                      $ejecucion = new ejecucion;
                      $ejecucion->clave =$claves;
                      $ejecucion->cve_status ='CI';
                      $ejecucion->usuario = Auth::user()->id;
                      $ejecucion->f_alta = date('Y-m-d');
                         //$ejecucion->f_inicio_ejecucion=$fecha;
                      $ejecucion->save();

                      //select a la tabla ejecucion fiscal
                      $id_ejecucion = $ejecucion->id_ejecucion_fiscal;
                      //array de nuevos id_ejecucion para insertar a la tabla requerimientos
                      $data[]= $id_ejecucion;

                      //insert a la tabla requerimientos
                      $requerimiento                      = new requerimientos;
                      $requerimiento->id_ejecucion_fiscal = $id_ejecucion;
                      $requerimiento->cve_status          = 'CI';
                      $requerimiento->f_requerimiento     = $fecha;
                      $requerimiento->usuario             = Auth::user()->id;
                      $requerimiento->f_alta              = date('Y-m-d');
                      $requerimiento->save();
                }
            }
        }

//$valeee=array_push($vale, "2" => "manzana","2" =>  "arándano");
$fechaven = PdfHelper::imprimirpdf($clave);
  echo $fechaven;


   //ENVIO A LA VISTA DEL PDF CARTA INVITACION
 /*$vista = View::make('CartaInvitacion.carta', compact('data', 'fecha', 'nombre_eje', 'mun_actual','vale'));
   $pdf = PDF::load($vista)->show("CartaInvitacion");
   $response = Response::make($pdf, 200);
   $response->header('Content-Type', 'application/pdf');
   return $response;*/
    }


}
