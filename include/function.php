<?php  
    include 'include/container/footer.php';
    include 'include/container/header.php';
    include 'connect_db.php';
function checkUser( $email, $password){
    global $con;
    $stmt=$con->prepare("SELECT * FROM board WHERE email=?");
    $stmt->execute(array( $email));
    $rows=$stmt->fetch(PDO::FETCH_ASSOC);
    $count=$stmt->rowCount();
    if ($count) {
        if($rows['password']==$password){
            $_SESSION['id']=$rows['id'];
            $_SESSION['useranme']=$rows['username'];
            $_SESSION['email']=$rows['email'];
            $_SESSION['phone ']=$rows['phone '];
            $_SESSION['position']=$rows['position'];
            $_SESSION['commity']=$rows['commity'];
            $_SESSION['season']=$rows['season'];
            $_SESSION['img']=$rows['img'];
            $_SESSION['facebook']=$rows['facebook'];
            $_SESSION['linked_in']=$rows['linked_in'];
            $_SESSION['twitter']=$rows['twitter'];
            $_SESSION['description']=$rows['description'];
            header("location:../dashboard.php");
        }
        else{
            echo"Wrong email or password";
        }
    }
    else{
        echo"Wrong email or password";
    }

}

function addmsg($msgfrom,$name,$msg,$subject){
    global $con;
    $stmt=$con->prepare("INSERT INTO contact_us(msgfrom,name,msg,subject) Value(:msgfrom,:name,:msg,:subject)");
    $stmt->execute(array(
        ":msgfrom"=>$msgfrom,
        ":name"=>$name,
        ":msg"=>$msg,
        ":subject"=>$subject
        ));
        echo'
        <div class="alert alert-dark" role="alert">
            Message successfully sent!
        </div>';
}
