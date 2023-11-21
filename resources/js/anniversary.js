"use strict";

$(document).ready(function () {
    $(".edit").click(function () {
        let tr = $(this).parent().parent();
        let id = $(this).data("id");
        let url = $("#editAnniversaryModal form")
            .attr("action")
            .replace(/\d+/, id);
        $("#editAnniversaryModal form").attr("action", url);

        let date = tr.find("td:nth-child(2)").html();
        $("#editAnniversaryModal form [name='anniversary_date']").attr(
            "placeholder",
            date
        );

        let description = tr.find("td:nth-child(4)").html();
        $("#editAnniversaryModal form [name='description']").val(description);

        let ann_type = tr.find("td:nth-child(1)").data("val");
        $("#editAnniversaryModal form [name='anniversary_type']").val(ann_type);

        let ann_importance = tr.find("td:nth-child(3)").data("val");
        $("#editAnniversaryModal form [name='importance']").val(ann_importance);
    });

    $(".delete").click(function () {
        let id = $(this).data("id");
        let url = $("#deleteanniversaryModal form")
            .attr("action")
            .replace(/\d+/, id);
        $("#deleteanniversaryModal form").attr("action", url);
    });
});
