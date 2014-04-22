<?php

class PeriodoContable extends Eloquent {	
	protected $guarded = array();

	public $timestamps = false;
	protected $table ='CON_PeriodoContable';
	protected $primaryKey='CON_PeriodoContable_ID';
	protected $fillable = array(
		'CON_PeriodoContable_Nombre',
		'CON_PeriodoContable_FechaInicio',
		'CON_PeriodoContable_FechaFinal',
		'CON_ClasificacionPeriodo_CON_ClasificacionPeriodo_ID'
		);
	public static $rules = array(
			//'CON_PeriodoContable_ID' => 'required|integer',
			'CON_PeriodoContable_Nombre' => 'required|max:45|alpha_spaces',
			'CON_PeriodoContable_FechaInicio' => 'required|date_format:yyyy-mm-dd',
			'CON_PeriodoContable_FechaFinal' => 'required|date_format:yyyy-mm-dd'

		);

	public function CON_ClasificacionPeriodo()
    {
        return $this->belongsTo('ClasificacionPeriodo');
    }
}
