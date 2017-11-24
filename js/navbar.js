function searchTutors () {
    var searchFilter = document.getElementById("searchFilter").value;
    if (!searchFilter) {
        searchFilter = document.getElementById("searchFilter-mobile").value;
    }
    window.open("/content/tutors/tutors.php?searchFilter=" + searchFilter, "_self");
}

function expandNav () {
    var width = window.innerWidth;
    if (width < 600) {
        var isHidden = $("#main").attr("hidden");
        if (isHidden) {
            $("#main").attr("hidden", false);
            $("#navcol").attr("class", "col-1");
        }
        else {
            $("#main").attr("hidden", true);
            $("#navcol").attr("class", "col");
        }
    }
}

window.onload = function responsiveNav () {
    var width = window.innerWidth;
    //alert ("reacting");

    if (width < 600) {
        $("#mobile-search").attr("hidden", false);
        $("#mobile-signin").attr("hidden", false);
        $("#full-search").attr("hidden", true);
        $("#full-signin").attr("hidden", true);

        //alert ("mobile");
    }
    else {
        $("#mobile-search").attr("hidden", true);
        $("#mobile-signin").attr("hidden", true);
        $("#full-search").attr("hidden", false);
        $("#full-signin").attr("hidden", false);

        //alert ("full");
    }
}
