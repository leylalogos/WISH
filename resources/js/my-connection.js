$(document).ready(function () {
    $(".nav-link").each(function () {
        if ($(this).attr("href") == window.location.href) {
            $(this).addClass("active");
        }
    });
});
