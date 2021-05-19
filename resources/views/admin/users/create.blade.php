@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Ingresar')
@section('content')

    <section class="container">
        
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card my-2 mx-3 px-3 py-2">
                        <div class="row">
                            <div class="col-md-9">

                                <h3 class=""><i class="fas fa-users font-25 col-blue"></i> Registro de usuarios</h3>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="btn-group float-right">
                                    @can('VerUsuario')
                                        <a href="{{ url('users') }}" class="btn blue darken-4 text-white "><i
                                                class="mdi mdi-sort-alphabetical-ascending"></i> Listado</a>
                                    @endcan
                                    @can('RegistrarUsuario')
                                        <a href="{{ url('users/create') }}" class="btn blue darken-4 text-white "><i
                                                class="fa fa-plus-square"></i> Ingresar</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.users.store', 'autocomplete' => 'off']) !!}
                        <div class="card-body">
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <div class="form-group pading">
                                        <label class="font-weight-bolder font-14" for="name">Nombres<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Nombres" value="{{ old('name') }}">
                                        <input type="hidden" class="form-control"  id="slug"
                                            name="slug" placeholder="slug">
                                        <span class="missing_alert text-danger" id="slug_alert"></span>
                                        @error('name')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <div class="form-group">
                                        <label class="font-weight-bolder font-14" for="lastname">Apellidos<span class="text-danger">*</span></label>
                                        <input class="form-control  @error('lastname') is-invalid @enderror"
                                             id="lastname" name="lastname" placeholder="Apellidos" value="{{ old('lastname') }}">
                                        <span class="missing_alert text-danger" id="last_name_alert"></span>
                                        @error('lastname')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-1 invoice-col">
                                    <div class="form-group">
                                        <label class="font-weight-bolder font-14" for="tipodocumento">Doc.<span class="text-danger">*</span></label>
                                        <input type="" class="form-control"  id="tipodocumento"
                                            name="tipodocumento" placeholder="tipodocumento">
                                        <span class="missing_alert text-danger" id="tipodocumento_alert"></span>
                                    </div>
                                </div>
                                <div class="col-sm-3 invoice-col">
                                    <div class="form-group">
                                        <label class="font-weight-bolder font-14" for="cedula">Cedula<span class="text-danger">*</span></label>
                                        <input class="form-control @error('cedula') is-invalid @enderror"
                                             id="cedula" name="cedula"
                                            placeholder="Cedula" value="{{ old('cedula') }}">
                                        <span class="missing_alert text-danger" id="cedula_alert"></span>
                                        @error('cedula')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-6">
                                    <div class="form-group pading">
                                        <label class="font-weight-bolder font-14" for="username">Usuario<span class="text-danger">*</span></label>
                                        <input class="form-control @error('username') is-invalid @enderror"
                                             id="username" name="username"
                                            placeholder="Ingrese el usuario" value="{{ old('username') }}">
                                        <span class="missing_alert text-danger" id="username"></span>
                                        @error('username')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-weight-bolder font-14" for="email">Correo Electrónico<span class="text-danger">*</span></label>
                                        <input class="form-control @error('email') is-invalid @enderror"
                                             id="email" name="email"
                                            placeholder="Correo electrónico" value="{{ old('email') }}">
                                        <span class="missing_alert text-danger" id="email_alert"></span>
                                        @error('email')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-6">
                                    <div class="form-group pading">
                                        <label class="font-weight-bolder font-14" for="phone">Celular<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                             id="phone" name="phone"
                                            placeholder="Celular" value="{{ old('phone') }}">
                                        <span class="missing_alert text-danger" id="phone"></span>
                                        @error('phone')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-weight-bolder font-14" for="phone2">Telefono</label>
                                        <input type="number" class="form-control @error('phone2') is-invalid @enderror"
                                             id="phone2" name="phone2"
                                            placeholder="Telefono" value="{{ old('phone2') }}">
                                        <span class="missing_alert text-danger" id="phone2_alert"></span>
                                        @error('phone2')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="font-weight-bolder font-14" for="address">Dirección</label>
                                        <textarea name="address" id="address" class="form-control" cols="15" rows="5">{{ old('address') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="font-weight-bolder font-14" for="status">Género<span class="text-danger">*</span></label>
                                        <div class="checkbox icheck">
                                            <label class="font-weight-bolder font-14">
                                                <input type="radio" name="genero" value="M" checked> Masculino&nbsp;&nbsp;
                                                <input type="radio" name="genero" value="F"> Femenino
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="role">Tipo de usuario<span class="text-danger">*</span></label>
                                        <div class="checkbox icheck">
                                            <label class="font-weight-bolder font-14">
                                                <input type="radio" name="role" value="Usuario" checked> Usuario&nbsp;&nbsp;
                                                <input type="radio" name="role" value="Administrador"> Administrador
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="font-weight-bolder font-14" for="status">Acceso al sistema<span class="text-danger">*</span></label>
                                        <div class="checkbox icheck">
                                            <label class="font-weight-bolder font-14">
                                                <input type="radio" name="status" value="1" checked> Activo&nbsp;&nbsp;
                                                <input type="radio" name="status" value="0"> Deshabilitado
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-weight-bolder font-14" for="password">Contraseña<span class="text-danger">*</span></label>
                                        <input type="password" 
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" placeholder="Contraseña">
                                        <span class="missing_alert text-danger" id="password"></span>
                                        @error('password')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="font-weight-bolder font-14" for="password_confirmation">Confirmar
                                            Contraseña<span class="text-danger">*</span></label>
                                        <input type="password" 
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="password_confirmation" name="password_confirmation"
                                            placeholder="Contraseña">
                                        <span class="missing_alert text-danger" id="password_confirmation_alert"></span>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn blue btn-block darken-4 text-white  ajax" id="submit">
                                    <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                                </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin/user/create.js') }}"></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            $("#name, #slug").stringToSlug({
                callback: function(text) {
                    $('#slug').val(text);
                }
            });
        });

    </script>

@endpush
