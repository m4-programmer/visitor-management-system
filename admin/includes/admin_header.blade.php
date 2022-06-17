<?php 
require '../handlers/require_files.php';
// if user has not login they will not be able to access dashboard

 ?>
<!doctype html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content=" csrf_token()">

    <title> Visitor Management System</title>
    <!-- CSS Files -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css ">
        <link rel="stylesheet" type="text/css" href="assets/css/atlantis.min.css ">
        <link rel="stylesheet" type="text/css" href="css/popup_style.css ">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css ">
    <!-- Fonts and icons -->
        <script type="text/javascript" src="assets/js/plugin/webfont/webfont.min.js"></script>
        <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["assets/css/fonts.min.css"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
        function validateForm() {
        
     var check = $('#specialization').val();
     if (check == '') {
            $('#change').css('display','block');
            return false;
        }
}
    </script>
</head>
<div class="wrapper">