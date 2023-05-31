$(document).ready(function () {
    viewRender("kunjungan/render");

    $("body").on("click", ".btn-add", function () {
        viewRender("kunjungan/create");
    });

    $("body").on("click", ".btn-data", function () {
        viewRender("kunjungan/render");
    });

    $("body").on("click", ".btn-save", function (e) {
        sendPostForm("kunjungan/store");
    });

    $("body").on("click", ".btn-edit", function (e) {
        viewRender("kunjungan/edit/" + $(this).data("id"));
    });

    $("body").on("click", ".btn-update", function (e) {
        sendPostForm("kunjungan/update");
    });

    $("body").on("change", ".pasien_id", function () {
        let pasien_id = $("select[name=pasien_id] option")
            .filter(":selected")
            .val();

        if (pasien_id != "") {
            $(".btn-save").prop("disabled", false);
            $(".hidden-input").prop("hidden", false);
            $.get("kunjungan/data-pasien/" + pasien_id, function (data) {
                $("input[name=umur]").val(data.umur).prop("disabled", true);
                $(".jenis_kelamin")
                    .val(data.jenis_kelamin)
                    .prop("disabled", true);
                $(".alamat").text(data.alamat).prop("disabled", true);
                $("input[name=nik]").val(data.nik).prop("disabled", true);
                $("input[name=rm]").val(data.nomor_rm).prop("disabled", true);
            });
        } else {
            $(".btn-save").prop("disabled", true);
            $(".hidden-input").prop("hidden", true);
            $("#form").trigger("reset");
        }
    });
});
