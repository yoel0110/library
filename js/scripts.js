document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.getElementById('formulario-contacto');

    if (!formulario) {
        return;
    }

    const campos = {
        nombre: {
            elemento: document.getElementById('nombre'),
            validar: function(valor) {
                return valor.trim().length > 0;
            },
            mensaje: 'El nombre es obligatorio.'
        },
        correo: {
            elemento: document.getElementById('correo'),
            validar: function(valor) {
                const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(valor.trim());
            },
            mensaje: 'El correo no tiene un formato válido.'
        },
        telefono: {
            elemento: document.getElementById('telefono'),
            validar: function(valor) {
                return valor.trim().length > 0;
            },
            mensaje: 'El teléfono es obligatorio.'
        },
        asunto: {
            elemento: document.getElementById('asunto'),
            validar: function(valor) {
                return valor.trim().length > 0;
            },
            mensaje: 'El asunto es obligatorio.'
        },
        comentario: {
            elemento: document.getElementById('comentario'),
            validar: function(valor) {
                return valor.trim().length > 0;
            },
            mensaje: 'El comentario es obligatorio.'
        }
    };

    function mostrarError(nombre, mensaje) {
        const campo = campos[nombre];
        if (!campo || !campo.elemento) {
            return;
        }

        campo.elemento.classList.add('is-invalid');
        campo.elemento.classList.remove('is-valid');

        let mensajeError = campo.elemento.parentElement.querySelector('.invalid-feedback');
        if (!mensajeError) {
            mensajeError = document.createElement('div');
            mensajeError.className = 'invalid-feedback';
            campo.elemento.parentElement.appendChild(mensajeError);
        }
        mensajeError.textContent = mensaje;
    }

    function limpiarError(nombre) {
        const campo = campos[nombre];
        if (!campo || !campo.elemento) {
            return;
        }

        campo.elemento.classList.remove('is-invalid');
        campo.elemento.classList.add('is-valid');

        const mensajeError = campo.elemento.parentElement.querySelector('.invalid-feedback');
        if (mensajeError) {
            mensajeError.remove();
        }
    }

    function validarCampo(nombre) {
        const campo = campos[nombre];
        if (!campo || !campo.elemento) {
            return true;
        }

        const valor = campo.elemento.value;
        if (!campo.validar(valor)) {
            mostrarError(nombre, campo.mensaje);
            return false;
        }

        limpiarError(nombre);
        return true;
    }

    Object.keys(campos).forEach(function(nombre) {
        const campo = campos[nombre];
        if (campo.elemento) {
            campo.elemento.addEventListener('input', function() {
                validarCampo(nombre);
            });

            campo.elemento.addEventListener('blur', function() {
                validarCampo(nombre);
            });
        }
    });

    formulario.addEventListener('submit', function(evento) {
        let formularioValido = true;

        Object.keys(campos).forEach(function(nombre) {
            if (!validarCampo(nombre)) {
                formularioValido = false;
            }
        });

        if (!formularioValido) {
            evento.preventDefault();
            evento.stopPropagation();
        }
    });
});
