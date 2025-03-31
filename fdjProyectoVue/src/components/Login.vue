<script setup>
    import { ref } from "vue";
    import { useRouter } from "vue-router";

    const usuario  = ref("");
    const password = ref("");
    const mensaje  = ref("");
    const router   = useRouter();

    const validarAcceso = async () => {
        const datos = {
            operacion: "iniciarSesion",
            usuario: usuario.value,
            password: password.value
        };

        try {
            const respuesta = await fetch("http://localhost/frameworks/fdjProyectoVue/backend/fetch/login.fetch.php", {
                method: "POST",
                credentials: 'include', // Es necesario para trabajar con variables de sesión ya que trabajaremos con credenciales
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(datos),
            });

            const resultado = await respuesta.json();
            mensaje.value = resultado.message;

            // Si el acceso es exitoso, redirigir al usuario
            if (resultado.status === "success") {
                router.push("/inicio");
            }

            else {
                $.toast({
                    heading: 'Aviso importante',
                    text: resultado.message,
                    position: 'top-right',
                    icon: 'error',
                    hideAfter: 6000,
                    stack: false
                });
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