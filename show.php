<?php
include('./connect.php');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $images=$_FILES['file'];//two dimensional global associative array
echo $name.$phone;
print_r($images);
$imgFileName=$images['name'];
$imgError=$images['error'];
$imgFileTemp=$images['tmp_name'];
echo $imgFileName." ".$imgError." ".$imgFileTemp;
$filename_separate=explode('.',$imgFileName);
print_r($filename_separate);
// $file_extension=strtolower($filename_separate[1]);
$file_extension=strtolower(end($filename_separate));
print_r($file_extension);
$extensions=array('jpg','jpeg','png');
if(in_array($file_extension,$extensions)){
    $upload_image='images/'.$imgFileName;
    move_uploaded_file($imgFileTemp,$upload_image);
    $sql="insert into `users`(name,phone,image) values('$name','$phone','$upload_image')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo '<div class="alert alert-success" role="alert"><strong>Success! </strong>Data Inserted Successfully</div> ';
    }else{
        die(mysqli_error($con));
    }
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Display Data</title>

</head>
<body>
  <h1 class="text-center my-4">User Data</h1>
  <div class="container mt-5 d-flex justify-content-center">
  <table class="table table-bordered ">
  <thead class="table-dark">
    <tr>
      <th scope="col">Sl. No</th>
      <th scope="col">Username</th>
      <th scope="col">Image</th>
    </tr>
  </thead >
  <tbody>
    <?php
    $sql="select * from `users`";
    $r=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($r)){
        $id=$row['id'];
        $name=$row['name'];
        $image=$row['image'];
        echo '<tr>
        <td>'.$id.'</td>
        <td>'.$name.'</td>
        <td><img src="'.$image.'" width="100px" height="100px"/></td>
      </tr>';
    }
    
    
    ?>

  </tbody>
</table>
  </div>
</body>
</html>