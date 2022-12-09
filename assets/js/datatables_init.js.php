let url_data_table = $(location).attr('href')+"&ws=1" ;

datatable = function (identificador, columns, columnDefs, data) {

    let seccion = getParameterByName('seccion');
    let accion = getParameterByName('accion');

    url_data_table = url_data_table.replace(accion,"get_data");

    if (identificador !== ".datatable"){
        let _seccion = identificador.slice(1)
        url_data_table = url_data_table.replace(seccion,_seccion);
    }

    let _columnDefs = asigna_columnDefs(columnDefs);

    var table = $(identificador).DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            "url": url_data_table,
            'data' : {data: data},
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

                    console.log(row[e]);
                    let button = `${row[e]}`;
                    expresion += button

                })
            }
            return expresion;
        }
        salida.push(object);
    });
    return salida;
};
