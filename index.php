<?php
// Updated validation logic for the Preisanfrage button
if (isset($_POST['submit'])) {
    $required_fields = ['field1', 'field2', 'field3']; // Add your required fields
    $valid = true;

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $valid = false;
            break;
        }
    }

    if ($valid) {
        // Open email client
        $to = 'your-email@example.com';
        $subject = 'Preisanfrage';
        $body = 'All required fields are filled.';
        $headers = 'From: webmaster@example.com';
        mail($to, $subject, $body, $headers);

        echo '<script>window.location.href="mailto:" + $to + "?subject=" + $subject + "&body=" + encodeURIComponent($body);</script>';
    } else {
        echo 'Please fill all required fields.';
    }
}
?>