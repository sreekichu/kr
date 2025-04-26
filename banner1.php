<?php
$db=mysqli_connect('localhost','root','','demo');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<style>
    #b1{
        position:absolute; background-color:blue;top:229px;margin-left:521px;border-radius:12px; width:74px;height:39px;
    }
    #b1:hover{
        background-color:yellow;
    }
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
    </style>

<body>

    <div style=" position:absolute;top:61px;background-color:grey; width:1042px; height:634px;margin-left:171px;">
        <div class="container"
            style=" position:absolute;background-color:white; width:971px; top:34px;height:634px;margin-left:36px;">
            <h5 style="position:absolute;font-size:20px;top:-18px;margin-left:17px;">Banner</h5>
            <form method="post" enctype="multipart/form-data">
            <div style="position:absolute; margin-left:266px;top:149px;">
                <label style="position:absolute; top:67px; margin-left:12px;"> Background Image*</label>
                <input type="file" name="photo1"  style="position:absolute; width:175px; height:23px; top:102px;margin-left:12px;">
            </div>
            <div style="position:absolute;">
                <label style="position:absolute; top:67px; margin-left:12px;"> Title1*</label>
                <input type="text" name="title1" style="position:absolute; width:175px; height:23px; top:102px;margin-left:12px;">
            </div>
            <div style="position:absolute; margin-left:231px;">
                <label style="position:absolute; top:67px; margin-left:12px;"> Description*</label>
                <input type="text" name="description" style="position:absolute; width:175px; height:23px; top:102px;margin-left:12px;">
            </div>
            
            <div style="position:absolute; margin-left:497px;top:-1px;">
                <label style="position:absolute; top:67px; margin-left:12px;"> Button1*</label>
                <input type="text" name="button1"  style="position:absolute; width:175px; height:23px; top:102px;margin-left:12px;">
            </div>
            <div style="position:absolute; margin-left:1px;top:149px;">
                <label style="position:absolute; top:67px; margin-left:12px;"> Button2*</label>
                <input type="text"  name="button2" style="position:absolute; width:175px; height:23px; top:102px;margin-left:12px;">
            </div>
          
            <button   type="submit" name="btn"  id="b1">Submit</button>
</form>

<br>
<table   style="position:absolute;top:434px;margin-left:97px;">
    <thead>
        <tr>
            <th>ID </th>
            <th>Background IMAGE</th>
            <th>TITLE1</th>
            <th>Description</th>
            <th>BUTTON 1 </th>
            <th>BUTTON 2 </th>
            
</tr>
</thead>
<tbody>

    <tr>
        <?php 
        $sql=mysqli_query($db,"select * from banner1");
        while($row=mysqli_fetch_row($sql)){
        ?>
    
    <td><?php echo $row[0] ?></td>
    <td><img src="adminimages/<?php echo $row[1]?>?>" width="100" height="100" alt="loading"></td>
    <td><?php echo $row[2] ?></td>
    <td><?php echo $row[3] ?></td>
    <td><?php echo $row[4] ?></td>
    <td><?php echo $row[5] ?></td>
        </tr>
        <?php
        }
        ?>
</tbody>
</table>
        </div>

    </div>
    <?php
    if(isset($_POST['btn']))
{
    $title1=addslashes($_POST['title1']);
    $description=addslashes($_POST['description']);
     $button1=addslashes($_POST['button1']);
     $button2=addslashes($_POST['button2']);
    // $ins=mysqli_query($db,"insert into employee values('0','$name','$age','$salary')");
    //*** */ image1
  $fileName=$_FILES['photo1']['name'];
   

 
    $fileTmpPath = $_FILES['photo1']['tmp_name'];
       
        $fileSize = $_FILES['photo1']['size'];
        $fileType = $_FILES['photo1']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName1 = md5(time() . $fileName) . '.' . $fileExtension;
        
        
        
        $allowedfileExtensions = array('jpg', 'gif', 'png','jpeg','webp');
        if (in_array($fileExtension, $allowedfileExtensions))
         {
        $uploadFileDir = "./adminimages/"; 
        $dest_path = $uploadFileDir . $newFileName1;
        $pd=date("d/m/y");
        
        
        list($width, $height, $type, $attr) = getimagesize($fileTmpPath);
           
        
      if($width>="110" && $height>="110")
       {
        move_uploaded_file($fileTmpPath, $dest_path);
        

        $ins=mysqli_query($db,"insert into banner1 values('0','$newFileName1','$title1','$description','$button1','$button2')");
        msg("Sucessfully updated","banner1.php");
               
      
          
          
      }
      else
     {
      
      
       echo("image size should be between 500 & 550");
     }
  }
  else
      {
      
      
       echo("Image extension should be jpg or png");
      }

     
      
}
?>

<?php


function msg($a,$b)
{
echo "<script language='javascript'>alert('$a');window.location='$b';</script>";
}
?>

</body>

</html>