
  var selectMonth = document.getElementById('card-expiration-month');
  var selectYear = document.getElementById('card-expiration-year');

  // Obtener el año actual
  var currentYear = new Date().getFullYear();

  // Generar opciones para los meses (1-12)
  for (var i = 1; i <= 12; i++) {
    var option = document.createElement('option');
    option.value = i;
    option.textContent = (i < 10 ? '0' : '') + i;
    selectMonth.appendChild(option);
  }

  // Generar opciones para los años (actual hasta 10 años en el futuro)
  for (var i = currentYear; i <= currentYear + 10; i++) {
    var option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    selectYear.appendChild(option);
  }


  function validarFormulario() {
    var cardNumber = document.getElementById('card-number').value;
    if (cardNumber.length !== 16) {
      alert('Por favor, ingrese los 16 dígitos de su tarjeta.');
      return false; // Detiene el envío del formulario
    }
    return true; // Permite el envío del formulario
  }