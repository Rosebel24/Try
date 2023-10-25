<?php
    require('./source.php');

    $contact_query = "SELECT * FROM contactinfo";
    $sqlContact = mysqli_query($connection, $contact_query);