<?php
require_once('./operations.php');
// include('./show.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Image Upload in Database</title>
</head>
<body>
    <h1 class="text-center my-3">Registration Form</h1>
    <div class="container d-flex justify-content-center">
        <form action="show.php" enctype="multipart/form-data" method="post" class="w-50">
            <?php 
            
            inputFields("Username","name","","text");?>
            <?php inputFields("Phone Number","phone","","text"); ?>
           <?php inputFields("","file","","file"); ?>
            
            
            <button class="btn btn-dark py-2" type="submit"
            name="submit">Submit</button>

        </form>
    </div>

</body>
</html>