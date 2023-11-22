const jalaaliCon = require("jalaali-js");

$(document).ready(function () {
    jalaliDatepicker.startWatch({
        zIndex: 1700,
        container: "#editAnniversaryModal",
        selector: "#jdp-edit",
    });

    // jalaliDatepicker.startWatch({
    //     zIndex: 1700,
    //     container: "#editAnniversaryModal",
    //     selector: "#jdp-edit",
    // });

    $(".jalali-form").each(function () {
        $(this).submit(function (e) {
            let input = $(this).find("input[data-jdp]");
            let jalaliString = input.val();
            if (jalaliString.length === 0) {
                return true;
            }
            let jalaliSplited = jalaliString.split("/");
            let georgianDate = jalaaliCon.toGregorian(
                parseInt(jalaliSplited[0]),
                parseInt(jalaliSplited[1]),
                parseInt(jalaliSplited[2])
            );
            let georgianStringDate =
                georgianDate.gy + "/" + georgianDate.gm + "/" + georgianDate.gd;
            input.val(georgianStringDate);
        });
    });
});
