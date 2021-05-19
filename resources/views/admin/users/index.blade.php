@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')



@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card my-2 mx-3 px-3 py-2">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="mt-2 col-blue font-25"><i class="fas fa-users font-25 col-blue"></i> Listado de usuarios</h3>
                            </div>
                            <div class="col-md-4">
                                <div class="btn-group float-right mt-1">
                                    @can('RegistrarUsuario')
                                        <a href="{{ url('users/create') }}" class="btn blue darken-3 text-white "><i class="fa fa-plus-square"></i> Ingresar</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        
                        <table id="example" class="table table-striped table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre completo</th>
                                    <th>Usuario</th>
                                    <th>Género</th>
                                    <th>Tipo</th>
                                    <th>Correo electrónico</th>
                                    <th>Acceso</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="row{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        @if ($user->genero == 'F')
                                            <td><i class="mdi mdi-human-female fa-3x pink-text"></i></td>
                                        @else
                                            <td><i class="mdi mdi-human-male fa-3x blue-text "></i></td>
                                        @endif
                                        <td>{!! $user->hasRole('Administrador') ? '<b>Administrador</b>' : 'Usuario' !!}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                <span class="badge badge-success">Áctivo</span>
                                            @else
                                                <span class="badge badge-danger">Ináctivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('VerUsuario')
                                                <a class="btn btn-round blue darken-4"
                                                    href="{{ route('admin.users.show', $user) }}"><i
                                                        class="mdi mdi-face text-center" style="color: white;"></i> </a>
                                            @endcan
                                            @can('EditarUsuario')
                                                <a class="btn btn-round blue darken-4"
                                                    href="{{ route('admin.users.edit', $user) }}"><i
                                                        class="mdi mdi-pencil text-center" style="color: white;"></i> </a>
                                            @endcan
                                        </td>
                                        {{-- <td>
                                            @can('EditarRole')
                                                <form class="formulario-eliminar" action="{{ route('admin.users.destroy', $user) }}"
                                                    class="formulario-eliminar" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-round blue darken-4"><i
                                                            class="mdi mdi-trash-can-outline text-center" style="color: white;"></i>
                                                    </button>
                                                </form>
                                            @endcan

                                        </td> --}}
                                    </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    @endsection
