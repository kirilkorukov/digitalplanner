<?php
    require_once 'db.php';
    
    $db = new Database('mysql','localhost','dream-world','root',''); 
    $connection = $db->getConnection();

if(!empty($_POST["username"]) && !empty($_POST["password"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql="SELECT * FROM `users` WHERE username=?";
    $prepared = $connection->prepare($sql);
    $prepared->execute([$username]);
    $result= $prepared->fetch(PDO::FETCH_ASSOC);
   
    
    if(!$result){
        echo "Не съществува такова потребителско име.";
    }else{
      
        $real_password = $result['pass'];
        if($password!=$real_password){
            echo "Грешна парола.";
        }else{
            $_SESSION['username']=$username;
        }
    }
  
}else{
    echo "Попълнете всички полета.";
}
exit;
?>