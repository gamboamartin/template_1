let url = $(location).attr('href')+"&ws=1" ;

let accion = getParameterByName('accion');

url = url.replace(accion,"get_data");

var table = $('.datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        "url": url,
    }

});
