 // Función para agregar un mensaje al chat
 function addMessage(author, message) {
    $('#chat-box').append('<p><strong>' + author + ':</strong> ' + message + '</p>');
    // Hacer scroll hacia abajo para mostrar el último mensaje
    $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
}

// Evento al hacer clic en el botón de enviar
$('#send-btn').click(function () {
    var messageInput = $('#message-input');
    var message = messageInput.val().trim();

    // Verificar que el mensaje no esté vacío
    if (message !== '') {
        addMessage('Tú', message);
        // Puedes enviar el mensaje al servidor aquí si es necesario
        // ...

        // Limpiar el campo de entrada
        messageInput.val('');
    }
});

// Ejemplo de recepción de mensajes (simulado)
// Esto podría ser sustituido por lógica de WebSocket o AJAX en un entorno real
setTimeout(function () {
    addMessage('Soporte', 'Hola, ¿en qué puedo ayudarte?');
}, 1000);

setTimeout(function () {
    addMessage('Usuario', 'Necesito ayuda con mi cuenta.');
}, 2000);

setTimeout(function () {
    addMessage('Soporte', 'Claro, ¿puedes proporcionar más detalles?');
}, 3000);






$(document).ready(function(){
    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
});



$(document).on("click","#BookCreate",function () {
    let url= $(this).data('url');
    $.ajax({
        url: url,
        type: "POST",
        success: function(datos) {
          $("#ModalContent").html(datos);
          $("#ModalLarge").modal("show");
        }
      });
})

$(document).on("click","#BookUpdate",function () {
    let url= $(this).data('url');
    $.ajax({
        url: url,
        type: "POST",
        success: function(datos) {
          $("#ModalContent").html(datos);
          $("#ModalLarge").modal("show");
        }
      });
})

$(document).on("click","#BookStatus",function () {
    let url= $(this).data('url');
    $.ajax({
        url: url,
        type: "POST",
        success: function(datos) {
          $("#ModalContent").html(datos);
          $("#ModalLarge").modal("show");
        }
      });
})

$(document).on("click","#BookRent",function () {
    let url= $(this).data('url');
    $.ajax({
        url: url,
        type: "POST",
        success: function(datos) {
          $("#ModalContent").html(datos);
          $("#ModalLarge").modal("show");
        }
      });
})
$(document).on("click","#BookReturnBook",function () {
    let url= $(this).data('url');
    $.ajax({
        url: url,
        type: "POST",
        success: function(datos) {
          $("#ModalContent").html(datos);
          $("#ModalLarge").modal("show");
        }
      });
})
