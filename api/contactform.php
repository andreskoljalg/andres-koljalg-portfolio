<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $honeyPotMail = $_POST['email'];
    $honeyPotWebsite = $_POST['website'];
    $subject = "New message from portfolio";
    $mailFrom = $_POST['emanueladdresshaha'];
    $message = $_POST['message'];
    $mailTo = "server@tak21fredyait.itmajakas.ee";
    $headers = "From ".$name." at ".$mailFrom.". Sent using portfolio contact form.";

    if (empty($honeyPotMail) && empty($honeyPotWebsite)) {
        mail($mailTo, $subject, $message, $headers);
        header("Location: contact_confirmation.html");
    } else {
        header("Location: index.html");
    }
}