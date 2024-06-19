<?php
    require 'config.php';

    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        $verify_query = "SELECT verify_token,verify_status FROM citizen_account WHERE verify_token = '$token' LIMIT 1 ";
        $verify_query_run = mysqli_query($conn, $verify_query);


        $seeker_verify_query = "SELECT verify_token,verify_status FROM seeker_account WHERE verify_token = '$token' LIMIT 1 ";
        $seeker_query_run = mysqli_query($conn, $seeker_verify_query);

        if (mysqli_num_rows($seeker_query_run) > 0) {
            $row = mysqli_fetch_array($seeker_query_run);
            if ($row['verify_status'] == "0") {
                $clicked_token = $row['verify_token'];
                $update_query = "UPDATE seeker_account SET verify_status='1' WHERE verify_token='$clicked_token' ";
                $update_query_run = mysqli_query($conn, $update_query);

                if ($update_query_run) {
                    echo
                        "<script> alert('Verified Successfully.'); 
                        window.location.href = 'login.php';
                        </script>";
                    exit(0);
                } else {
                    echo
                        "<script> alert('Verification Failed.'); 
                        window.location.href = 'login.php';
                        </script>";
                    exit(0);
                }


            } else {
                echo
                    "<script> alert('Email already verified. Please login.'); 
                    window.location.href = 'login.php';
                    </script>";
                exit(0);
            }
        }


        if (mysqli_num_rows($verify_query_run) > 0) {
            $row = mysqli_fetch_array($verify_query_run);
            
            if ($row['verify_status'] == "0") {
                $clicked_token = $row['verify_token'];
                $update_query = "UPDATE citizen_account SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1";
                $update_query_run = mysqli_query($conn, $update_query);

                if ($update_query_run) {
                    echo
                        "<script> alert('Verified Successfully.'); 
                        window.location.href = 'login.php';
                        </script>";
                    exit(0);
                } else {
                    echo
                        "<script> alert('Verification Failed.'); 
                        window.location.href = 'login.php';
                        </script>";
                    exit(0);
                }


            } else {
                echo
                    "<script> alert('Email already verified. Please login.'); 
                    window.location.href = 'login.php';
                    </script>";
                exit(0);
            }

        } else {
            $admin_verify_query = "SELECT verify_token,verify_status FROM admin_account WHERE verify_token = '$token' LIMIT 1 ";
            $admin_verify_query_run = mysqli_query($conn, $admin_verify_query);

            if (mysqli_num_rows($admin_verify_query_run) > 0) {
                $admin_row = mysqli_fetch_array($admin_verify_query_run);
                
                if ($admin_row['verify_status'] == "0") {
                    $admin_clicked_token = $admin_row['verify_token'];
                    $admin_update_query = "UPDATE admin_account SET verify_status='1' WHERE verify_token='$admin_clicked_token' LIMIT 1";
                    $admin_update_query_run = mysqli_query($conn, $admin_update_query);
    
                    if ($admin_update_query_run) {
                        echo
                            "<script> alert('Verified Successfully.'); 
                            window.location.href = 'login.php';
                            </script>";
                        exit(0);
                    } else {
                        echo
                            "<script> alert('Verification Failed.'); 
                            window.location.href = 'login.php';
                            </script>";
                        exit(0);
                    }
    
    
                } else {
                    echo
                        "<script> alert('Email already verified. Please login.'); 
                        window.location.href = 'login.php';
                        </script>";
                    exit(0);
                }
    
            }
        }

    } else {
        header("Location: login.php");
    }


?>