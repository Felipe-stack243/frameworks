import { defineStore } from 'pinia';

import { ref } from 'vue';

export const useSessionStore = defineStore('session', () => {
    const accesoValido  = ref(false);
    const idUsuario     = ref(null);
    const usuario       = ref(null);
    const nombreUsuario = ref(null);

    const verificarSesion = async () => {
        try {
            const response = await fetch('http://localhost/frameworks/fdjProyectoVue/backend/fetch/validarSesion.fetch.php', {
                credentials: 'include'  // Para incluir cookies de sesión
            });

            const datosSesion = await response.json();

            if (datosSesion.acceso) {
                accesoValido.value  = true;
                idUsuario.value     = datosSesion.idUsuario;
                usuario.value       = datosSesion.usuario;
                nombreUsuario.value = datosSesion.nombreUsuario;
            } 
            
            else {
                accesoValido.value  = false;
                idUsuario.value     = null;
                usuario.value       = null;
                nombreUsuario.value = null;
            }
        } 
        
        catch (error) {
            console.error("Error al verificar la sesión:", error);
        }
    };

    const cerrarSesion = async () => {
        try {
            const response = await fetch('http://localhost/frameworks/fdjProyectoVue/backend/fetch/cerrarSesion.fetch.php', {
                method: 'POST',
                credentials: 'include'
            });
    
            const resultado = await response.json();
    
            if (resultado.success) {
                accesoValido.value  = false;
                idUsuario.value     = null;
                usuario.value       = null;
                nombreUsuario.value = null;

                return true;
            } 
            
            else {
                console.error("Error al cerrar sesión:", resultado.error);
                return false;
            }
        }
        
        catch (error) {
            console.error("Error en la solicitud de cierre de sesión:", error);
        }
    };

    return { accesoValido, idUsuario, usuario, nombreUsuario, verificarSesion, cerrarSesion };
});