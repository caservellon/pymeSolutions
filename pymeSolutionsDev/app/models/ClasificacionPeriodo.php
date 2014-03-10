<?php

class ClasificacionPeriodo extends Eloquent {	
	protected $guarded = array();

	public $timestamps = false;
	protected $table ='CON_ClasificacionPeriodo';
	protected $primaryKey='CON_ClasificacionPeriodo_ID';
	protected $fillable = array('CON_ClasificacionPeriodo_Nombre','CON_ClasificacionPeriodo_CatidadDias');

	public static $rules = array(
			//'CON_ClasificacionPeriodo_ID' => 'required|integer',
			'CON_ClasificacionPeriodo_Nombre' => 'required|max:45|alpha',
			'CON_ClasificacionPeriodo_CatidadDias' => 'required|integer|max:366',
			'CON_PeriodoContable_FechaInicio' => 'required|date_format:Y-m-d'


		);
	public static $messages = array('required' =>'El campo :attribute es requerido' , ); 

	public static $atributos = array(
		'CON_ClasificacionPeriodo_Nombre' => 'Nombre',
		'CON_ClasificacionPeriodo_CatidadDias' => 'Cantidad de dias',
		'CON_PeriodoContable_FechaInicio' => 'Fecha de Inicio',
		'CON_PeriodoContable_FechaFinal' => 'Fecha final'

	);

	public function CON_PeriodoContable()
    {
        return $this->hasMany('PeriodoContable');
    }

}
