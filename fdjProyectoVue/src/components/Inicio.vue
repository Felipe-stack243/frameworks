<script setup>
    import { useSessionStore } from "@/stores/sessionStore";
    import { onMounted, watch } from "vue";

    const sessionStore = useSessionStore();

    onMounted(() => {
        sessionStore.verificarSesion(); // Verifica la sesión al cargar la app
    });

    watch(() => sessionStore.accesoValido, (nuevoValor) => {
        console.log("Estado de sesión actualizado:", nuevoValor);
    });
</script>

<template>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">inicio</li>
                    </ol>
                </div>
                <h4 class="page-title">Bienvenido de nuevo {{ sessionStore.usuario || "" }} 👋</h4>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>