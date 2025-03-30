<script setup>
</script>
<template>
    <div id="app">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Laboratorios</li>
                    </ol>
                </div>
                <h4 class="page-title">Laboratorios</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div v-for="(laboratorio, index) in laboratorios" :key="index">
            <!-- Condición para el estatus 1 -->
            <div v-if="laboratorio.idLaboratorioEstatus == 1" class="col-lg-4">
                <div class="card text-secondary bg-white text-xs-center">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="avatar-sm bg-light rounded-circle d-flex align-items-center justify-content-center p-4 m-auto">
                                    <h3 class="card-title m-0 text-secondary">{{ laboratorio.alias }}</h3>
                                </div>
                            </div>
                            <div class="col-9 d-flex flex-column align-items-start justify-content-center">
                                <h5 class="text-secondary">{{ laboratorio.laboratorio }}</h5>
                                <small class="badge badge-secondary font-12">{{ laboratorio.estatus }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Condición para el estatus 2 -->
            <div v-else-if="laboratorio.idLaboratorioEstatus == 2" class="col-lg-4">
                <div class="card text-primary bg-white text-xs-center">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="avatar-sm bg-light rounded-circle d-flex align-items-center justify-content-center p-4 m-auto">
                                    <h3 class="card-title m-0 text-primary">{{ laboratorio.alias }}</h3>
                                </div>
                            </div>
                            <div class="col-9 d-flex flex-column align-items-start justify-content-center">
                                <h5 class="text-primary">{{ laboratorio.laboratorio }}</h5>
                                <small class="badge badge-light-primary font-12">{{ laboratorio.estatus }}</small>
                                <p class="card-text mt-1">Profesor: {{ laboratorio.docente }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Condición para el estatus 3 -->
            <div v-else-if="laboratorio.idLaboratorioEstatus == 3" class="col-lg-4">
                <div class="card text-warning bg-white text-xs-center">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="avatar-sm rounded-circle d-flex align-items-center justify-content-center p-4 m-auto" style="background-color: rgba(248, 204, 107, .2);">
                                    <h3 class="card-title m-0 text-warning">{{ laboratorio.alias }}</h3>
                                </div>
                            </div>
                            <div class="col-9 d-flex flex-column align-items-start justify-content-center">
                                <h5 class="text-warning">{{ laboratorio.laboratorio }}</h5>
                                <small class="badge badge-light-warning font-12">{{ laboratorio.estatus }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Condición para el estatus 4 -->
            <div v-else-if="laboratorio.idLaboratorioEstatus == 4" class="col-lg-4">
                <div class="card text-danger bg-white text-xs-center">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="avatar-sm rounded-circle d-flex align-items-center justify-content-center p-4 m-auto" style="background-color: rgba(240, 100, 59, .2)">
                                    <h3 class="card-title m-0 text-danger">{{ laboratorio.alias }}</h3>
                                </div>
                            </div>
                            <div class="col-9 d-flex flex-column align-items-start justify-content-center">
                                <h5 class="text-danger">{{ laboratorio.laboratorio }}</h5>
                                <small class="badge badge-light-danger font-12">{{ laboratorio.estatus }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    new Vue({
        el: '#app',
        data: {
            laboratorios: <?php echo json_encode($laboratorios); ?>
        }
    });
</script>
</template>

