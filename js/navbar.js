function searchTutors () {
    window.open("/content/tutors/tutors.php", "_self");
}

function expandNav () {
    var width = window.innerWidth;
    if (width < 600) {
        var isHidden = $("#main").attr("hidden");
        if (isHidden) {
            $("#main").attr("hidden", false);
        }
        else {
            $("#main").attr("hidden", true);
        }
    }
}
