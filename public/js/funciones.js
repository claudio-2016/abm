function test() {
    alert('ok');
}

function controladorHome() {
    detectarNota();
    cadenaLimpia($('#titulo'), 50, $('#nt1'));
    limpiarTextArea($('#texto'));

    eliminarNota()
    guardarNota();

    $('#cerrar').on('click', function () {
        limpiarformulario($('#formNota'), $('#flag'));
        $('#delete').addClass('d-none');
    });
}

function detectarNota() {
    $('.marcador').on('click', function () {
        //alert($(this).attr('id'));
        var id = $(this).attr('id');
        var titulo = $('#' + id + ' div p').text();

        $.post('/show',{_token: $("input[name='_token']").val(),flag:id}, function(data) {
            $('#texto').val(data);
        });
        $('#flag').val(id);
        $('#titulo').val(titulo);
        $('#delete').removeClass('d-none');
        $('#exampleModal').modal('show');
    });
}

function limpiarformulario(obj, obj2) {
    $(obj2).val('0');
    $(obj)[0].reset();
}

//-- funcion para evitar que se ingrese caracteres "especiales" y con limite de ingreso
//-- Esta pensada para nombre y/o razones sociales.
function cadenaLimpia(obj, limite, obj2) {
    $(obj).on('input', function () {
        notificacionControl(obj2);
        if (this.value.length > limite) {
            this.value = this.value.substring(0, this.value.length - 1);
        } else {
            this.value = this.value.replace(/[^0-9A-Za-z\u00C0-\u017F.\s]/g, '');
            for (var i = 0; i < this.value.length; i++) {
                if (i > 0 && this.value[i] == ' ' && this.value[i - 1] == ' ') {
                    this.value = this.value.substring(0, this.value.length - 1);
                    this.value = this.value.substring(0, this.value.length - 1);
                }
            }
            if (this.value.length == 1 && this.value[0] == ' ') {
                this.value = this.value.substring(0, this.value.length - 1);
            }
            //-- backup: \u00f1\u00d1
        }
    });
}

function limpiarTextArea(obj) {
    $(obj).on('input', function () {
        this.value = this.value.replace(/[^0-9a-zA-Z\u00C0-\u017F\s\.\,\!\¡\?\¿\-\:\;]/g, '');
    });
}

function caponVacio(obj) {
    return $(obj).val() == '';
}

function notificacionControl(obj, e = 0) {
    if(e == 1) {
        $(obj).removeClass('d-none');
    } else {
        $(obj).addClass('d-none');
    }
}

function guardarNota() {
    $('#formNota').submit(function(e) {
        e.preventDefault();
        if(caponVacio($('#titulo'))) {
            notificacionControl($('#nt1'), 1);
        } else {
            this.submit();
        }
    });
}

function eliminarNota() {
    $('#delete').on('click',function() {
        $.post('/delete',{_token: $("input[name='_token']").val(),flag:$('#flag').val()},function(data){
            if(data == 1) {
                window.location.href = '/';
            }
        });
    });
}
