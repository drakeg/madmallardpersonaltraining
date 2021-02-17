<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Mad Mallard Personal Training">
  <meta name="author" content="http://www.madmallardpersonaltraining.com">

  <?php
  wp_head();
  ?>
</head>
<body>
    <main class="main">
      <header class="header">
        <div class="wrap d-flex">
          <h1 class="logo">
            <a href=""><img src="images/drakeg_SK08aA00a.png" alt="" /></a>
          </h1>
          <nav class="menu">
          <?php
            wp_nav_menu(
              array(
                'menu' => 'primary',
                'container' => '',
                'theme_location' => 'primary',
                'items_wrap' => '<ul></ul>'
              )
            );
          ?>
            <ul>
              <li><a href="">Home</a></li>
              <li><a href="">About</a></li>
              <li><a href="">Blog</a></li>
              <li><a href="">Plans</a></li>
              <li><a href="">Contact</a></li>
            </ul>
          </nav>
        </div>
      </header>
    </main>
