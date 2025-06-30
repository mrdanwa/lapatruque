(function ($) {
  "use strict";

  var options2 = {
    success: showResponseContact,
    beforeSubmit: showRequestContact,
  };
  $("#contact-form-home").submit(function () {
    $(this).ajaxSubmit(options2);
    return false;
  });
})(jQuery);

function showResponseContact(responseText, statusText) {
  if (statusText == "success") {
    jQuery("#contact-holder-home").html("<h5>Mensaje enviado</h5>");
    jQuery("#output-contact").html("<p>¡Gracias por contactarnos!</p>");
  } else {
    alert("estado: " + statusText + "\n\nAlgo ha salido mal");
  }
}

function showRequestContact(formData, jqForm, options2) {
  var form = jqForm[0];
  var validRegExp = /^[^@]+@[^@]+.[a-z]{2,}$/i;

  if (!form.name.value) {
    jQuery("#output-contact").html(
      '<div class="output2">¡Por favor, rellena el campo Nombre!</div>'
    );
    return false;
  } else if (!form.email.value) {
    jQuery("#output-contact").html(
      '<div class="output2">¡Por favor, rellena el campo Correo electrónico!</div>'
    );
    return false;
  } else if (form.email.value.search(validRegExp) == -1) {
    jQuery("#output-contact").html(
      '<div class="output2">¡Por favor, proporciona una dirección de correo electrónico válida!</div>'
    );
    return false;
  } else if (!form.message.value) {
    jQuery("#output-contact").html(
      '<div class="output2">¡Por favor, rellena el campo Mensaje!</div>'
    );
    return false;
  } else {
    jQuery("#output-contact").html("¡Enviando mensaje...!");
    return true;
  }
}
