<?php 
session_start();
require "assets/config/connection.php";
$email = "uyulku009@gmail.com";
$name = "KingOfBear";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Konfirmasi kata sandi tidak cocok!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email yang anda masukan sudah ada";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Kode OTP Verifikasi Email";
            $message = "Kode OTP verifikasi Anda adalah $code";
            $sender = "From:uyulku100@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "Kami telah mengirimkan kode OTP verifikasi ke email Anda";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Gagal saat mengirim kode!";
            }
        }else{
            $errors['db-error'] = "Gagal saat memasukkan data ke database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Gagal saat memperbarui kode!";
            }
        }else{
            $errors['otp-error'] = "Anda memasukkan kode yang salah!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                    header('location: home.php');
                }else{
                    $info = "Sepertinya Anda belum memverifikasi email Anda - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Email atau sandi salah!";
            }
        }else{
            $errors['email'] = "Sepertinya Anda belum menjadi anggota! Klik di link bawah untuk mendaftar";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Kode OTP Reset Kata Sandi";
                $message = "Kode OTP pengaturan ulang kata sandi Anda adalah $code";
                $sender = "From:uyulku009@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "Kami telah mengirimkan Kode OTP reset password ke email Anda - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Gagal saat mengirim kode!";
                }
            }else{
                $errors['db-error'] = "Ada yang salah!";
            }
        }else{
            $errors['email'] = "Alamat email ini tidak ada!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Harap buat sandi baru yang tidak Anda gunakan di situs lain mana pun.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "Anda memasukkan kode yang salah!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Kata sandi Anda berubah. Sekarang Anda dapat masuk dengan kata sandi baru Anda.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Gagal mengubah kata sandi Anda!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>