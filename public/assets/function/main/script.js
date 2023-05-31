function viewRender(endpoint) {
    $.ajax({
        type: "get",
        url: endpoint,
        dataType: "json",
        success: function (response) {
            $(".render").html(response.data);
        },
        error: function (error) {
            console.log("Error", error);
        },
    });
}

function handleErrorMessages(errors) {
    let formName = [];
    let errorName = [];

    $.each($("#form").serializeArray(), function (i, field) {
        formName.push(field.name.replace(/\[|\]/g, ""));
    });

    $.each(errors, function (key, value) {
        errorName.push(key);

        // Check if the error is related to a required field
        if (value.includes("The " + key + " field is required.")) {
            if ($("." + key).val() == "") {
                $("." + key).addClass("is-invalid");
                $(".error-" + key).html(value);
            }
        } else {
            // Display other validation errors
            $("." + key).addClass("is-invalid");
            $(".error-" + key).html(value);
        }
    });

    // Remove "is-invalid" class for fields without errors
    $.each(formName, function (i, field) {
        $.inArray(field, errorName) == -1
            ? $("." + field).removeClass("is-invalid")
            : $("." + field).addClass("is-invalid");
    });
}

function sendPostForm(endpoint) {
    let splitEndpoint = endpoint.split("/");
    let saveOrUpdate = ["store", "update"];

    // if ($.inArray(splitEndpoint[1], saveOrUpdate)) {
    let newNewEndpoint = splitEndpoint[0] + "/render";
    // }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let form = $("#form")[0];
    let data = new FormData(form);
    $.ajax({
        type: "POST",
        url: endpoint,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
            $("#form").trigger("reset");
            $(".invalid-feedback").html("");

            viewRender(newNewEndpoint);
            Swal.fire(response.title, response.message, response.status);
        },
        error: function (error) {
            if (error.status === 422 && error.responseJSON.errors)
                handleErrorMessages(error.responseJSON.errors);
        },
    });
}
