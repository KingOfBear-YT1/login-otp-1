<?php require_once "controllerUserData.php"; ?>
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
            <form action="login" method="POST" autocomplete="" class="form-horizontal formx" role="form">
                <center>
                    <b>Aplikasi Pendataan Pegawai</b><br>
                    <a target="_blank" href="https://www.youtube.com/channel/UCh3zMcSY8-XpetX_Zq29e_w?view_as=subscriber?sub_confirmation=1"><img src="https://i.ibb.co/jfZVKmC/babi2.jpg" width="100px"></a>
                </center>
                <h3 class="text-center">Form Login</h3>
                <p class="text-center">Silahkan lengkapi form di bawah ini!</p>
                <?php
                if(count($errors) > 0)
                    { ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror)
                            {
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" required value="<?php echo $email ?>">
                    </div>  
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-sm btn-primary" style="width: 150px;border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-sign-in faa-tada animated-hover"></i> Login</button>
                        <a href="forgotpassword" class="btn btn-sm btn-success" style="width: 150px;border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-key faa-tada animated-hover"></i> Lupa Password?</a>
                    </div>
                    <div class="link login-link text-center">Belum memiliki akun? 
                        <a href="registration" class="label btn-warning" title="Klik Saya">Daftar Sekarang!</a>

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