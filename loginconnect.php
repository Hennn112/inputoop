<?php

$con =mysqli_connect("localhost","root","","akun");

$nama= $_POST["nama"];
$pasword= $_POST["pasword"];

session_start();
if(isset($_SESSION['nama'])){
    header("location:input.php");
}else{
    $sql ="SELECT * FROM `login` WHERE Pasword = '$pasword'";
    $sqld ="SELECT * FROM `login` WHERE Username = '$nama'";
    $resultd = mysqli_query($con, $sqld);
    $result = mysqli_query($con, $sql);
    
    $hasil = mysqli_num_rows($result) && mysqli_num_rows($resultd);
    echo $hasil;
    if ($hasil > 0){
        $barisData = mysqli_fetch_assoc($result);
        $_SESSION['nama'] = $barisData['Username'] && $barissan['Pasword'];
        
        echo "<script> alert('Login Sucesfully');
        document.location.href = 'input.php';
        </script>";
    } 
    else if(mysqli_num_rows($result) == 0 && mysqli_num_rows($resultd) == 0) {
        echo "<script> alert('Incorrect Password and Username');
        document.location.href = 'login.php';
        </script>";
        die;
    }     
    else if(mysqli_num_rows($result) == 0) {
        echo "<script> alert('Incorrect Password');
        document.location.href = 'login.php';
        </script>";
        die;
    }
    else if(mysqli_num_rows($resultd) == 0) {
        echo "<script> alert('Incorrect Username');
        document.location.href = 'login.php';
        </script>";
        die;
    }

}
?>
