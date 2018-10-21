(function (window, $) {
    window.LaravelDataTables = window.LaravelDataTables || {};
    window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": "",
        "columns": [{"name": "id", "data": "id", "title": "Id", "orderable": true, "searchable": true}, {
            "name": "name",
            "data": "name",
            "title": "Name",
            "orderable": true,
            "searchable": true
        }, {
            "name": "email",
            "data": "email",
            "title": "Email",
            "orderable": true,
            "searchable": true
        }, {
            "name": "created_at",
            "data": "created_at",
            "title": "Created At",
            "orderable": true,
            "searchable": true
        }, {"name": "updated_at", "data": "updated_at", "title": "Updated At", "orderable": true, "searchable": true}]
    });
})(window, jQuery);


(function (window, $) {
    window.LaravelDataTables = window.LaravelDataTables || {};
    window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": "",
        "columns": [{
            "name": "id",
            "data": "id",
            "title": "Id",
            "orderable": true,
            "searchable": true
        }, {
            "name": "page_name",
            "data": "page_name",
            "title": "Page Name",
            "orderable": true,
            "searchable": true
        }, {
            "name": "page_url",
            "data": "page_url",
            "title": "Page Url",
            "orderable": true,
            "searchable": true
        }, {
            "name": "parent_page_id",
            "data": "parent_page_id",
            "title": "Parent Page Id",
            "orderable": true,
            "searchable": true
        }, {
            "name": "created_at",
            "data": "created_at",
            "title": "Created At",
            "orderable": true,
            "searchable": true
        }, {
            "name": "updated_at",
            "data": "updated_at",
            "title": "Updated At",
            "orderable": true,
            "searchable": true
        }, {"name": "slug", "data": "slug", "title": "Slug", "orderable": true, "searchable": true}],
        "dom": "Bfrtip",
        "buttons": ["csv", "excel", "pdf", "print"]
    });
})(window, jQuery);


(function (window, $) {
    window.LaravelDataTables = window.LaravelDataTables || {};
    window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": "http:\/\/localhost:81\/validator\/public\/users",
        "columns": [{
            "name": "id",
            "data": "id",
            "title": "Id",
            "orderable": true,
            "searchable": true
        }, {
            "name": "page_name",
            "data": "page_name",
            "title": "page_name",
            "orderable": true,
            "searchable": true
        }, {
            "name": "page_url",
            "data": "page_url",
            "title": "page_url",
            "orderable": true,
            "searchable": true
        }, {
            "name": "created_at",
            "data": "created_at",
            "title": "Created At",
            "orderable": true,
            "searchable": true
        }, {"name": "updated_at", "data": "updated_at", "title": "Updated At", "orderable": true, "searchable": true}]
    });
})(window, jQuery);


(function (window, $) {
    window.LaravelDataTables = window.LaravelDataTables || {};
    window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": "",
        "columns": [{
            "name": "id",
            "data": "id",
            "title": "Id",
            "orderable": true,
            "searchable": true
        }, {
            "name": "page_name",
            "data": "page_name",
            "title": "Page Name",
            "orderable": true,
            "searchable": true
        }, {
            "name": "page_url",
            "data": "page_url",
            "title": "Page Url",
            "orderable": true,
            "searchable": true
        }, {
            "name": "parent_page_id",
            "data": "parent_page_id",
            "title": "Parent Page Id",
            "orderable": true,
            "searchable": true
        }, {
            "name": "created_at",
            "data": "created_at",
            "title": "Created At",
            "orderable": true,
            "searchable": true
        }, {
            "name": "updated_at",
            "data": "updated_at",
            "title": "Updated At",
            "orderable": true,
            "searchable": true
        }, {"name": "slug", "data": "slug", "title": "Slug", "orderable": true, "searchable": true}],
        "dom": "Bfrtip",
        "buttons": ["csv", "excel", "pdf", "print"]
    });
})(window, jQuery);


(function (window, $) {
    window.LaravelDataTables = window.LaravelDataTables || {};
    window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": {
            "url": "", "type": "GET", "data": function (data) {
                for (var i = 0, len = data.columns.length; i < len; i++) {
                    if (!data.columns[i].search.value) delete data.columns[i].search;
                    if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                    if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                    if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                }
                delete data.search.regex;
            }
        },
        "columns": [{
            "name": "id",
            "data": "id",
            "title": "id",
            //  "visible": false,
            "orderable": true,
            "searchable": true
        }, {
            "name": "page_name",
            "data": "page_name",
            "title": "page_name",
            "searchable": true,
            "orderable": true,
            "buttons": ["columnsToggle", "export", "print", "reset", "reload"],
            "initComplete": function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            }
        }, {
            "name": "page_url",
            "data": "page_url",
            "title": "page_url",
            "orderable": true,
            "searchable": true
        }, {
            "name": "created_at",
            "data": "created_at",
            "title": "Created At",
            "orderable": true,
            "searchable": true
        }, {"name": "updated_at", "data": "updated_at", "title": "Updated At", "orderable": true, "searchable": true}],
        "drawCallback": function () {
        },
        "initComplete": function () {

        },
        "0": "dom: Bfrtip"
    });
})(window, jQuery);


(function (window, $) {
    window.LaravelDataTables = window.LaravelDataTables || {};
    window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": {
            "url": "", "type": "GET", "data": function (data) {
                for (var i = 0, len = data.columns.length; i < len; i++) {
                    if (!data.columns[i].search.value) delete data.columns[i].search;
                    if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                    if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                    if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                }
                delete data.search.regex;
            }
        },
        "columns": [{
            "name": "id",
            "data": "id",
            "title": "id",
            "visible": true,
            "orderable": true,
            "searchable": true
        }, {
            "name": "page_name",
            "data": "page_name",
            "title": "page_name",
            "orderable": true,
            "searchable": true
        }, {
            "name": "page_url",
            "data": "page_url",
            "title": "page_url",
            "searchable": false,
            "orderable": true
        }, {
            "name": "created_at",
            "data": "created_at",
            "title": "Created At",
            "orderable": true,
            "searchable": true
        }, {"name": "updated_at", "data": "updated_at", "title": "Updated At", "orderable": true, "searchable": true}],
        "drawCallback": function () {
        },
        "initComplete": function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                    .on("change", function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
            });
        },
        "paging": true,
        "searching": true,
        "info": false,
        "orderable": true,
        "dom": "Bfrtip",
        "columnDefs": ["{ \"searchable\"=> false,\n    \"targets\"=>0\n    }"],
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
    });
})(window, jQuery);