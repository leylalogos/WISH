"use strict";

$(document).ready(function () {
    $(".edit").click(function () {
        let tr = $(this).parent().parent();
        let id = $(this).data("id");
        let url = $("#editModal form").data("edit-url").replace(/\d+/, id);
        $("#editModal form").attr("action", url);

        let importance = tr.find("td:nth-child(5)").data("val");
        $("#editModal form [name='importance']").val(importance);

        let description = tr.find("td:nth-child(4)").html();
        $("#editModal form [name='description']").val(description);

        if ($(this).data("type") == "event") {
            let date = tr.find("th:nth-child(1)").data("jalali");
            $("#editModal form [name='date']").val(date);

            let title = tr.find("td:nth-child(3)").data("val");
            console.log(title);
            $("#editModal form [name='title']").val(title);
        } else {
            // type == 'anniversary'

            let ann_type = tr.find("td:nth-child(3)").data("val");
            $("#editModal form [name='anniversary_type']").val(ann_type);

            let date = tr.find("th:nth-child(1)").data("jalali");
            $("#editModal form [name='anniversary_date']").val(date);
        }
    });

    $(".add-form-btn").click(function () {
        let form = $("#editModal form");
        form[0].reset();
        let url = form.data("add-url");
        form.attr("action", url);
    });

    $(".delete").click(function () {
        let id = $(this).data("id");
        let url = $("#deleteanniversaryModal form")
            .attr("action")
            .replace(/\d+/, id);
        $("#deleteanniversaryModal form").attr("action", url);
    });
});
