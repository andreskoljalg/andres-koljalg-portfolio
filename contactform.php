<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = "New message from portfolio";
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];
    $mailTo = "server@tak21fredyait.itmajakas.ee";
    $headers = "From ".$name." at ".$mailFrom.". Sent using portfolio contact form.";

    if (empty($name)) {
        mail($mailTo, $subject, $message, $headers);
        header("Location: contact.html");
    } else {
        header("Location: index.html");
    }
}