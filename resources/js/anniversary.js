"use strict";

$(document).ready(function () {
    $(".edit").click(function () {
        let tr = $(this).parent().parent();
        let id = $(this).data("id");
        let url = $("#editAnniversaryModal form")
            .data("edit-url")
            .replace(/\d+/, id);
        $("#editAnniversaryModal form").attr("action", url);

        let ann_type = tr.find("td:nth-child(3)").data("val");
        $("#editAnniversaryModal form [name='anniversary_type']").val(ann_type);

        let date = tr.find("th:nth-child(1)").data("jalali");
        $("#editAnniversaryModal form [name='anniversary_date']").val(date);

        let ann_importance = tr.find("td:nth-child(5)").data("val");
        console.log(ann_importance);
        $("#editAnniversaryModal form [name='importance']").val(ann_importance);

        let description = tr.find("td:nth-child(4)").html();
        $("#editAnniversaryModal form [name='description']").val(description);
    });
    $(".add-form-btn").click(function () {
        $("#editAnniversaryModal form")[0].reset();
        let url = $("#editAnniversaryModal form").data("add-url");
        $("#editAnniversaryModal form").attr("action", url);
    });

    $(".delete").click(function () {
        let id = $(this).data("id");
        let url = $("#deleteanniversaryModal form")
            .attr("action")
            .replace(/\d+/, id);
        $("#deleteanniversaryModal form").attr("action", url);
    });
});
