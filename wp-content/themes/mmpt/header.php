<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mad Mallard Personal Training</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        wp_head();
     ?>

</head>

<body>
    <div class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
    </div>
    <div class="topnav">
        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                )
            );
        ?>
    </div>
    <div class="content">
