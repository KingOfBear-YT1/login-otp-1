<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<?php require_once "header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
        </div>
        <div class="col-sm-4">
                <form action="reset-code.php" method="POST" autocomplete="" class="form-horizontal formx" role="form">
                <center>
                    <a target="_blank" href="https://www.youtube.com/channel/UCh3zMcSY8-XpetX_Zq29e_w?view_as=subscriber?sub_confirmation=1"><img src="assets/img/logo/lokon!d.png" width="80px"></a>
                </center>
                    <h2 class="text-center">Verifikasi Kode OTP</h2>
                     <p class="text-center">Silahkan lengkapi form di bawah ini!<br>Lihat kode OTP yang ada di email anda.</p>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Tuliskan Kode OTP" required>
                    </div>
                    <div class="form-group">
                         <button class="btn btn-sm btn-primary" type="submit" name="check-reset-otp"  style="width: 150px;border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-send (alias) faa-tada animated-hover"></i> Kirim</button>
                        <a href="login" class="btn btn-sm btn-success" style="width: 150px;border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-close faa-tada animated-hover"></i> Batal</a>
                    </div>
                    
                <center>
                    <hr>
                    <p> 
                        powered by <a class="label btn-danger" target="_blank" href="https://www.youtube.com/channel/UCh3zMcSY8-XpetX_Zq29e_w?view_as=subscriber?sub_confirmation=1" title="Klik Saya">LOKON ID</a>
                    </p>
                </center>  
                </form>
        </div>

        <div class="col-md-4">
            <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
        </div>
    </div>
</div>
<?php require_once "footer.php"; ?>
