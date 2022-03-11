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
        var i = 2;
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
    </script>
  </body>
</html>
