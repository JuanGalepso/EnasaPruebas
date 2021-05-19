$('.formulario-eliminar').submit(function(e) {
    e.preventDefault();
   
    Swal.fire({
        title: '¿Está seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar!',
        confirmButtonText: '¡Sí, Bórralo!'
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })  
});