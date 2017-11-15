<script> 

    function deleteAccount () {
       var confirmation = confirm ("Are you sure you want to delete your account?");
        if (confirmation) {
            window.open ("/content/profile/process_profile_delete.php", "_self");
        }
    }

</script>
