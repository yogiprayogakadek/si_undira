$(document).ready(function () {
    viewRender("pasien/render");

    $("body").on("click", ".btn-add", function () {
        viewRender("pasien/create");
    });

    $("body").on("click", ".btn-data", function () {
        viewRender("pasien/render");
    });

    $("body").on("click", ".btn-save", function (e) {
        sendPostForm("pasien/store");
    });

    $("body").on("click", ".btn-edit", function (e) {
        viewRender("pasien/edit/" + $(this).data("id"));
    });

    $("body").on("click", ".btn-update", function (e) {
        sendPostForm("pasien/update");
    });
});
