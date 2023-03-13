<?php

// define variables and initialize with empty values
$name     = $email     = $password     = $profile_picture     = "";
$name_err = $email_err = $password_err = $profile_picture_err = "";

//!Validates the form inputs (ensure that all fields are filled out and the email is in a valid format).
// check if form is submitted
if ( isset( $_POST['submit'] ) ) {
    // Validate the name field
    if ( !empty( $_POST['name'] ) ) {
        $name = htmlspecialchars( trim( $_POST['name'] ) );
        // Check if the name contains only letters and whitespace
        if ( !preg_match( '/^[a-zA-Z ]*$/', $name ) ) {
            $name_err = 'Only letters and white space allowed';
        }
    } else {
        $name_err = 'Name is required';
    }

    // Validate the email field
    if ( !empty( $_POST['email'] ) ) {
        $email = htmlspecialchars( trim( $_POST['email'] ) );
        // Check if the email is valid
        if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
            $email_err = 'Invalid email format';
        }
    } else {
        $email_err = 'Email is required';
    }

    // Validate the password field
    if ( !empty( $_POST['password'] ) ) {
        $password = htmlspecialchars( trim( $_POST['password'] ) );
    } else {
        $password_err = 'Password is required';
    }

/*     // Validate the profile picture field
if ( !empty( $_FILES["profile_picture"]["name"] ) ) {
$profile_pic   = $_FILES["profile_pic"];
$allowed_types = [ "image/jpeg", "image/png", "image/gif" ];
if ( !in_array( $profile_pic["type"], $allowed_types ) ) {
$profile_picture_err = "Invalid file type. Only JPEG, PNG, and GIF files are allowed.";
}
} else {
$profile_picture_err = "Profile picture is required";
} */

    // Validate the profile picture field
    if ( !empty( $_FILES['profile_picture']['name'] ) ) {
        $profile_picture = $_FILES['profile_picture'];
        $file_type       = $profile_picture['type'];
        // Check if the file is an image
        if ( strpos( $file_type, 'image' ) !== false ) {
            $file_size = $profile_picture['size'];
            $max_size  = 9000000; // 9 MB
            // Check if the file size is within limits
            if ( $file_size > $max_size ) {
                $profile_picture_err = 'File size is too large. Maximum file size is 1 MB.';
            }
        } else {
            $profile_picture_err = 'File type not allowed. Only images are allowed.';
        }
    } else {
        $profile_picture_err = 'Profile picture is required';
    }

    // If there are no errors, save user data
    if ( empty( $name_err ) && empty( $email_err ) && empty( $password_err ) && empty( $profile_picture_err ) ) {
        $last_serial = count( file( 'users.csv' ) );

        // Increment the serial number
        $serial = $last_serial + 1;

        // Save user data
        save_user_data( $serial, $name, $email, $password, $profile_picture );
        //save_user_data($name, $email, $password, $profile_picture);
    }
}

//!Saves the profile picture to the server in a directory named "uploads" with a unique filename.
//?Adds the current date and time to the filename of the profile picture before saving it to the server.
//!Saves the user's name, email, and profile picture filename to a CSV file named "users.csv".
//!Starts a new session and sets a cookie with the user's name.


function save_user_data( $serial, $name, $email, $password, $profile_picture ) {
    // Save profile picture to server
    $target_dir  = "uploads/";
    $target_file = $target_dir . uniqid() . '_' . basename( $profile_picture["name"] );
    move_uploaded_file( $profile_picture["tmp_name"], $target_file );

    // Add current date and time to filename
    $date_time       = date( 'Y-m-d_H:i:s' );
    $ext             = pathinfo( $target_file, PATHINFO_EXTENSION );
    $new_target_file = $target_dir . uniqid() . '_' . $date_time . '.' . $ext;
    rename( $target_file, $new_target_file );

    // Save user data to CSV file
    $file = fopen( 'users.csv', 'a' );
    fputcsv( $file, [$serial, $name, $email, $password, $new_target_file] );
    fclose( $file );

    // Start session and set cookie with user's name
    session_start();
    $_SESSION['name'] = $name;
    setcookie( 'name', $name, time() + ( 86400 * 30 ), '/' ); // Cookie expires in 30 days
}

