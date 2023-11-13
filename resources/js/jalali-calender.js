const jalaaliCon = require("jalaali-js");

$(document).ready(function () {
    jalaliDatepicker.startWatch({
        zIndex: 1100,
    });

    $("#profile-update-form").submit(function (e) {
        let input = $("#jalaliDate");
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
