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

    // Validate the profile picture field
    if ( !empty( $_FILES['profile_picture']['name'] ) ) {
        $profile_picture = $_FILES['profile_picture'];
        $file_type       = $profile_picture['type'];
        // Check if the file is an image
        if ( strpos( $file_type, 'image' ) !== false ) {
            $file_size = $profile_picture['size'];
            $max_size  = 5000000; // 5 MB
            // Check if the file size is within limits
            if ( $file_size > $max_size ) {
                $profile_picture_err = 'File size is too large. Maximum file size is 1 MB.';
            } else {
                // Generate a unique filename based on the current date and time
                $filename = date( 'YmdHis' ) . '_' . uniqid() . '.' . pathinfo( $profile_picture['name'], PATHINFO_EXTENSION );
                // Upload the file to the server
                $upload_dir  = 'uploads/';
                $upload_path = $upload_dir . $filename;
                if ( move_uploaded_file( $profile_picture['tmp_name'], $upload_path ) ) {
                    // File uploaded successfully
                } else {
                    $profile_picture_err = 'Error uploading file';
                }
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


function save_user_data( $serial, $name, $email, $password, $profile_picture ) {
    // Open the CSV file for appending
    $file = fopen( 'users.csv', 'a' );

    // Format the data as a CSV string
    $data = array( $serial, $name, $email, $password, $profile_picture );
    fputcsv( $file, $data );

    // Close the file
    fclose( $file );
}

//!Saves the profile picture to the server in a directory named "uploads" with a unique filename.
//?Adds the current date and time to the filename of the profile picture before saving it to the server.
//!Saves the user's name, email, and profile picture filename to a CSV file named "users.csv".
//!Starts a new session and sets a cookie with the user's name.
    // Start session and set cookie with user's name
    session_start();
    $_SESSION['name'] = $name;
    setcookie( 'name', $name, time() + ( 86400 * 30 ), '/' ); // Cookie expires in 30 days
