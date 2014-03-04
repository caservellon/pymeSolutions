<?php

class ClasificacionPeriodo extends Eloquent {	
	protected $guarded = array();

	public $timestamps = false;
	protected $table ='CON_ClasificacionPeriodo';
	protected $primaryKey='CON_ClasificacionPeriodo_ID';

	public static $rules = array(
			//'CON_ClasificacionPeriodo_ID' => 'required|integer',
			'CON_ClasificacionPeriodo_Nombre' => 'required',
			'CON_ClasificacionPeriodo_CatidadDias' => 'required|integer',
			'CON_PeriodoContable_FechaInicio' => 'required',
			'CON_PeriodoContable_FechaFinal' => 'required'

		);

	public function CON_PeriodoContable()
    {
        return $this->hasMany('CON_PeriodoContables');
    }

}
