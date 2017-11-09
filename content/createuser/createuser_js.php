<script>

    function checkRole () {
        var roleDropDown = document.getElementById("createUserRole");
        var role = roleDropDown.value;

        var createUserCostPerHour = document.getElementById("createUserCostPerHour");
        if (role == 1) {
            createUserCostPerHour.style.display = "none";
        }
        else {
            createUserCostPerHour.style.display = "";
        }
    } 

</script>
