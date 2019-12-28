<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="idusnew";
$Rollno="";
$fname="";
$lname="";
$telno="";
$email="";
 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
//connect to mysql database
try{
$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
echo("error in connecting");
}
//get data from the form
function getData()
{
$data = array();
$data[1]=$_POST['fname'];
$data[2]=$_POST['lname'];
$data[3]=$_POST['tel_no'];
$data[4]=$_POST['email'];
return $data;
}
//search
if(isset($_POST['search']))
{
$info = getData();
$search_query="SELECT * FROM idusnew WHERE Rollno = '$info[0]'";
$search_result=mysqli_query($conn, $search_query);
if($search_result)
{
if(mysqli_num_rows($search_result))
{
while($rows = mysqli_fetch_array($search_result))
{
$Rollno = $rows['Rollno'];
$fname = $rows['fname'];
$lname = $rows['lname'];
$address = $rows['tel_no'];
$email = $rows['email'];
 
}
}else{
echo("no data are available");
}
} else{
echo("result error");
}
 
}
//insert
if(isset($_POST['insert'])){
$info = getData();
$insert_query="INSERT INTO `idusnew`(`fname`, `lname`, `tel_no`, `email`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]')";
try{
$insert_result=mysqli_query($conn, $insert_query);
if($insert_result)
{
if(mysqli_affected_rows($conn)>0){
echo("data inserted successfully");
 
}else{
echo("data are not inserted");
}
}
}catch(Exception $ex){
echo("error inserted".$ex->getMessage());
}
}
//delete
if(isset($_POST['delete'])){
$info = getData();
$delete_query = "DELETE FROM `idusnew` WHERE Rollno = '$info[0]'";
try{
$delete_result = mysqli_query($conn, $delete_query);
if($delete_result){
if(mysqli_affected_rows($conn)>0)
{
echo("data deleted");
}else{
echo("data not deleted");
}
}
}catch(Exception $ex){
echo("error in delete".$ex->getMessage());
}
}
//edit
if(isset($_POST['update'])){
$info = getData();
$update_query="UPDATE `idusnew` SET `fname`='$info[1]',lname='$info[2]',address='$info[3]',email='$info[4]' WHERE Rollno = '$info[0]'";
try{
$update_result=mysqli_query($conn, $update_query);
if($update_result){
if(mysqli_affected_rows($conn)>0){
echo("data updated");
}else{
echo("data not updated");
}
}
}catch(Exception $ex){
echo("error in update".$ex->getMessage());
}
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>=GCP_Cinema=/Member</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">GCP Cinema</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ticket.html">Ticket</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="idusnew.php">Member</a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container">
        <h1 class="mt-4 mb-3">GCP Cinema <small> Membership</small></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">MEMBERSHIP</li>
        </ol>

    <head>
    <title>MEMBER FORM</title>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    </head>
<body>
<div is="page" id="home" data-role="page">
                <div data-role="header" data-position="fixed" style="background:-webkit-linear-gradient(#05000c,#050005);">
                <h1 style="color:Yellow;text-align:center;font-size:30px;">BECOME A MEMBER</h1>
                </div>
                <div is="content" role="main" class="ui-content">
                      <img src="https://cdn.cinemacloud.co.uk/imagePage/84_0_3.jpg" alt="" style="width:100%;">      
                </div>
<div align="left">
<form class="form-horizontal" action="" method="post" action="idusnew.php">

<input type="text" name="fname" placeholder="First Name" value="<?php echo($fname);?>"><br><br>
<input type="text" name="lname" placeholder="Last Name" value="<?php echo($lname);?>"><br><br>
<input type="number" name="tel_no" placeholder="Telephone No" value="<?php echo($tel_no);?>"><br><br>
<input type="text" name="email" placeholder="example@example.com" value="<?php echo($email);?>"><br><br>
<div>
<input type="submit" name="insert" value="Add">
</div>
</form>
</div>
</div>
</div>

 <!-- container -->
 <footer class="py-2 bg-dark">
        <p class="text-center text-white">Copyright &copy;  2019 GCP Cinema Group</p>
    </footer>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        AOS.init();
    </script>
</body>
</html>