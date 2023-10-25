<?php
    require('./read.php');

    if (isset($_POST['submit'])) {
        $contact_fname = $_POST['fname'];
        $contact_lname = $_POST['lname'];
        $contact_email = $_POST['email'];
        $contact_address = $_POST['address'];

        $sql = "insert into `contactinfo` (contact_fname, contact_lname, contact_email, contact_address)
    values('$contact_fname', '$contact_lname', '$contact_email', '$contact_address')";
        $result = mysqli_query($connection, $sql); 

        echo '<script> window.location.href = "./crud"</script>';
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact form</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="bg">
        <div class="container bg-white my-5" style="border-radius: 5px; width: 1000px;">
        <form method = "POST">

            <div class="row">
                <div class="col mx-5">
                    <h1 class="text-center m-5">Contact form</h1>
                    
                    <div class="row mb-4">
                        <div class="col name">
                            <label for="firstname" class="form-label">First name</label>
                            <input type="text" id="firstname" class="form-control" aria-label="First name" name="fname"required>
                        </div>

                        <div class="col name">
                            <label for="lastname" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastname" aria-label="Last name" name="lname" required>
                        </div>
                    </div>


                    <label for="email" class="form-label">Email address</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="email" aria-describedby="basic-addon2" name="email"required>
                        <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" rows="3" name="address"required></textarea>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="submit" class="submit mb-1 p-2" name="submit"> 
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>  


        <div class="container bg-white d-flex justify-content-center" style="width:1000px; height: 100%; margin-bottom:100px; border-radius: 5px;" >
            <div class="row">
                <div class="col mx-5">
                    <h1 class="text-center m-5 px-5">Contact List</h1>
                    <table class="table">
                    <thead>

                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First name</th>
                          <th scope="col">Last name</th>
                          <th scope="col">Email address</th>
                          <th scope="col">Address</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while ($results = mysqli_fetch_array($sqlContact)) { ?>
                        <tr>
                          <th scope="row"><?php echo $results['contact_id']?></th>
                          <td><?php echo $results['contact_fname']?></td>
                          <td><?php echo $results['contact_lname']?></td>
                          <td><?php echo $results['contact_email']?></td> 
                          <td><?php echo $results['contact_address']?></td>
                        <td class="buttons">
                            <form action ="./delete.php" method="POST">
                                <input type="submit" class="btn btn-danger delete" name="delete" value="delete">
                                <input type="hidden" class="btn btn-danger delete" name="deleteID" value="<?php echo $results['contact_id']?>">
                            </form>
                        </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>    
                </div>
            </div>
        </div>
        
        <!-- <footer class="bg-warning text-center" style="position:absolute; bottom:0; width: 100%;">
            <h6 class= "bg-warning text-black my-3">Yudifooter 2023</h6>
        </footer> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>