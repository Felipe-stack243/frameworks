<script setup>
</script>
<template>
    <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                    <li class="breadcrumb-item active">Gestión de docentes</li>
                </ol>
            </div>
            <h4 class="page-title">Gestión de docentes</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card-box">
            <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-horizontal"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item" data-toggle="modal" data-target="#dlgAgregarDocente">Agregar nuevo docente</a>
                </div>
            </div>

            <h4 class="header-title mb-3">Registros</h4>

            <div class="table-responsive">
                <table class="table table-centered table-borderless table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-top-0">No.</th>
                            <th class="border-top-0">Nombre</th>
                            <th class="border-top-0">Primer apellido</th>
                            <th class="border-top-0">Segundo apellido</th>
                            <th class="border-top-0">Estatus</th>
                            <th class="border-top-0">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(docente, index) in docentes" :key="docente.idDocente">
                            <td>{{ index + 1 }}</td>
                            <td>{{ docente.nombre }}</td>
                            <td>{{ docente.primApellido }}</td>
                            <td>{{ docente.segApellido }}</td>
                            <td>
                                <span v-if="docente.estatus === 0" class="badge badge-light-danger badge-pill font-13">INACTIVO</span>
                                <span v-else class="badge badge-light-success badge-pill font-13">ACTIVO</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-xs btn-success btn-rounded" 
                                        :data-idDocente="docente.idDocente" 
                                        :data-nombre="docente.nombre"
                                        :data-primApellido="docente.primApellido" 
                                        :data-segApellido="docente.segApellido" 
                                        @click="editarDocente(docente)"
                                        data-toggle="modal" data-target="#dlgEditarDocente">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                                <button v-if="docente.estatus === 0" type="button" class="btn btn-xs btn-warning btn-rounded" 
                                        :data-idDocente="docente.idDocente" 
                                        :data-docente="docente.nombre + ' ' + docente.primApellido + ' ' + docente.segApellido" 
                                        @click="activarDocente(docente)">
                                    <i class="mdi mdi-key"></i>
                                </button>
                                <button v-else type="button" class="btn btn-xs btn-danger btn-rounded" 
                                        :data-idDocente="docente.idDocente" 
                                        :data-docente="docente.nombre + ' ' + docente.primApellido + ' ' + docente.segApellido" 
                                        @click="suspenderDocente(docente)">
                                    <i class="mdi mdi-lock"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- MODAL PARA REGISTRAR DOCENTE -->
            <div id="dlgAgregarDocente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar nuevo docente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body p-3">
                            <form @submit.prevent="guardarDocente">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Nombre</label>
                                            <input type="text" class="form-control" v-model="nuevoDocente.nombre" placeholder="Ingresa el nombre" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-2" class="control-label">Primero apellido</label>
                                            <input type="text" class="form-control" v-model="nuevoDocente.primApellido" placeholder="Ingresa el primer apellido" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-2" class="control-label">Segundo apellido</label>
                                            <input type="text" class="form-control" v-model="nuevoDocente.segApellido" placeholder="Ingresa el segundo apellido" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL PARA EDITAR DOCENTE -->
            <div id="dlgEditarDocente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar docente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body p-3">
                            <form @submit.prevent="modificarDocente">
                                <input type="hidden" v-model="docenteEdicion.idDocente">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Nombre</label>
                                            <input type="text" class="form-control" v-model="docenteEdicion.nombre" placeholder="Ingresa el nombre" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-2" class="control-label">Primero apellido</label>
                                            <input type="text" class="form-control" v-model="docenteEdicion.primApellido" placeholder="Ingresa el primer apellido" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-2" class="control-label">Segundo apellido</label>
                                            <input type="text" class="form-control" v-model="docenteEdicion.segApellido" placeholder="Ingresa el segundo apellido" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>