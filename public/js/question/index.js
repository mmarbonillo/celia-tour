$(function(){


    // CIERRA LA MODAL
    function closeModal(){
        $("#modalWindow").css('display', 'none');
        $("#modalQuestionAdd").css('display', 'none');
        $('#modalQuestionUpdate').css('display', 'none');
        $("#confirmDelete").css('display', 'none');
    }

    //----------------------------- INSERTAR ----------------------------------
    
    // ABRE INSERTAR QUESTION
    $('#btn-add').click(function(){
        $('#modalWindow').css('display', 'block');
        $('#modalQuestionAdd').css('display', 'block');
    })

    // GUARDA EL FORMULARIO DE INSERTAR
    $('#btn-saveNew').click(function(){

        dataForm = new FormData();
        dataForm.append('_token', $('#formAdd input[name="_token"]').val());
        dataForm.append('text', $('#formAdd #textAdd').val());
        dataForm.append('type', $('#formAdd input[name="type"]:checked').val());
        dataForm.append('key', $('#formAdd input[name="key"]:checked').val());
        dataForm.append('show_clue', $('#formAdd input[name="show_clue"]:checked').val());
        
        answer = $('#formAdd select[name="answer"]').val();
        if(answer != undefined){
            dataForm.append('answer', answer);
        }
        
        $.ajax({
            url: $("#formAdd").attr('action'),
            type: 'post',
            data: dataForm,
            contentType: false,
            processData: false,
        }).done(function(data){
            
            var element = ` <div id="${data.id}" class="col100 mPaddingLeft mPaddingRight sPaddingTop">
                                <div class="col70 sPadding">${data.text}</div>
                                <div class="col12 sPadding"><button class="btn-update col100">Editar</button></div>
                                <div class="col12 sPadding"><button class="btn-delete delete col100">Eliminar</button></div>
                            </div>`;

            $("#tableContent").append(element);
            closeModal();
            
            $('.btn-update').unbind('click');
            $('.btn-delete').unbind('click');
            $('.btn-update').click(edit);
            $('.btn-delete').click(openDelete);
            alert("Pregunta guardada");
        }).fail(function(data){
            alert("Ocurrio un error al guardar la pregunta")
            console.log(data);
        })

    });

    //----------------------------- MODIFICAR ----------------------------------

    function edit(){

        // Obtiene el id de la pregunta donde se pulso el boton modificar.
        var id = $(this).parent().parent().attr('id');

        // Se crea la ruta para obtener los datos de la pregunta.
        var address = questionEdit.replace('insertIdHere', id);

        // Se hace una peticion para obtener los datos de la pregunta.
        $.get(address, function(data){

            // Se rellenan los datos del formulario con la pregunta a editar
            $('#formUpdate #textUpdate').val(data.text); // Campo texto
            $(`#formUpdate input[name="type"][value="${data.type}"]`).prop('checked', true); // Campo tipo pregunta
            $(`#formUpdate input[name="key"][value="${data.key}"]`).prop('checked', true); // Campo llave
            $(`#formUpdate input[name="show_clue"][value="${data.show_clue}"]`).prop('checked', true); // Campo mostrar pista
            $(`#formUpdate select[name="answer"] option[value="${data.answers_id}"]`).prop('selected', true); // Campo respuesta correcta
            
            // Abre la modal
            $('#modalWindow').css('display', 'block');
            $('#modalQuestionUpdate').css('display', 'block');

            // Asigna evento al boton de guardar
            $(`#modalQuestionUpdate #btn-update`).unbind("click");
            $(`#modalQuestionUpdate #btn-update`).click(function(){
                
                // Se obtiene la url del action y se asigna el id correspondiente.
                var addressUpdate = $(`#formUpdate`).attr("action")
                addressUpdate = addressUpdate.replace('insertIdHere', id); 

                // Se obtienen los datos del formulario
                dataForm = new FormData();
                dataForm.append('_token', $('#formUpdate input[name="_token"]').val());
                dataForm.append('text', $('#formUpdate #textUpdate').val());
                dataForm.append('type', $('#formUpdate input[name="type"]:checked').val());
                dataForm.append('key', $('#formUpdate input[name="key"]:checked').val());
                dataForm.append('show_clue', $('#formUpdate input[name="show_clue"]:checked').val());

                // Se comprueba en caso de que no haya respuestas.
                answer = $('#formUpdate select[name="answer"]').val();
                if(answer != undefined){
                    dataForm.append('answer', answer);
                }
        
                // Se hace una peticion para actualizar los datos en el servidor
                $.ajax({
                    url: addressUpdate,
                    type: 'POST',
                    data: dataForm,
                    contentType: false,
                    processData: false,
                }).done(function(data){

                    // Actualiza la fila correspondiente en la tabla
                    var elementUpdate = $(`#tableContent #${data.id}`).children();
                    var text = $(elementUpdate)[0];
                    $(text).text(data.text);

                    closeModal();
                    alert("Datos actualizados.");

                }).fail(function(data){
                    alert("Ocurrio un error al actualizar los datos.");
                    console.log(data);
                })
            });

        }).fail(function(data){
            alert("No se a podido recuperar la información de esta pregunta.")
            console.log(data);
        });

    }

    
    //----------------------------- ELIMINAR ----------------------------------

    // ABRE LA MODAL DE ELIMINAR
    function openDelete(){
        $('#modalWindow').css('display', 'block');
        $('#confirmDelete').css('display', 'block');
        var id = $(this).parent().parent().attr("id");
        $('#aceptDelete').unbind('click');
        $('#aceptDelete').click(function(){
            remove(id);
            closeModal();
        });
        $('#cancelDelete').unbind('click');
        $('#cancelDelete').click(closeModal);
    }

    // ELIMINA UNA ESCENA
    function remove(id){
        var address = questionDelete.replace('insertIdHere', id);
        $.get(address, function(data){
            if(data == 1){
                alert("Pregunta elminada")
                $(`#tableContent #${id}`).remove();
            } else {
                alert("Ocurrio un error al eliminar la pregunta")
            }
        })
    }


    // EVENTOS INICIALES
    $(".closeModal").click(closeModal);
    $(".btn-update").click(edit);
    $(".btn-delete").click(openDelete);
    
});