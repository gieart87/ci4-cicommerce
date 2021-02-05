<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>IndoMarket - Free E-Commerce Website Template built with Boostrap 4 and Argon Design System</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link href="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/css/font-awesome.css" rel="stylesheet">

    <!-- Jquery UI -->
    <link type="text/css" href="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/css/jquery-ui.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/css/argon-design-system.min.css" rel="stylesheet">

    <!-- Main CSS-->
    <link type="text/css" href="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/css/style.css" rel="stylesheet">

    <!-- Optional Plugins-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <?php echo $this->include('themes/'. $currentTheme .'/shared/header'); ?>
    <?php echo $this->renderSection('content') ?>
    <?php echo $this->include('themes/'. $currentTheme .'/shared/footer'); ?>
    <!-- Core -->
    <script src="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/js/core/jquery.min.js"></script>
    <script src="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/js/core/jquery-ui.min.js"></script>

    <!-- Optional plugins -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Argon JS -->
    <script src="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/js/argon-design-system.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url() . '/themes/' . $currentTheme ?>/assets/js/main.js"></script>
</body>

</html>