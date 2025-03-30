<script setup>
</script>

<template>
    <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                    <li class="breadcrumb-item active">control de laboratorios</li>
                </ol>
            </div>
            <h4 class="page-title">Control de laboratorios</h4>
        </div>
    </div>
</div>

<input type="hidden" name="hidIdUsuario" id="hidIdUsuario" :value="idUsuario">

<div class="row">
    <div v-for="laboratorio in laboratorios" :key="laboratorio.idLaboratorio">
        <div v-if="laboratorio.idLaboratorioEstatus === 1" class="col-lg-4">
            <div class="card text-secondary bg-white text-xs-center">
                <div class="card-body">
                    <!-- Menú de acciones para el laboratorio -->
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(20px, 21px, 0px);">
                            <a href="javascript:void(0);" @click="ocuparLaboratorio(laboratorio.idLaboratorio)" class="dropdown-item" data-toggle="modal" data-target="#dlgProfesores">Ocupar este laboratorio</a>
                            <a href="javascript:void(0);" @click="colocarEnTransito(laboratorio.idLaboratorio, laboratorio.alias)" class="dropdown-item">Colocar en transito</a>
                            <template v-if="idUsuarioRol === 1 || idUsuarioRol === 2">
                                <a href="javascript:void(0);" @click="colocarEnMantenimiento(laboratorio.idLaboratorio, laboratorio.alias)" class="dropdown-item">Colocar en mantenimiento</a>
                            </template>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-sm bg-light rounded-circle d-flex align-items-center justify-content-center p-4 m-auto">
                                <h3 class="card-title m-0 text-secondary">{{ laboratorio.alias }}</h3>
                            </div>
                        </div>
                        <div class="col-8 d-flex flex-column align-items-start justify-content-center">
                            <h5 class="text-secondary">{{ laboratorio.laboratorio }}</h5>
                            <small class="badge badge-secondary font-12">{{ laboratorio.estatus }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-else-if="laboratorio.idLaboratorioEstatus === 2" class="col-lg-4">
            <div class="card text-primary bg-white text-xs-center">
                <div class="card-body">
                    <!-- Menú de acciones para el laboratorio -->
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(20px, 21px, 0px);">
                            <a href="javascript:void(0);" @click="colocarEnTransito(laboratorio.idLaboratorio, laboratorio.alias)" class="dropdown-item">Colocar en transito</a>
                            <a href="javascript:void(0);" @click="desocuparLaboratorio(laboratorio.idLaboratorio, laboratorio.alias)" class="dropdown-item">Desocupar laboratorio</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-sm bg-light rounded-circle d-flex align-items-center justify-content-center p-4 m-auto">
                                <h3 class="card-title m-0 text-primary">{{ laboratorio.alias }}</h3>
                            </div>
                        </div>
                        <div class="col-8 d-flex flex-column align-items-start justify-content-center">
                            <h5 class="text-primary">{{ laboratorio.laboratorio }}</h5>
                            <small class="badge badge-light-primary font-12">{{ laboratorio.estatus }}</small>
                            <p class="card-text mt-1">Profesor: {{ laboratorio.docente }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-else-if="laboratorio.idLaboratorioEstatus === 3" class="col-lg-4">
            <div class="card text-warning bg-white text-xs-center">
                <div class="card-body">
                    <!-- Menú de acciones para el laboratorio -->
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(20px, 21px, 0px);">
                            <a href="javascript:void(0);" @click="desocuparLaboratorio(laboratorio.idLaboratorio, laboratorio.alias)" class="dropdown-item">Desocupar laboratorio</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-sm rounded-circle d-flex align-items-center justify-content-center p-4 m-auto" style="background-color: rgba(248, 204, 107, .2);">
                                <h3 class="card-title m-0 text-warning">{{ laboratorio.alias }}</h3>
                            </div>
                        </div>
                        <div class="col-8 d-flex flex-column align-items-start justify-content-center">
                            <h5 class="text-warning">{{ laboratorio.laboratorio }}</h5>
                            <small class="badge badge-light-warning font-12">{{ laboratorio.estatus }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-else-if="laboratorio.idLaboratorioEstatus === 4" class="col-lg-4">
            <div class="card text-danger bg-white text-xs-center">
                <div class="card-body">
                    <!-- Menú de acciones para el laboratorio -->
                    <template v-if="idUsuarioRol === 1 || idUsuarioRol === 2">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(20px, 21px, 0px);">
                                <a href="javascript:void(0);" @click="habilitarLaboratorio(laboratorio.idLaboratorio, laboratorio.alias)" class="dropdown-item">Habilitar laboratorio</a>
                            </div>
                        </div>
                    </template>

                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-sm rounded-circle d-flex align-items-center justify-content-center p-4 m-auto" style="background-color: rgba(240, 100, 59, .2)">
                                <h3 class="card-title m-0 text-danger">{{ laboratorio.alias }}</h3>
                            </div>
                        </div>
                        <div class="col-8 d-flex flex-column align-items-start justify-content-center">
                            <h5 class="text-danger">{{ laboratorio.laboratorio }}</h5>
                            <small class="badge badge-light-danger font-12">{{ laboratorio.estatus }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PARA SELECCIONAR PROFESOR -->
    <div class="modal fade" id="dlgProfesores" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miTitulo">Selecciona un profesor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="hidIdLaboratorio" id="hidIdLaboratorio" :value="idLaboratorioSeleccionado">
                            <select class="form-control" v-model="idProfesorSeleccionado">
                                <option value="-1">Seleccionar</option>
                                <option v-for="docente in docentes" :key="docente.idDocente" :value="docente.idDocente">
                                    {{ docente.nombre }} {{ docente.primApellido }} {{ docente.segApellido }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" @click="ocuparLaboratorioConProfesor">Continuar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped>
</style>