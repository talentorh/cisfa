function mostarDetalles(id) {
    var ruta = 'mimodal.php?persona=' + id;
    $.get(ruta, function (data) {
        $('#divModal').html(data);
        $('#myModal').modal('show');
    });
}