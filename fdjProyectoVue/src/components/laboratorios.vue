<script setup>
    import { ref, onMounted } from 'vue';

    const laboratorios = ref([]);

    // Obtengo los laboratorios:
    const consultaLaboratorios = async () => {
        try {
            const response = await fetch('http://localhost/frameworks/fdjProyectoVue/backend/fetch/laboratorios.fetch.php');
            const data = await response.json();

            laboratorios.value = data;
        } 
        
        catch (error) {
            console.error('Error al obtener los laboratorios desde el servidor:', error);
        }
    };

    onMounted(() => {
        consultaLaboratorios();
    });
</script>

<template>
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
        <div v-for="lab in laboratorios" :key="lab.idLaboratorio" class="col-lg-4">
            <div 
                class="card text-xs-center" 
                :class="{
                    'text-secondary': lab.idLaboratorioEstatus === 1,
                    'text-primary': lab.idLaboratorioEstatus === 2,
                    'text-warning': lab.idLaboratorioEstatus === 3,
                    'text-danger': lab.idLaboratorioEstatus === 4
                }"
            >
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div 
                                class="avatar-sm rounded-circle d-flex align-items-center justify-content-center p-4 m-auto"
                                :style="{
                                    'background-color': lab.idLaboratorioEstatus === 3 ? 'rgba(248, 204, 107, .2)' : 
                                                        lab.idLaboratorioEstatus === 4 ? 'rgba(240, 100, 59, .2)' : '#f1f5f7'
                                }"
                            >
                                <h3 class="card-title m-0" :class="{
                                    'text-secondary': lab.idLaboratorioEstatus === 1,
                                    'text-primary': lab.idLaboratorioEstatus === 2,
                                    'text-warning': lab.idLaboratorioEstatus === 3,
                                    'text-danger': lab.idLaboratorioEstatus === 4
                                }">
                                    {{ lab.alias }}
                                </h3>
                            </div>
                        </div>
                        
                        <div class="col-9 d-flex flex-column align-items-start justify-content-center">
                            <h5 :class="{
                                'text-secondary': lab.idLaboratorioEstatus === 1,
                                'text-primary': lab.idLaboratorioEstatus === 2,
                                'text-warning': lab.idLaboratorioEstatus === 3,
                                'text-danger': lab.idLaboratorioEstatus === 4
                            }">{{ lab.laboratorio }}</h5>
                            
                            <small :class="{
                                'badge badge-secondary': lab.idLaboratorioEstatus === 1,
                                'badge badge-light-primary': lab.idLaboratorioEstatus === 2,
                                'badge badge-light-warning': lab.idLaboratorioEstatus === 3,
                                'badge badge-light-danger': lab.idLaboratorioEstatus === 4
                            }" class="font-12">
                                {{ lab.estatus }}
                            </small>

                            <p v-if="lab.idLaboratorioEstatus === 2" class="card-text mt-1">Profesor: {{ lab.docente }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>