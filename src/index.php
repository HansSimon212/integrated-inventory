﻿<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <title>Inventory Manager</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,500" rel="stylesheet" />
  <link href="vendor/normalize.css/normalize.css" rel="stylesheet" />
  <link href="vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="vertical-responsive-menu.css" rel="stylesheet" />
  <link href="index.css" rel="stylesheet" />
</head>

<body>
  <header class="header clearfix">

    <button type="button" id="toggleMenu" class="toggle_menu">
      <i class="fa fa-bars"></i>
    </button>
    <img src="imgs/lei_logo_resize.png" alt="LEI logo image file not found." id="mainLogo">
    <h1 id="mainTitle">Inventory Manager</h1>

  </header>

  <nav class="vertical_nav">
    <ul id="js-menu" class="menu">

      <li class="menu--item">
        <a href="index.html" class="menu--link" title="Home">
          <i class="menu--icon fa fa-fw fa-home"></i>
          <span class="menu--label">Home</span>
        </a>
      </li>

      <li class="menu--item">
        <a href="html/find-item.html" class="menu--link" title="Find Item">
          <i class="menu--icon fa fa-fw fa-search"></i>
          <span class="menu--label">Find Item</span>
        </a>
      </li>

      <li class="menu--item">
        <a href="html/add-item.html" class="menu--link" title="Add Item">
          <i class="menu--icon fa fa-fw fa-plus-square-o"></i>
          <span class="menu--label">Add Item</span>
        </a>
      </li>

      <li class="menu--item">
        <a href="html/remove-item.html" class="menu--link" title="Remove Item">
          <i class="menu--icon fa fa-fw fa-minus-square-o"></i>
          <span class="menu--label">Remove Item</span>
        </a>
      </li>

      <li class="menu--item">
        <a href="html/move-item.html" class="menu--link" title="Move Item">
          <i class="menu--icon fa fa-fw fa-arrows"></i>
          <span class="menu--label">Move Item</span>
        </a>
      </li>

      <li class="menu--item">
        <a href="html/get-info.html" class="menu--link" title="Get Item Info">
          <i class="menu--icon fa fa-fw fa-info"></i>
          <span class="menu--label">Get Item Info</span>
        </a>

      </li>
      <li class="menu--item">
        <a href="html/update-weight.html" class="menu--link" title="Update Item Weight">
          <i class="menu--icon fa fa-fw fa-anchor"></i>
          <span class="menu--label">Update Item Weight</span>
        </a>
      </li>

      <!--
          MENU ITEM WITH SUBMENU: 

           <li class="menu--item menu--item__has_sub_menu">
          <label class="menu--link" title="Move Item">
            <i class="menu--icon fa fa-fw fa-qrcode"></i>
            <span class="menu--label">Move</span>
          </label>

          <ul class="sub_menu">
            <li class="sub_menu--item">
              <a
                href="http://google.com"
                target="_blank"
                class="sub_menu--link sub_menu--link__active"
                >Submenu</a
              >
            </li>
            <li class="sub_menu--item">
              <a href="#" class="sub_menu--link">Submenu</a>
            </li>
            <li class="sub_menu--item">
              <a href="#" class="sub_menu--link">Submenu</a>
            </li>
          </ul>
        </li>

        -->
  </nav>

  <div class="wrapper">
    <section id="main_content">
      <h2 class="main_content_title">Home</h2>
      <hr>
    </section>
  </div>

  <script src="vertical-responsive-menu.js"></script>
</body>

</html>