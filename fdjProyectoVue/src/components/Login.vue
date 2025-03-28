<script setup>
    import { ref } from "vue";

    const usuario  = ref("");
    const password = ref("");
    const mensaje  = ref("");

    const validarAcceso = async () => {
        const datos = {
            usuario: usuario.value,
            password: password.value
        };

        try {
            const respuesta = await fetch("http://localhost/EjMascota/php/Registro.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(datos),
            });

            const resultado = await respuesta.json();
            mensaje.value = resultado.mensaje;

            // Limpiar los campos después del registro exitoso
            if (resultado.mensaje != "OK") {
                router.push('/inicio');
            }
        }
        
        catch (error) {
            mensaje.value = "Error de conexión con el servidor";
        }
    };
</script>

<template>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card">
        
                <div class="card-body p-4">
                    <h5 class="auth-title">Iniciar sesión</h5>

                    <form @submit.prevent="validarAcceso">
        
                        <div class="form-group mb-3">
                            <label>Usuario</label>
                            <input class="form-control" type="text" v-model="usuario" required="" autocomplete="off" placeholder="Ingresa tu usuario">
                        </div>
        
                        <div class="form-group mb-3">
                            <label>Contraseña</label>
                            <input class="form-control" type="password" v-model="password" required="" autocomplete="off" placeholder="Ingresa tu contraseña">
                        </div>
        
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-danger btn-block" type="submit"> Iniciar sesión </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>