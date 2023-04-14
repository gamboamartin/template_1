if ($('#load').length > 0) {
    var loading = false;
    var pagina = 1;

    var init = 1;

    let seccion = getParameterByName('seccion');
    const ruta_load = get_url(seccion, "load_table", {});

    const load_contenido = () => {
        var dataform = new FormData();
        var search = "";

        if ($('#search').val() != undefined) {
            search = $('#search').val();
        }

        dataform.append('search', search);
        dataform.append('init', init);
        dataform.append('pagina', pagina);

        $.ajax({
            async: true,
            type: 'POST',
            url: ruta_load,
            data: dataform,
            contentType: false,
            processData: false,
            success: function (response) {

                if (response.status === 'Success') {
                    $('#inicio-registros').html(response.primer_registro);
                    $('#fin-registros').html(response.ultimo_registro);
                    $('#total-registros').html(response.total_registros);

                    if (search != "") {
                        $('#load-table table tbody').html(response.html);
                        loading = true;
                    } else {
                        $('#load-table table tbody').append(response.html);
                        loading = false;
                    }
                } else if (response.status === 'Error') {
                    alert("Ha ocurrido un error: " + response.message);
                } else {
                    console.log(response)
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                let response = XMLHttpRequest.responseText;
                response = response.replace('[]', '')

                if (response.includes('Acceso denegado')) {
                    const html = `<div class="col-md-12 info-lista" style="margin-top: 20px;"><div class="row-cols-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Oh error!</strong> Acceso denegado - No cuenta con los permisos necesarios para la ruta: <strong>(${ruta_load})</strong>.
                                </div>
                              </div></div>`;

                    $('#load-table').html(html);
                } else {
                    alert("Ha ocurrido un error: " + textStatus);
                }
            }
        });
    };

    const loader = () => {
        return `<div id="loader" class="loadingio-spinner-spinner-fbpis5xeagh" style="display: none;">
                        <div class="ldio-kjp6horjcfr"><div></div><div></div><div></div><div></div><div></div><div>
                        </div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>`;
    }

    const load_loader = (screen) => {
        $(document).ajaxStart(function () {
            screen.fadeIn();
        }).ajaxStop(function () {
            screen.fadeOut();
        })
    }

    $(window).load(function () {
        $('#load-table #table-load').append(loader);

        let screen = $('#loader');
        load_loader(screen);
        load_contenido();
    });

    $(window).scroll(function () {
        if (Math.round($(this).scrollTop()) >= $(document).height() - $(window).height()) {
            if (loading == false) {
                loading = true;
                pagina++;

                let screen = $('#loader');
                load_loader(screen);
                load_contenido();
            }
        }
    });


    $('#search').keyup(
        delay(function (e) {
            pagina = 1;
            $('#load-table #table-load').append(loader);
            let screen = $('#loader');
            load_loader(screen);
            load_contenido();
        }, 500)
    );
}




