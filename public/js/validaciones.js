// VALIDACIONES
function validarNombres() {
    // Variable que usaremos para determinar si el input es valido
    let isValid = false;

    // El input que queremos validar
    const input = document.forms['enviar']['nombre'];

    //El div con el mensaje de advertencia:
    const message = document.getElementById('messageNombres');

    input.willValidate = false;

    // El tamaño maximo para nuestro input
    const tmaximo = 50;

    // El pattern que vamos a comprobar
    const pattern = new RegExp('^[A-ZÀ-ÿ\u00f1\u00d10-9 ]+$', 'i');

    input.classList.add('is-invalid');
    if(input.value) {
        if(pattern.test(input.value)){
            isValid = true;
            input.classList.remove('is-invalid')
        }
    }
    input.addEventListener('input',function(){

        if (this.value.length > tmaximo){
            this.value = this.value.slice(0,tmaximo);
        }
        if (this.value.length >= 10){
            // input.classList.replace('is-invalid','is-valid' )
            input.classList.add('is-valid');
        }else{
            input.classList.remove('is-valid');
        }
      })
    //Pinta input
    if(!isValid) {
        // input.classList.add('was-validated')
        input.classList.replace('is-valid','is-invalid' )
        message.hidden = false;
    } else {
        // input.style.borderColor = 'green';
        // input.classList.replace('is-invalid','is-valid' )
        message.hidden = true;
    }

    return isValid;
  }


function validarFecha() {

    let isValid = false;
    const today = new Date().toISOString().slice(0,10);

    const input = document.forms['crearEvento']['fecha'];


    const message = document.getElementById('messageFecha');
    input.willValidate = false;

    // console.log(input.value);
    // console.log(today);
    // const maximo = 11;


    // const pattern = new RegExp('/^\d{4}-[0-1][0-2]-[0-3]\d\s([0-1][0-9]|2[0-3])$/','i');

    input.classList.add('is-invalid');
    if(!input.value) {
        isValid = false;
        console.log('vacio');
    } else {

        if(input.value >= today){
            isValid = true;
            input.classList.remove('is-invalid')
        }
    }

    //Pinta input
    if(!isValid) {
        input.classList.replace('is-valid','is-invalid' )
        message.hidden = false;
    } else {
        message.hidden = true;
        input.classList.add('is-valid');
    }

    return isValid;
  }

  function validarCel() {

    let isValid = false;


    const tmaximo = 9;

    const input = document.forms['enviar']['celular'];


    const message = document.getElementById('messageCel');
    input.willValidate = false;


    const pattern = new RegExp('^[0-9]*$');


    input.classList.add('is-invalid');
    if(input.value) {
        if(pattern.test(input.value)){
            isValid = true;
            input.classList.remove('is-invalid')
        }
    }
    input.addEventListener('input',function(){

        if (this.value.length > tmaximo){
            this.value = this.value.slice(0,tmaximo);
        }
        if (this.value.length == tmaximo){
            // input.classList.replace('is-invalid','is-valid' )
            input.classList.add('is-valid');
        }else{
            input.classList.remove('is-valid');
        }
      })
    //Pinta input
    if(!isValid) {
        // input.classList.add('was-validated')
        input.classList.replace('is-valid','is-invalid' )
        message.hidden = false;
    } else {
        // input.style.borderColor = 'green';
        // input.classList.replace('is-invalid','is-valid' )
        message.hidden = true;
    }

    return isValid;
  }

  function validarDni() {

    let isValid = false;


    const tmaximo = 8;

    const input = document.forms['enviar']['dni'];


    const message = document.getElementById('messageDni');
    input.willValidate = false;


    const pattern = new RegExp('^[0-9]*$');


    input.classList.add('is-invalid');
    if(input.value) {
        if(pattern.test(input.value)){
            isValid = true;
            input.classList.remove('is-invalid')
        }
    }
    input.addEventListener('input',function(){

        if (this.value.length > tmaximo){
            this.value = this.value.slice(0,tmaximo);
        }
        if (this.value.length == tmaximo){
            // input.classList.replace('is-invalid','is-valid' )
            input.classList.add('is-valid');
        }else{
            input.classList.remove('is-valid');
        }
      })
    //Pinta input
    if(!isValid) {
        // input.classList.add('was-validated')
        input.classList.replace('is-valid','is-invalid' )
        message.hidden = false;
    } else {
        // input.style.borderColor = 'green';
        // input.classList.replace('is-invalid','is-valid' )
        message.hidden = true;
    }

    return isValid;
  }

  function validarInicio() {

    let isValid = false;


    // const tmaximo = 8;

    const input = document.forms['crearEvento']['inicio'];


    // const message = document.getElementById('messageInicio');
    input.willValidate = false;


    // const pattern = new RegExp('^(1[0-2]|0?[0-9]):[0-5]?[0-9]\s([ap][m])$');
    console.log(input.value);

    if(input.value) {
        // if(pattern.test(input.value)){
        //     isValid = true;
        // }
            isValid = true;

    }
    //Pinta input
    if(!isValid) {
        // input.classList.add('was-validated')
        // input.classList.replace('is-valid','is-invalid' )
        // message.hidden = false;
    } else {
        // input.style.borderColor = 'green';
        // input.classList.replace('is-invalid','is-valid' )
        // message.hidden = true;
    }

    return isValid;
  }

  function validarFin() {

    let isValid = false;
    let hora = new Date().toTimeString().slice(0,8);
    console.log(hora);

    // const tmaximo = 8;
    const input1 = document.forms['crearEvento']['inicio'];
    const input2 = document.forms['crearEvento']['fin'];


    const message = document.getElementById('messageFin');
    input2.willValidate = false;


    input2.classList.add('is-invalid');
    if(!input2.value) {
        isValid = false;
        console.log('vacio');
    } else {

        if(input1.value <= input2.value){
            isValid = true;
            input2.classList.remove('is-invalid')
        }
    }

    //Pinta input
    if(!isValid) {
        input2.classList.replace('is-valid','is-invalid' )
        message.hidden = false;
    } else {
        message.hidden = true;
        input2.classList.add('is-valid');
    }
  }

//   function validarOficina() {

//     let isValid = false;


//     // const tmaximo = 8;

//     const input = document.forms['crearEvento']['oficina'];


//     const message = document.getElementById('messageOficina');
//     input.willValidate = false;


//     const pattern = new RegExp('^[A-ZÀ-ÿ\u00f1\u00d10-9 ]+$', 'i');
//     // console.log(input.value);

//     input.classList.add('is-invalid');
//     if(input.value) {
//         if(pattern.test(input.value)){
//             isValid = true;
//         }
//     }
//     //Pinta input
//     if(!isValid) {
//         // input.classList.add('was-validated')
//         input.classList.replace('is-valid','is-invalid' )
//         message.hidden = false;
//     } else {
//         // input.style.borderColor = 'green';
//         input.classList.replace('is-invalid','is-valid' )
//         message.hidden = true;
//     }

//     return isValid;
//   }
