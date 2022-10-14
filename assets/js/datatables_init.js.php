let url_data_table = $(location).attr('href')+"&ws=1" ;

let accion = getParameterByName('accion');

url_data_table = url_data_table.replace(accion,"get_data");

datatable = function (columns, columnDefs) {

    let _columns = asigna_columns(columns);
    let _columnDefs = asigna_columnDefs(columnDefs);

    var table = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": url_data_table,
            "error": function(jqXHR, textStatus, errorThrown)
            {
                let response = jqXHR.responseText;
                document.body.innerHTML = response.replace('[]', '')
            }
        },
        columns: _columns,
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

        if(!("visible" in object)){
            object.data = null;
            object.render = function (data, type, row)
            {
                let expresion = "";

                if(("rendered" in object)){
                    object.rendered.forEach(function (e) {
                        let key = e.index

                        if(("type" in object) && object.type === "text"){
                            expresion += row[key] + " "
                        } else if (("type" in object) && object.type === "button"){
                            let button = `<a href='${row[key]}' class='btn ${e.class}' style='margin-right: 10px'>${e.text}</a>`;
                            expresion += button
                        }
                    });
                }
                return expresion;
            }
        }
        salida.push(object);
    });
    return salida;
};
