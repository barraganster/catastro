<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActualizarPrediosStatus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$existe = DB::select("select proname,pg_get_function_arguments(oid) from pg_proc where proname ='sp_get_predios_status'");
                if(count($existe) > 0) {

                	DB::statement("DROP FUNCTION sp_get_predios_status(p_clave text, p_nombre_propietario text, p_id_municipio text, p_id_estatus text)");
									}
	$predios= <<<FinSP
CREATE OR REPLACE FUNCTION sp_get_predios_status (
	IN p_clave TEXT,
	IN p_nombre_propietario TEXT,
	IN p_id_municipio TEXT,
	IN p_id_estatus TEXT
)
RETURNS TABLE (clave VARCHAR, propietario TEXT, municipio VARCHAR, cve_status VARCHAR, des_status VARCHAR , id_requerimiento INTEGER, f_requerimiento TEXT, f_termino TEXT, f_cancelacion TEXT) 
AS
$$
DECLARE
	v_consulta	TEXT;
BEGIN
	v_consulta := '
		  SELECT pf.clave  clave
				 , sp_get_propietarios(pf.clave) propietario
				 , cm.nombre_municipio municipio
				 , cs.cve_status
				 , cs.descrip des_status
				 , rq.id_requerimiento
				 , to_char(rq.f_requerimiento,''DD/MM/YYYY'') f_requerimiento
				 , to_char(rq.f_requerimiento + cs.dias_vigencia,''DD/MM/YYYY'') f_termino
				 , to_char(ef.f_cancelacion,''DD/MM/YYYY'') f_cancelacion
			FROM ((((fiscal pf JOIN ejecucion_fiscal ef ON (pf.clave = ef.clave))
					 JOIN requerimientos rq on (ef.id_ejecucion_fiscal = rq.id_ejecucion_fiscal))
					 JOIN cat_status cs ON (ef.cve_status = cs.cve_status))
				   LEFT JOIN municipios cm ON (substr(pf.clave,4,3) = cm.municipio))
		 WHERE ef.cve_status = rq.cve_status ';

	IF p_clave <> '' THEN
		v_consulta := v_consulta|| ' AND pf.clave = '''||p_clave||'''';
	END IF;

	IF p_id_municipio <> '' THEN
		v_consulta := v_consulta|| 'AND  cm.municipio = '''||p_id_municipio||'''';
	END IF;

	IF p_id_estatus <> '' THEN
		v_consulta := v_consulta|| 'AND  cs.cve_status = '''||p_id_estatus||'''';
	END IF;

  IF p_nombre_propietario <> '' THEN
		v_consulta := v_consulta  ||' AND pf.clave IN (SELECT pp.clave
																										 FROM propietarios pp
																											  , personas pr
																									  WHERE pp.id_propietario = pr.id_p
																										  AND pr.nombrec
																													LIKE ''%''||UPPER('''||p_nombre_propietario||''')||''%'')';

	END IF;

	v_consulta := v_consulta ||' LIMIT 100';

	RETURN QUERY EXECUTE v_consulta;

END;
$$
LANGUAGE 'plpgsql' VOLATILE;
FinSP;
DB::connection()->getPdo()->exec($predios);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
