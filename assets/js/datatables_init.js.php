let url_data_table = $(location).attr('href') + "&ws=1";

datatable = function (identificador, columns, columnDefs, data, filtro_in) {

    let seccion = getParameterByName('seccion');
    let accion = getParameterByName('accion');

    url_data_table = url_data_table.replace(`accion=${accion}`, "accion=get_data");

    if (identificador !== ".datatable") {
        let _seccion = identificador.slice(1)
        url_data_table = url_data_table.replace(seccion, _seccion);
    }

    let _columns = asigna_columns(columns);
    let _columnDefs = asigna_columnDefs(columnDefs);
    let _checks = verify_check(columns);

    var table = $(identificador).DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            "url": url_data_table,
            'data': {data: data, in: filtro_in},
            "error": function (jqXHR, textStatus, errorThrown) {
                let response = jqXHR.responseText;
                document.body.innerHTML = response.replace('[]', '')
            }
        },
        columns: _columns,
        columnDefs: _columnDefs,
        'select': _checks.select,
        'order': _checks.order
    });
};

verify_check = function (columns) {

    let salida = {'select': {'style': 'single'}, 'order': []};

    if (columns.filter(e => e.title.trim() === '').length > 0) {
        salida.select = {'style': 'multi'};
        salida.order = [[1, 'asc']];
    }
    return salida;
}

asigna_columns = function (columns) {
    let salida = []

    columns.forEach(function (valor, indice, array) {

        if (valor.data === "check") {
            valor.data = null;
        }

        salida.push(valor);
    });

    return salida;
};

asigna_columnDefs = function (columnDefs) {
    let salida = []

    columnDefs.forEach(function (object, indice, array) {

        object.render = function (data, type, row) {
            let expresion = "";
            let objects = object.rendered

            if (object.type === "text") {
                objects.forEach(function (e) {
                    expresion += row[e] + " "
                })
            } else if (object.type === "button") {
                objects.forEach(function (e) {
                    let button = `${row[e]}`;
                    expresion += button
                })
            } else if (object.type === "menu") {
                var items = "";

                objects.forEach(function (e) {
                    let etiqueta = `${row[e]}`;
                    var href = $(etiqueta).prop('href');
                    var title = $(etiqueta).prop('title');
                    var style = $(etiqueta).prop('class').split("btn-")[1];

                    var button = `<a class="dropdown-item text-${style}" href="${href}">${title}</a>`;

                    items += button
                })

                expresion = `<div class="dropdown text-center">
                              <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" style="">
                                ${items}
                            </div>`;
            }
            return expresion;
        }

        if (object.type === "check") {
            delete object.render
            delete object.className
            delete object.defaultContent
            delete object.orderable
            delete object.rendered
            delete object.data

            object.checkboxes = {'selectRow': true}
        }

        salida.push(object);
    });
    return salida;
};
