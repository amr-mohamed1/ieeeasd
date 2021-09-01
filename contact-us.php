<?php include 'init.php';
?>
<link rel="stylesheet" href="layout/css/contact-us.css">
</head>
<body>

<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST" ) {


        if(empty($_POST['fullName'])||strlen($_POST['fullName'])<3){
           echo' <div class="alert alert-danger" role="alert">
            Please fill the name field and it should be more than 3 letters 
          </div> ';
          $nameerror="border border-danger";
        }
        if (empty($_POST['email'])) {
             echo'<div class="alert alert-danger" role="alert">
            Please fill the email field  
            </div>';
            $emailerror="border border-danger";
        }
        if (empty($_POST['message'])) {
            echo'<div class="alert alert-danger" role="alert">
            Please fill the message field  
            </div>';
            $msgerror="border border-danger";

        }
        if (empty($_POST['subject'])) {
            echo'<div class="alert alert-danger" role="alert">
            Please fill the subject field  
            </div>';
            $subjecterror="border border-danger";
        }
        else {
            $name=FILTER_VAR($_POST['fullName'],FILTER_SANITIZE_STRING);
            $email=FILTER_VAR($_POST['email'],FILTER_SANITIZE_EMAIL);
            $msg=FILTER_VAR($_POST['message'],FILTER_SANITIZE_STRING);
            $subject=FILTER_VAR($_POST['subject'],FILTER_SANITIZE_STRING);
            $header="from:".$email;
            mail("Ieeebub@gmail.com",$subject,$email,$header . "\r\n" ."CC: Ieeebub@gmail.com". "\r\n" .$msg);
            addmsg($email,$name,$msg,$subject);
            }
    }
    ?>

        <div class="opacity"> </div>
            <div class="container">
                <div class="title">
                    <h1>Contact Us</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates rerum itaque ea nesciunt. Corporis, quo, consectetur ab Corporis, quo, consectetur ab Corporis.</p>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-11 left_side">
                        <!--contact_1-->
                        <div>
                            <span class="icon"> <i class="fas fa-map-marker-alt "></i></span>
                            <div class="contact">
                                <span>Address</span>
                                <p class="link">Banha</p>
                            </div>
                        </div>
                        <!--contact_2-->
                        <div>
                            <span class="icon"> <i class="fas fa-phone-alt "></i></span>
                            <div class="contact">
                                <span>Phone</span>
                                <p class="link">01095426880</p>
                            </div>
                        </div>
                        <!--contact_1-->
                        <div>
                            <span class="icon"><i class="far fa-envelope "></i></span>
                            <div class="contact">
                                <span>Email</span>
                                <p class="link" href="Ieeebub@gmail.com">Ieeebub@gmail.com</p>
                            </div>
                        </div>
    
                    </div>
                    <div class="col-lg-6 col-sm-11 right_side">
                        <form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <h1 style="text-align:center">Send Message</h1>
                            <input class="form-control <?php echo $nameerror?>" value="<?php if(!empty($_POST['fullName'])){echo $_POST['fullName'];}?>"  type="text" name="fullName" placeholder="Full Name" autocomplete="off">
                            <input class="form-control <?php echo $emailerror?>"  value="<?php if(!empty($_POST['email'])){echo $_POST['email'];}?>" type="email" name="email" placeholder="Email" autocomplete="new-password" >
                            <input class="form-control <?php echo $subjecterror?>"  value="<?php if(!empty($_POST['subject'])){echo $_POST['subject'];}?>" type="text" name="subject" placeholder="Subject" autocomplete="off" >
                            <textarea name="message"   class="form-control <?php echo $msgerror?>" value="<?php if(!empty($_POST['message'])){echo $_POST['message'];}?>" placeholder="Type your Message.."></textarea>
                            <input class="btn btn-primary " type="submit" name="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
    

            <!--fffadsfadff-->
            <!--ffadsfsdffff-->
            <!--asdfadsf-->
            <!--a-->
