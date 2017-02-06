<!-- php code to use stylesheet in php-created html -->
<?php

	header("Content-type: text/css; charset: UTF-8");
	$paragraphSize = '85%';
	$imageSize = "100%";
?>

.mm-margin{
	margin: 0;
}

.btn {
    border-radius: 10px;
    background-color: #bb2e29;
    color: #EEEEEE;
    transition-duration: 0.5s;
}

.btn:hover {
    background-color: #6b0808;
    color: #FFFFFF;
    border-radius: 25px;
    box-shadow: 5px 5px 20px #6b0808;
}

.btn:focus {
    border-radius: 10px;
    background-color: #bb2e29;
    color: #EEEEEE;
    transition-duration: 0.5s;
}
.header {
		padding: 10px;
}

.jumbotron h1 {
	margin-top: 0px;
}

.jumbotron p {
		font-size: <?=$paragraphSize?>;
}

.jumbotron img {
		width: <?=$imageSize?>;
}


.navbar-default {
  background-color: #bb2e29;
  border-color: #6b0808;
}
.navbar-default .navbar-brand {
  color: #ecf0f1;
}
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #ffffff;
}
.navbar-default .navbar-text {
  color: #ecf0f1;
}
.navbar-default .navbar-nav > li > a {
  color: #ecf0f1;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: #ffffff;
}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: #ffffff;
  background-color: #6b0808;
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  color: #ffffff;
  background-color: #6b0808;
}
.navbar-default .navbar-toggle {
  border-color: #6b0808;
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
  background-color: #6b0808;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #ecf0f1;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #ecf0f1;
}
.navbar-default .navbar-link {
  color: #ecf0f1;
}
.navbar-default .navbar-link:hover {
  color: #ffffff;
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #ecf0f1;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #ffffff;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #ffffff;
    background-color: #6b0808;
  }
}
