<script>
    function findocument(){
            event.preventDefault();
            Swal.fire({
            title: 'Finalizar Documento?',
            text: "Una vez finalizado no se podra modificar...!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Si'
            }).then((result) => {
            if (result.isConfirmed) {
                document.finalizar.submit();
            }
            })
        }
    function recharzardocument(){
        event.preventDefault();
        Swal.fire({
        title: 'Rechazar Documento?',
        text: "Una vez rechazado no se podra modificar...!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Si'
        }).then((result) => {
        if (result.isConfirmed) {
            document.rechazar.submit();
        }
        })
    }
    function derivardocumento(){
        event.preventDefault();
        Swal.fire({
        title: 'Derivar Documento?',
        text: "Una vez derivado no se podra modificar...!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Si'
        }).then((result) => {
        if (result.isConfirmed) {
            document.derivar.submit();
        }
        })
    }
</script>
