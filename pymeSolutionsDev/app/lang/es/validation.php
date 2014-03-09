<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => "El :attribute debe ser aceptado.",
    "accepted"         => "The :attribute must be accepted.",
    "active_url"       => "El :attribute no es un URL válido.",
    "active_url"       => "The :attribute is not a valid URL.",
    "after"            => "El :attribute debe ser una fecha luego de :date.",
    "after"            => "The :attribute must be a date after :date.",
    "alpha"            => "El :attribute puede sólo contener letras.",
    "alpha"            => "El :attribute may only contain letters.",
    "alpha_dash"       => "El :attribute puede contener letras, números y guiones solamente.",
    "alpha_dash"       => "The :attribute may only contain letters, numbers, and dashes.",
    "alpha_num"        => "El :attribute puede contener sólo letras y números.",
    "alpha_num"        => "The :attribute may only contain letters and numbers.",
    "array"            => "El :attribute debe ser un arreglo.",
    "array"            => "The :attribute must be an array.",
    "before"           => "El :attribute debe ser una fecha antes de :date.",
    "before"           => "The :attribute must be a date before :date.",
    "between"          => array(
    "between"          => array(
        "numeric" => "El :attribute debe estar entre :min y :max.",
        "numeric" => "The :attribute must be between :min and :max.",
        "file"    => "El :attribute tener entre :min y :max kilobytes.",
        "file"    => "The :attribute must be between :min and :max kilobytes.",
        "string"  => "El :attribute debe tener entre :min y :max characters.",
        "string"  => "The :attribute must be between :min and :max characters.",
        "array"   => "El :attribute debe tener entre :min and :max objetos.",
        "array"   => "The :attribute must have between :min and :max items.",
    ),
    ),
    "confirmed"        => "La confirmación de :attribute no coincide.",
    "confirmed"        => "The :attribute confirmation does not match.",
    "date"             => "El :attribute no es una fecha válida.",
    "date"             => "The :attribute is not a valid date.",
    "date_format"      => "El :attribute no coincide con el formato :format.",
    "date_format"      => "The :attribute does not match the format :format.",
    "different"        => "El :attribute y :other deben ser diferentes.",
    "different"        => "The :attribute and :other must be different.",
    "digits"           => "El :attribute debe tener :digits dígitos.",
    "digits"           => "The :attribute must be :digits digits.",
    "digits_between"   => "El :attribute debe tener entre :min y :max dígitos.",
    "digits_between"   => "The :attribute must be between :min and :max digits.",
    "email"            => "El formato de :attribute es inválido.",
    "email"            => "The :attribute format is invalid.",
    "exists"           => "El :attribute seleccionado es inválido.",
    "exists"           => "The selected :attribute is invalid.",
    "image"            => "El :attribute debe ser una imagen.",
    "image"            => "The :attribute must be an image.",
    "in"               => "El :attribute seleccionado es inválido.",
    "in"               => "The selected :attribute is invalid.",
    "integer"          => "El :attribute debe ser un entero.",
    "integer"          => "The :attribute must be an integer.",
    "ip"               => "El :attribute debe ser una IP válida.",
    "ip"               => "The :attribute must be a valid IP address.",
    "max"              => array(
    "max"              => array(
        "numeric" => "El :attribute no puede ser mayor a :max.",
        "numeric" => "The :attribute may not be greater than :max.",
        "file"    => "El :attribute no puede ser más grande de :max kilobytes.",
        "file"    => "The :attribute may not be greater than :max kilobytes.",
        "string"  => "El :attribute no puede ser más grande de :max characters.",
        "string"  => "The :attribute may not be greater than :max characters.",
        "array"   => "El :attribute no puede tener más de :max objetos.",
        "array"   => "The :attribute may not have more than :max items.",
    ),
    ),
    "mimes"            => "El :attribute debe ser un archivo de tipo: :values.",
    "mimes"            => "The :attribute must be a file of type: :values.",
    "min"              => array(
    "min"              => array(
        "numeric" => "El :attribute debe ser al menos :min.",
        "numeric" => "The :attribute must be at least :min.",
        "file"    => "El :attribute debe tener al menos :min kilobytes.",
        "file"    => "The :attribute must be at least :min kilobytes.",
        "string"  => "El :attribute debe tener al menos :min characters.",
        "string"  => "The :attribute must be at least :min characters.",
        "array"   => "El :attribute debe tener al menos :min objetos.",
        "array"   => "The :attribute must have at least :min items.",
    ),
    ),
    "not_in"           => "El :attribute seleccionado es inválido.",
    "not_in"           => "The selected :attribute is invalid.",
    "numeric"          => "El :attribute debe ser un número.",
    "numeric"          => "The :attribute must be a number.",
    "regex"            => "El formato de :attribute es inválido.",
    "regex"            => "The :attribute format is invalid.",
    "required"         => "El :attribute es requerido.",
    "required"         => "The :attribute field is required.",
    "required_if"      => "El :attribute es requerido cuando :other es :value.",
    "required_if"      => "The :attribute field is required when :other is :value.",
    "required_with"    => "El :attribute es requerido cuando :values está presente.",
    "required_with"    => "The :attribute field is required when :values is present.",
    "required_without" => "El :attribute es requerido cuando :values no está presente.",
    "required_without" => "The :attribute field is required when :values is not present.",
    "same"             => "El :attribute y :other deben coincidir.",
    "same"             => "The :attribute and :other must match.",
    "size"             => array(
    "size"             => array(
        "numeric" => "El :attribute debe ser :size.",
        "numeric" => "The :attribute must be :size.",
        "file"    => "El :attribute debe tener :size kilobytes.",
        "file"    => "The :attribute must be :size kilobytes.",
        "string"  => "El :attribute debe tener :size caracteres.",
        "string"  => "The :attribute must be :size characters.",
        "array"   => "El :attribute debe contener :size objetos.",
        "array"   => "The :attribute must contain :size items.",
    ),
    ),
    "unique"           => "El :attribute ya ha sido utilizado.",
    "unique"           => "The :attribute has already been taken.",
    "url"              => "El formato de :attribute es inválido.",
    "url"              => "The :attribute format is invalid.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => array(),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(),

);
