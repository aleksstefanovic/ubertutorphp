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
