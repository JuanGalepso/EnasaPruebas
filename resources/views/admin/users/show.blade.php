@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Datos')

@section('content')
    <div class="container">
        <section class="content card card-primary">
            <div class="row">
                <div class="col-md-12">
                    <div class="card my-2 mx-3 px-3 py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="col-blue mt-3" style="font-size: 22px;">
                                    <i class="far fa-id-card font-25 col-blue"></i> Datos del usuario 
                                    <small class="" style="font-size: 22px;"> {{ $user->display_name }}</small>
                                </p>
                            </div>             
                            <div class="col-md-4">
                                <div class="btn-group float-right mt-2">
                                    @can('VerUsuario')
                                    <a href="{{ url('users') }}" class="btn blue darken-4 text-white "><i class="mdi mdi-sort-alphabetical-ascending"></i> Listado</a>
                                        @endcan
                                    @can('EditarUsuario')
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn blue darken-4 text-white"><i class="fa fa-edit"></i> Editar</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row invoice-info">
                    <div class="col-sm-3 invoice-col">
                        <strong>Nombre</strong><br>
                        {{ $user->display_name }}
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong>Correo electrónico</strong>
                        <br>
                        {{ $user->email }}
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong>Estatus</strong><br>
                        <span
                            class="badge text-white {{ $user->status ? 'green' : 'red' }}">{{ $user->display_status }}</span>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong>Tipo de usuario</strong><br>
                        {{ $user->hasrole('Administrador') ? 'Administrador' : 'Usuario' }}
                    </div>
                </div>
                <br>
                <div class="row invoice-info">
                    <div class="col-sm-3 invoice-col">
                        <strong>Contraseña</strong><br>
                        ********
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong>Creado</strong>
                        <br>
                        {{ $user->created_at }}
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <strong>Actualizado</strong><br>
                        {{ $user->updated_at }}
                    </div>

                </div>
                <br>
                <div class="row invoice-info">
                    <div class="col-sm-9 invoice-col">
                        <strong>Permisos del usuario</strong><br><br>
                        @foreach ($user->getAllPermissions() as $permission)
                            <span class="badge">{{ trans('permission.' . $permission->name) }}</span>&nbsp;&nbsp;
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
