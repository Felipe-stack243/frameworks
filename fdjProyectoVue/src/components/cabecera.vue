<script setup>
</script>
<template>
    <div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a v-if="idUsuario" class="navbar-toggle nav-link">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="vistas/assets/images/users/sin-foto.png" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        <span v-if="idUsuario">{{ nombreUsuario }}</span>
                        <span v-else>Acceso</span>
                        <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <div v-if="idUsuario" class="dropdown-item noti-title">
                        <h5 class="m-0">
                            ¡Bienvenido!
                        </h5>
                    </div>
                    <a v-if="idUsuario" href="salir" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Cerrar sesión</span>
                    </a>
                    <a v-else href="login" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Iniciar sesión</span>
                    </a>
                </div>
            </li>
        </ul>
    
        <!-- LOGO -->
        <div class="logo-box">
            <a :href="idUsuario ? 'inicio' : 'laboratorios'" class="logo text-center">
                <span class="logo-lg">
                    <img src="vistas/assets/images/tecnm-logo.png" alt="" height="45">
                    <img src="vistas/assets/images/itorizaba-logo.png" alt="" class="mx-2" height="45">
                </span>
                <span class="logo-sm">
                    <img src="vistas/assets/images/tecnm-logo-sm.png" alt="" height="45">
                    <img src="vistas/assets/images/itorizaba-logo.png" alt="" class="mx-2" height="45">
                </span>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</template>