@extends('layouts.sidebaradmin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Usuarios</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('usuarios.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Nuevo Usuario
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow border-0 mt-4">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h3 class="card-title m-0 text-white">Listado de Usuarios</h3>
            </div>
            <div class="card-body">
                <table id="usuariosTable" class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    <span class="badge badge-info">
                                        {{ $usuario->role->nombre ?? 'Sin Rol' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if($usuario->estado == 'activo')
                                        <span class="badge badge-success">Activo</span>
                                    @else
                                        <span class="badge badge-secondary">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button"
                                        class="btn btn-success btn-sm editbtn d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editar"
                                        data-id="{{ $usuario->id }}"
                                        data-name="{{ $usuario->name }}"
                                        data-email="{{ $usuario->email }}"
                                        data-role="{{ $usuario->role_id }}"
                                        data-estado="{{ $usuario->estado }}"
                                        style="width:35px; height:35px; border-radius:8px;">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn" data-id="{{ $usuario->id }}"
                                        data-bs-toggle="modal" data-bs-target="#eliminar">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($usuarios->isNotEmpty())
                    <!-- Modal de Edición -->
                    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="formEditar" action="{{ route('usuarios.update', $usuarios->first()->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarLabel">Editar Usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="edit-id">
                                        <div class="mb-3">
                                            <label for="edit-name" class="form-label">Usuario</label>
                                            <input type="text" class="form-control" id="edit-name" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit-email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="edit-email" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit-role" class="form-label">Rol</label>
                                            <select class="form-control" id="edit-role" name="role" required>
                                                <option value="">Seleccionar</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit-estado" class="form-label">Estado</label>
                                            <select class="form-control" id="edit-estado" name="estado" required>
                                                <option value="">Seleccionar</option>
                                                <option value="activo">Activo</option>
                                                <option value="inactivo">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de Confirmación de Eliminación -->
                    <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="formEliminar" action="{{ route('usuarios.destroy', $usuarios->first()->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="eliminarLabel">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Está seguro de que desea eliminar este Usuario?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('js')
    <!-- DataTables & Plugins -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>

    <script>
        $(function () {
            $("#usuariosTable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                }
            }).buttons().container().appendTo('#usuariosTable_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.editbtn').forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    document.getElementById('formEditar').action = `/usuarios/${id}`;
                    document.getElementById('edit-id').value = id;
                    document.getElementById('edit-name').value = this.getAttribute('data-name');
                    document.getElementById('edit-email').value = this.getAttribute('data-email');
                    document.getElementById('edit-role').value = this.getAttribute('data-role');
                    document.getElementById('edit-estado').value = this.getAttribute('data-estado');
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.deletebtn').forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    document.getElementById('formEliminar').action = `/usuarios/${id}`;
                });
            });
        });
    </script>
@endsection
