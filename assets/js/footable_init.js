"use strict";
/*
 * http://fooplugins.github.io/FooTable/docs/getting-started.html
 */    
function footable_init() {
    $('.footable').footable({
        "filtering": {
        "enabled": false
              },
    });
    
    $('.footable-sort').footable({
        "filtering": {
        "enabled": true
              },
    });

    $('.footable-filtering .form-inline')
        .prepend($('<div class="form-group">')
            .append($('<select class="footable-filter-size form-control"></select>')
                .append('<option>10</option><option>25</option><option>50</option><option>100</option>')))

    $('.footable-filter-size').on('change', function(e){
        let size = $(this).val();
        FooTable.get('#footable').pageSize(parseInt(size));
    });
}
