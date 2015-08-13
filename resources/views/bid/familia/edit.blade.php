@extends('layout')
@if (!Auth::guest())

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">

                        <div class="panel-heading">Editar datos de la familia con folio: <strong>{{$familia->folio}} -  {{$familia->direccion_completa}}</strong></div>
                        <div class="panel-body">
                            @include('bid.familia.partials.messages')
                            {!! Form::model($familia, ['route' => ['bid.familias.update', $familia->id], 'method' => 'PUT', 'id' => 'edicionFamilias']) !!}
                            @include('bid.familia.partials.fields')
                            <div class="col-md-12 col-md-offset-4">
                                <div class="row">
                                    {!! Form::submit('Actualizar familia',['class' => 'btn btn-info']) !!}
                                    <a href={{ route('bid.familias.index') }} class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                            {!! form::close() !!}
                        </div>
                    </div>
                    @include('bid.familia.partials.delete')
                </div>
            </div>
        </div>
    @endsection

@else
    <p class="alert alert-danger">Ud. no esta autorizado para usar esta función</p>
@endif

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var frmvalidator = new Validator("edicionFamilias");  //where myform is the name/id of your form
            frmvalidator.addValidation("folio", "req", "Por favor ingrese el número de FOLIO");
            frmvalidator.addValidation("direccion", "req", "Por favor ingrese la DIRECCION");
            frmvalidator.addValidation("direccion", "maxlen=100", "Se permiten 100 caracteres como máximo en la dirección");
            frmvalidator.addValidation("numero_puerta", "maxlen=6", "Se permiten 6 caracteres como máximo en Número de puerta");
            frmvalidator.addValidation("numero_puerta", "req", "Por favor ingrese el NUMERO DE PUERTA o ingrese cero");
            frmvalidator.addValidation("nombre_jefe_hogar", "maxlen=100", "Se permiten 100 caracteres como máximo en el nombre del jefe de hogar");
            frmvalidator.addValidation("nombre_jefe_hogar", "req", "Por favor ingrese el nombre del/la jefe de hogar");
            frmvalidator.addValidation("telefono", "req", "Por favor ingrese el TELEFONO o ingrese cero");
            frmvalidator.addValidation("latitud", "req", "Por favor ingrese la LATITUD o ingrese 0.0");
            frmvalidator.addValidation("longitud", "req", "Por favor ingrese la LONGITUD o ingrese 0.0");
            frmvalidator.addValidation("altura", "req", "Por favor ingrese la ALTURA o ingrese 0");
            frmvalidator.addValidation("facilitador_id", "req", "Por favor seleccione un valor para FACILITADOR");
            frmvalidator.addValidation("distrito_id", "req", "Por favor seleccione un valor para DISTRITO");
            frmvalidator.addValidation("urbanizacion_id", "req", "Por favor seleccione un valor para URBANIZACION");
            frmvalidator.addValidation("via_id", "req", "Por favor seleccione un valor para TIPO DE VIA");
            frmvalidator.addValidation("alcantarillado_id", "req", "Por favor seleccione un valor para ESTADO DE ALCANTARILLADO");
        });
    </script>
@endpush


