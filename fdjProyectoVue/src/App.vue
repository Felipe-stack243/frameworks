<script setup>
    import { RouterLink, RouterView } from 'vue-router';
    import { ref, watchEffect, onMounted, triggerRef } from 'vue';

    // Estado activo de la sesión:
    // Definir la sesión como un `ref()`
    const sesion = ref({
        accesoValido  : false,
        idUsuario     : null,
        nombreUsuario : null,
        correo        : null,
        telefono      : null,
        usuario       : null,
        password      : null,
        idUsuarioRol  : null,
        rol           : null,
        estatus       : null
    });

    // Función para verificar sesión
    const verificarSesion = async () => {
        try {
            const response = await fetch('http://localhost/frameworks/fdjProyectoVue/backend/fetch/validarSesion.fetch.php', {
                credentials: 'include'  // Para que incluya las cookies de sesión
            });

            const datosSesion = await response.json();

            // Actualizar el estado de la variable 'sesion'
            sesion.value = { ...datosSesion };

            triggerRef(sesion);
        } 
        
        catch (error) {
            console.error("Error al verificar la sesión:", error);
        }
    };

    onMounted(verificarSesion);

    // watchEffect para reaccionar a cambios en sesión
    watchEffect(() => {
        console.log("Estado de sesión actualizado:", sesion.accesoValido);
    });
</script>

<template>
    <header id="topnav">
        <!-- Barra superior -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <!-- Aquí debes de validar que si no existe una sesion activa, no muestres las líneas del menu -->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="/assets/images/users/sin-foto.png" alt="user-image" class="rounded-circle">
                            
                            <!-- En esta etiqueta debes de validar que si no hay sesion activa muestres acceso y si la hay muestres el nombre de usuario -->
                            <span class="pro-user-name ml-1">
                                Acceso
                                <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    ¡Bienvenido!
                                </h5>
                            </div>

                            <!-- Si hay sesion activa, entonces digo que el usuario puede cerrar sesión -->
                            <router-link v-if="sesion.accesoValido" to="" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Cerrar sesión</span>
                            </router-link>

                            <!-- Si no hay una sesión activa entonces deberá acceder al formulario de login -->
                            <router-link v-else to="login" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Iniciar sesión</span>
                            </router-link>
                        </div>
                    </li>
                </ul>
            
                <!-- LOGO -->
                <div class="logo-box">
                    <router-link to="inicio" class="logo text-center">
                        <span class="logo-lg">
                            <img src="/assets/images/tecnm-logo.png" alt="" height="45">
                            <img src="/assets/images/itorizaba-logo.png" alt="" class="mx-2" height="45">
                        </span>
                        <span class="logo-sm">
                            <img src="/assets/images/tecnm-logo-sm.png" alt="" height="45">
                            <img src="/assets/images/itorizaba-logo.png" alt="" class="mx-2" height="45">
                        </span>
                    </router-link>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        
        <!-- Menú de opciones -->
        <div v-if="sesion.accesoValido" class="topbar-menu">
            <div class="container-fluid">
                <div id="navigation">
                    <ul class="navigation-menu">
                        <li class="has-submenu">
                            <a href="javascript:void(0);">
                                <i class="fe-clipboard"></i> Control <div class="arrow-down"></div>
                            </a>
                            <ul class="submenu">
                                <li><router-link to="">Control de laboratorios</router-link></li>
                            </ul>
                        </li>
    
                        <li class="has-submenu">
                            <a href="javascript:void(0);">
                                <i class="fe-users"></i> Personal <div class="arrow-down"></div>
                            </a>
                            <ul class="submenu">
                                <li><router-link to="">Gestión de docentes</router-link></li>
                            </ul>
                        </li>
                    </ul>
            
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </header>

    <!-- CONTENIDO -->
    <div class="wrapper" v-bind:class="sesion.accesoValido ? '' : 'pt-5'">
        <div class="container-fluid">
            <router-view></router-view>
        </div> 
    </div>
</template>

<style scoped>
</style>