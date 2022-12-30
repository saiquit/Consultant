require("./bootstrap");

$(document).ready(function () {
    $.ajax({
        type: "post",
        url: "/request-service",
        data: {
            _token: $("meta[name=csrf-token]").attr("content"),
        },
        // dataType: "dataType",
        success: function (response) {
            var options = "";
            var options_nice = "";
            JSON.parse(response).forEach((item) => {
                options += `<option value="${item["id"]}">${item["name"]}</option>`;
                options_nice += `<li data-value="${item["id"]}" class="option selected focus">${item["name"]}</li>`;
            });
            // console.log(options_nice);
            $('[name="services"]').append(options);
            $(".nice-select ul").append(options_nice);
        },
    });
});
