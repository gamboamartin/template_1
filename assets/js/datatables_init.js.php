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
            'data': function (d) {
                d.data = data;
                d.in = filtro_in;
                d.filtros_avanzados = filtros_avanzados();
            },

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

document.addEventListener("DOMContentLoaded", function () {
    // Delegación de eventos en el tbody para manejar los botones dentro de la DataTable
    document.querySelector("tbody").addEventListener("click", function (event) {
        let button = event.target.closest(".dropdown-toggle");

        if (button) {
            let dropdownMenu = button.nextElementSibling;

            // Cerrar otros dropdowns abiertos
            document.querySelectorAll(".dropdown-menu").forEach(menu => {
                if (menu !== dropdownMenu) {
                    menu.classList.remove("show");
                }
            });

            // Alternar la visibilidad del dropdown actual
            dropdownMenu.classList.toggle("show");
        }
    });

    // Cerrar dropdowns si se hace clic fuera
    document.addEventListener("click", function (event) {
        if (!event.target.closest(".dropdown")) {
            document.querySelectorAll(".dropdown-menu").forEach(menu => {
                menu.classList.remove("show");
            });
        }
    });
});

filtros_avanzados = function () {
    let filtros = {};

    $(".filtros-avanzados input").each(function () {
        let $input = $(this);
        let grupo = $input.data("ajax");
        let filtro = $input.data("filtro_campo");
        let key = $input.data("filtro_key");
        let value = $.trim($input.val());

        if (grupo && filtro && value) {
            if (!filtros[grupo]) {
                filtros[grupo] = {};
            }

            if (grupo === "rango-fechas") {
                filtros[grupo]['filtro_tabla'] = filtro;
                filtro = key;
            }

            filtros[grupo][filtro] = value

        }
    });

    return filtros;
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
    let salida = [];

    columnDefs.forEach(function (object, indice, array) {
        object.render = function (data, type, row) {
            let expresion = "";
            let objects = object.rendered;

            if (object.type === "text") {
                objects.forEach(function (e) {
                    expresion += row[e] + " ";
                });
            } else if (object.type === "button") {
                objects.forEach(function (e) {
                    let button = `${row[e]}`;
                    expresion += button;
                });
            } else if (object.type === "menu") {
                let items = [];

                objects.forEach(function (e) {
                    let etiqueta = `${row[e]}`;
                    var href = $(etiqueta).prop("href");
                    var title = $(etiqueta).prop("title");
                    var style = $(etiqueta).prop("class").split("btn-")[1];
                    var target = $(etiqueta).prop("target");
                    var targetAttr = target ? `target="${target}"` : "";

                    var button = `<a class="dropdown-item text-${style}" href="${href}" ${targetAttr}>${title}</a>`;
                    items.push(button);
                });

                let totalPages = Math.ceil(items.length / 3); // Total de páginas
                let menuId = `menu-${Math.random().toString(36).substr(2, 9)}`; // ID único

                // Generar HTML para las páginas ocultas
                let pagesHtml = "";
                for (let i = 0; i < totalPages; i++) {
                    let start = i * 3;
                    let end = start + 3;
                    let pageItems = items.slice(start, end).join("");

                    pagesHtml += `<div class="menu-page page-${menuId}" data-page="${i}" style="display: ${i === 0 ? "block" : "none"}">
                                    ${pageItems}
                                  </div>`;
                }

                // Botones de paginación
                let paginationControls = ` <div class="dropdown-divider"></div>
                                            <div class="d-flex justify-content-between align-items-center p-2" style="display: flex; justify-content: space-between; align-items: center;">
                                                <button class="btn btn-sm btn-link prev-page" data-menu="${menuId}" disabled>«</button>
                                            <div>
                                            <span class="current-page" data-menu="${menuId}">1</span> / <span class="total-pages" data-menu="${menuId}">${totalPages}</span>
                                            </div>
                                            <button class="btn btn-sm btn-link next-page" data-menu="${menuId}" ${totalPages > 1 ? "" : "disabled"}>»</button>
                                            </div>`;

                expresion = `<div class="dropdown text-center">
                              <button class="btn btn-transparent p-0 dark:text-high-emphasis dropdown-toggle" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                                ${pagesHtml}
                                ${totalPages > 1 ? paginationControls : ""}
                              </div>
                            </div>`;
            }
            return expresion;
        };

        if (object.type === "check") {
            delete object.render;
            delete object.className;
            delete object.defaultContent;
            delete object.orderable;
            delete object.rendered;
            delete object.data;

            object.checkboxes = { selectRow: true };
        }

        salida.push(object);
    });

    return salida;
};

// Agregar evento para manejar la paginación
$(document).on("click", ".prev-page, .next-page", function () {
    let menuId = $(this).data("menu");
    let currentPage = parseInt($(`.current-page[data-menu="${menuId}"]`).text());
    let totalPages = parseInt($(`.total-pages[data-menu="${menuId}"]`).text());

    if ($(this).hasClass("prev-page") && currentPage > 1) {
        currentPage--;
    } else if ($(this).hasClass("next-page") && currentPage < totalPages) {
        currentPage++;
    }

    // Mostrar la página actual y ocultar las demás
    $(`.page-${menuId}`).hide();
    $(`.page-${menuId}[data-page="${currentPage - 1}"]`).show();

    // Actualizar el número de página
    $(`.current-page[data-menu="${menuId}"]`).text(currentPage);

    // Habilitar/deshabilitar botones según corresponda
    $(`.prev-page[data-menu="${menuId}"]`).prop("disabled", currentPage === 1);
    $(`.next-page[data-menu="${menuId}"]`).prop("disabled", currentPage === totalPages);
});
