"use strict";
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).ready(function () {
    $("#copy-button").click(function () {
        let input = $("#invitation-link");
        let text = input.val();
        navigator.clipboard.writeText(text);

        let successMessage = "لینک کپی شد";

        input
            .parent()
            .after(
                '<div class="alert alert-success" role="alert" id="text-copied-alert">' +
                    successMessage +
                    "</div>"
            );
        setTimeout(function () {
            $("#text-copied-alert").remove();
        }, 1200);
    });

    $("#url-added-btn").click(function (e) {
        e.preventDefault();
        let urlInput = $("#url-input");
        let url = urlInput.val();
        $("#product-url").val(url);
        $("#product-url-show").html(decodeURI(url));
        if (url.length == 0) {
            $("#product-detail").css("display", "none");
        } else {
            $("#url-added-btn-spin").css("visibility", "visible");
            $.post(
                base_url + "/wish-list/og-info",
                { url: url },
                function (data, status) {
                    $("#url-added-btn-spin").css("visibility", "hidden");

                    $(".alert-danger").remove();
                    if (data.message === undefined) {
                        //show & hide forms
                        $("#product-detail").css("display", "flex");
                        $("#url-box").css("display", "none");

                        // fill the inputs
                        if (data.image) {
                            console.log("ddd");
                            $("#product-image").attr("src", data.image);
                            $("#image_url").val(data.image);
                        }
                        $("#product-title").val(data.title);
                        $("#product-description").val(data.description);
                    } else {
                        urlInput.after(
                            '<div class="alert alert-danger" role="alert">' +
                                data.message +
                                "</div>"
                        );
                    }
                }
            );
        }
    });
}); //end of ready function

class SortableTable {
    constructor(tableNode) {
        this.tableNode = tableNode;

        this.columnHeaders = tableNode.querySelectorAll("thead th");

        this.sortColumns = [];

        for (var i = 0; i < this.columnHeaders.length; i++) {
            var ch = this.columnHeaders[i];
            var buttonNode = ch.querySelector("button");
            if (buttonNode) {
                this.sortColumns.push(i);
                buttonNode.setAttribute("data-column-index", i);
                buttonNode.addEventListener(
                    "click",
                    this.handleClick.bind(this)
                );
            }
        }

        this.optionCheckbox = document.querySelector(
            'input[type="checkbox"][value="show-unsorted-icon"]'
        );

        if (this.optionCheckbox) {
            this.optionCheckbox.addEventListener(
                "change",
                this.handleOptionChange.bind(this)
            );
            if (this.optionCheckbox.checked) {
                this.tableNode.classList.add("show-unsorted-icon");
            }
        }
    }

    setColumnHeaderSort(columnIndex) {
        if (typeof columnIndex === "string") {
            columnIndex = parseInt(columnIndex);
        }

        for (var i = 0; i < this.columnHeaders.length; i++) {
            var ch = this.columnHeaders[i];
            var buttonNode = ch.querySelector("button");
            if (i === columnIndex) {
                var value = ch.getAttribute("aria-sort");
                if (value === "descending") {
                    ch.setAttribute("aria-sort", "ascending");
                    this.sortColumn(
                        columnIndex,
                        "ascending",
                        ch.classList.contains("num")
                    );
                } else {
                    ch.setAttribute("aria-sort", "descending");
                    this.sortColumn(
                        columnIndex,
                        "descending",
                        ch.classList.contains("num")
                    );
                }
            } else {
                if (ch.hasAttribute("aria-sort") && buttonNode) {
                    ch.removeAttribute("aria-sort");
                }
            }
        }
    }

    sortColumn(columnIndex, sortValue, isNumber) {
        function compareValues(a, b) {
            if (sortValue === "ascending") {
                if (a.value === b.value) {
                    return 0;
                } else {
                    if (isNumber) {
                        return a.value - b.value;
                    } else {
                        return a.value < b.value ? -1 : 1;
                    }
                }
            } else {
                if (a.value === b.value) {
                    return 0;
                } else {
                    if (isNumber) {
                        return b.value - a.value;
                    } else {
                        return a.value > b.value ? -1 : 1;
                    }
                }
            }
        }

        if (typeof isNumber !== "boolean") {
            isNumber = false;
        }

        var tbodyNode = this.tableNode.querySelector("tbody");
        var rowNodes = [];
        var dataCells = [];

        var rowNode = tbodyNode.firstElementChild;

        var index = 0;
        while (rowNode) {
            rowNodes.push(rowNode);
            var rowCells = rowNode.querySelectorAll("th, td");
            var dataCell = rowCells[columnIndex];

            var data = {};
            data.index = index;
            data.value = $(dataCell).data("sort-value");
            if (isNumber) {
                data.value = parseFloat(data.value);
            }
            dataCells.push(data);
            rowNode = rowNode.nextElementSibling;
            index += 1;
        }

        dataCells.sort(compareValues);

        // remove rows
        while (tbodyNode.firstChild) {
            tbodyNode.removeChild(tbodyNode.lastChild);
        }

        // add sorted rows
        for (var i = 0; i < dataCells.length; i += 1) {
            tbodyNode.appendChild(rowNodes[dataCells[i].index]);
        }
    }

    /* EVENT HANDLERS */

    handleClick(event) {
        var tgt = event.currentTarget;
        this.setColumnHeaderSort(tgt.getAttribute("data-column-index"));
    }

    handleOptionChange(event) {
        var tgt = event.currentTarget;

        if (tgt.checked) {
            this.tableNode.classList.add("show-unsorted-icon");
        } else {
            this.tableNode.classList.remove("show-unsorted-icon");
        }
    }
}

// Initialize sortable table buttons
window.addEventListener("load", function () {
    var sortableTables = document.querySelectorAll("table.sortable");
    for (var i = 0; i < sortableTables.length; i++) {
        let table = new SortableTable(sortableTables[i]);
        table.setColumnHeaderSort(1);
    }
});
