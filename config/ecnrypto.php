<?php

define('SERVER_PEPPER', 'd14c89d3fd1ff9dbdef6b16afe9e1b6413a859e0b765b8c07b6859f658b55f16');

function generate_salt($length = 32) {
    return bin2hex(random_bytes($length));
}

function hash_password($password, $user_salt, $server_pepper = SERVER_PEPPER, $iterations = 2**12) {

    $combined_salt = $server_pepper . $user_salt;

    $hashed_password = hash('sha256', $password . $combined_salt);

    for ($i = 0; $i < $iterations; $i++) {
        $hashed_password = hash('sha256', $hashed_password);
    }

    return $hashed_password;
}

function verify_password($entered_password, $hashed_password, $user_salt, $server_pepper = SERVER_PEPPER, $iterations = 2**12) {
    
    $combined_salt = $server_pepper . $user_salt;

    $hashed_entered_password = hash_password($entered_password, $user_salt, $server_pepper, $iterations);

    return hash_equals($hashed_password, $hashed_entered_password);
}

