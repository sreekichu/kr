<?php
$db=mysqli_connect('localhost','root','','demo');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
      #d1{
        position:absolute;
        background-color:violet;left:469px;
        width:287px;height:280px;top:12px;
        border-radius:10px;
        border:black 3px solid;
        box-shadow:2px 2px  65px rgb(14, 25, 232) ;
        transition:1s ease-in-out;
        /* padding:23px; */
      }
      /* #d1:hover{
        transform:scale(1.5);
      } */
       #b1{
position:absolute;box-shadow: 2px 2px 15px rgb(30, 213, 20);border-radius:10px; top:223px;margin-left:98px;border:black 3px solid;
       }
      #b1:hover{
        background-color:green;
         transform:scale(0.9);
         opacity:transparent;
         box-shadow: 2px 2px 15px rgb(14, 25, 232)  ; 
      }
      </style>
</head>
<body>
  <div id="d1">
    <form method="post">
      <h1  style="position:absolute; margin-left:47px;"> Register</h1>
        <input type="text" name="name" placeholder="set name" style="position:absolute;border-radius:10px;margin-left:47px;top:103px;border:black 3px solid;"><br><br>
          <input type="password" name="password" placeholder="set password" style="position:absolute;;margin-left:47px;border-radius:10px;top:156px;border:black 3px solid;"><br><br>
          <button type="submit" id="b1" name="submit" class="btn btn-warning">Submit</button>
</div>
</form>
<?php
if(isset($_POST['submit'])){
$name=$_POST['name'];
$password=$_POST['password'];
$hash=password_hash($password,PASSWORD_DEFAULT);
$sql=mysqli_query($db,"update login set username='$name',password='$hash'");
if($sql)
  echo"successfull";
else
   echo"not successfull";

}
?>
</body>
</html>