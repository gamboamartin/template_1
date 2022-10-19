let url_data_table = $(location).attr('href')+"&ws=1" ;

let accion = getParameterByName('accion');

url_data_table = url_data_table.replace(accion,"get_data");

datatable = function (columns, columnDefs) {

    let _columnDefs = asigna_columnDefs(columnDefs);

    var table = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            "url": url_data_table,
            "error": function(jqXHR, textStatus, errorThrown)
            {
                let response = jqXHR.responseText;
                document.body.innerHTML = response.replace('[]', '')
            }
        },
        columns: columns,
        columnDefs: _columnDefs
    });
};

asigna_columns = function (columns) {
    let salida = []

    columns.forEach( function(valor, indice, array) {
        salida.push({data : valor});
    });

    return salida;
};

asigna_columnDefs = function (columnDefs) {
    let salida = []

    columnDefs.forEach( function(object, indice, array) {

        object.render = function (data, type, row){
            let expresion = "";
            let objects = object.rendered

            if (object.type === "text"){
                objects.forEach(function (e) {
                    expresion += row[e] + " "
                })
            } else if (object.type === "button"){
                objects.forEach(function (e) {
                    console.log(row[e])
                    let button = `<a href='${row[e]}' class='btn btn-info' style='margin-right: 10px'>${e}</a>`;
                    expresion += button
                })
            }
            return expresion;
        }


        salida.push(object);
    });
    return salida;
};
