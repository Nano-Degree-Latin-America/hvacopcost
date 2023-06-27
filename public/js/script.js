//FUNCION PARA INACTIVAR REGISTROS// AUX ES LA RUTA QUE RECIBE
function inactivar(id, aux) {
    Swal.fire({
        title: 'Seleccione una opción',
        text: "",
        showDenyButton: true,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#FF6600',
        confirmButtonText: 'Inactivar',
        denyButtonText: `Eliminar`,
    }).then((result) => {
        if (result.isConfirmed) {

            var token = $("#token").val();
            $.ajax({
                url: "/" + aux + "/" + id + "",
                headers: { 'X-CSRF-TOKEN': token },
                type: 'post',
                method: 'DELETE',
                dataType: 'json',
                success: function () {
                    Swal.fire(
                        'Inactivado!',
                        'El registro se ha inactivado.',
                        'success'
                    )
                }
            });

            setTimeout(function () { location.reload() }, 1000);
        } else if (result.isDenied) {
            var token = $("#token").val();

            $.ajax({
                url: '/delete_empresa/'+ id,
                method: 'get',
                dataType: 'json',
                success: function () {
                    Swal.fire(
                        'Eliminado!',
                        'El registro se ha eliminado.',
                        'success'
                    )
                    setTimeout(function () { location.reload() }, 1000);
                },
                error: function () {
                    Swal.fire(
                        'Atencion!',
                        'El usuario administrador pertenece a la empresa que desea eliminar, cambie de empresa para eliminar.',
                        'warning'
                    )
                }
            });


          }
    })
}

