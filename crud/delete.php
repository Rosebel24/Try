<?php
    require('./source.php');

    if (isset($_POST['delete'])){
        $deleteID = $_POST['deleteID'];

        $queryDelete = "DELETE FROM contactinfo WHERE contact_id = $deleteID";
        $sqlDelete = mysqli_query($connection, $queryDelete);

        echo '<script>window.location.href = "../crud"</script>';
    }