<?php
$db=mysqli_connect("localhost","root","","demo") or die(mysqli_error());
?>
    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
  <body>

  <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            // echo $id;
            $qre=mysqli_query($db,"select * from employee where id=$id");
            while($rql=mysqli_fetch_row($qre)){
        
        ?>   
  

        <!--** form ** -->
<form action="" method="post" enctype="multipart/form-data" >  
<label >Enter id</label>   
<input type="text" name="id" value="<?php echo $rql['0'] ?>"><br><br>
<label >Enter name</label>
    <input type="text" name="name" value="<?php echo $rql['1'] ?>"><br><br>
        <label >Enter Age</label>
        <input type="text" name="age" value="<?php echo $rql[2] ?>"><br><br>
        <label >Enter Salary</label>
        <input type="text" name="salary" value="<?php echo $rql[3] ?>"><br><br>
       
        <input type="file"  name="img1" value="<?php echo $rql["4"]?>">
        <img width="100" height="50" src="./img/<?php echo $rql[4]?>" alt=""><br>
        <input type="file"  name="img2" value="<?php echo $rql["5"]?>">
        <img width="100" height="50" src="./img/<?php echo $rql[5]?>" alt=""><br>
         <button  name="btn" class="btn btn-primary">delete</button> 
        <button  name="btn" class="btn btn-primary">Submit</button>
 </form>
 <!-- *form* -->



              <?php
            }
            ?>
            <?php
            }
            ?>




<!-- php code for updation -->
  <?php
    if(isset($_POST['btn']))
    {
    // $id=addslashes($_POST['id']);
    $name=addslashes($_POST['name']);

    $age=addslashes($_POST['age']);
    $salary=addslashes($_POST['salary']);
   

    $ins2=mysqli_query($db,"update employee  set  name='$name', age='$age', salary='$salary' where id='$id' ");
                
                Header("Location:employeedetails.php");

                $fileName1=$_FILES['img1']['name'];
                $fileName2=$_FILES['img2']['name'];
                
                
            
            //img1
            if(isset($_FILES['img1']['name']) && $_FILES['img1']['name']!="")
            {
            $fileTmpPath1 = $_FILES['img1']['tmp_name'];
            
            $fileSize1 = $_FILES['img1']['size'];
            $fileType1 = $_FILES['img1']['type'];
            $fileNameCmps1 = explode(".", $fileName1);
            $fileExtension1 = strtolower(end($fileNameCmps1));
            $newFileName1 = md5(time() . $fileName1) . '.' . $fileExtension1;
            
            
            $allowedfileExtensions1 = array('jpg', 'gif', 'png','jpeg');
            if (in_array($fileExtension1, $allowedfileExtensions1))
            {
            $uploadFileDir1 = "./img/"; 
            $dest_path1 = $uploadFileDir1 . $newFileName1;
            
            
            list($width, $height, $type, $attr) = getimagesize($fileTmpPath1);
               
            
            if($width=="550" && $height=="500")
            {
            
            
            move_uploaded_file($fileTmpPath1, $dest_path1);
            
            // $res2=mysqli_query($db,"update employee set image1='$newFileName1'");
            $ins3=mysqli_query($db,"update employee  set  name='$name', age='$age', salary='$salary', image1='$newFileName1' where id='$id' ");
    header("Location:employeedetails.php");
            }
            else
            {
            
            
                msg("Image Size should be in width - 50px & height - 50px", "hfooter.php");
            }
            
            }
            else
            {
            
            
            msg("Image extension should be jpg or png", "hfooter.php");
            }
            }
            
               
            //img2
            if(isset($_FILES['img2']['name']) && $_FILES['img2']['name']!="")
            {
            $fileTmpPath2 = $_FILES['img2']['tmp_name'];
            
            $fileSize2 = $_FILES['img2']['size'];
            $fileType2 = $_FILES['img2']['type'];
            $fileNameCmps2 = explode(".", $fileName2);
            $fileExtension2 = strtolower(end($fileNameCmps2));
            $newFileName2 = md5(time() . $fileName2) . '.' . $fileExtension2;
            
            
            $allowedfileExtensions2 = array('jpg', 'gif', 'png','jpeg');
            if (in_array($fileExtension2, $allowedfileExtensions2))
            {
            $uploadFileDir2 = "./img/"; 
            $dest_path2 = $uploadFileDir2 . $newFileName2;
            
            
            list($width, $height, $type, $attr) = getimagesize($fileTmpPath2);
               
            
            if($width=="550" && $height=="500")
            {
            
            
            move_uploaded_file($fileTmpPath2, $dest_path2);
            
            // $res3=mysqli_query($db,"update employee set image2='$newFileName2'  ");
            $ins4=mysqli_query($db,"update employee  set  name='$name', age='$age', salary='$salary', image2='$newFileName2' where id='$id' ");
            header("Location:employeedetails.php");
            }
            else
            {
            
            
                msg("Image Size should be in width - 50px & height - 50px", "hfooter.php");
            }
            
            }
            else
            {
            
            
            msg("Image extension should be jpg or png", "hfooter.php");
            }
            }
echo"insertion success";
}

    ?>

<!-- php code for updation-->



  </body>
 
</html>