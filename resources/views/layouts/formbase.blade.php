<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Tramites</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/b0ad45792a.js" crossorigin="anonymous"></script>
    <style>

        html, body {
                        background-color: #f3f0f7;
                        font-family: 'Roboto', sans-serif;
                        height: 100vh;
                        margin: 0;
                    }

    </style>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    @yield('contenidoform')




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
        function confirmarenvio(){
            event.preventDefault();
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.enviar.submit();
            }
            })
        }
        function cancelar(){
            Swal.fire({
            title: 'Se borraran los datos del formulario!!!',
            icon: 'warning',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Ok, no hay problema',
            denyButtonText: `No...!`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = "/";
            } else if (result.isDenied) {
            }
            })
        }
        function adjuntos(){

            const newAdj = document.createElement("input");

            const tipo = document.createAttribute("type");
            tipo.value = "file";
            const clase = document.createAttribute("class");
            clase.value = "form-control mb-2";
            const subir = document.createAttribute("aria-label");
            subir.value = "Upload"

            newAdj.setAttributeNode(tipo);
            newAdj.setAttributeNode(clase);
            newAdj.setAttributeNode(subir);
            newAdj.setAttribute('name','adjunto'+i);

            const actualinput = document.getElementById("masadjuntos");
            actualinput.appendChild(newAdj);
            i++;
            console.log(i);
            if(i>3){
                document.getElementById("mas").remove();
                document.getElementById("max").remove();
                actualinput.setAttribute('class','col-md-12');
            }
        }
        function copiar(id_elemento) {

            // Crea un campo de texto "oculto"
            var aux = document.createElement("input");

            // Asigna el contenido del elemento especificado al valor del campo
            aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);

            // Añade el campo a la página
            document.body.appendChild(aux);

            // Selecciona el contenido del campo
            aux.select();

            // Copia el texto seleccionado
            document.execCommand("copy");

            // Elimina el campo de la página
            document.body.removeChild(aux);

        }
    </script>
  </body>
</html>
