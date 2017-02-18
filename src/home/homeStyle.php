<!-- php code to use stylesheet in php-created html -->
<?php

	header("Content-type: text/css; charset: UTF-8");
	$paragraphSize = '95%';
	$titleSize = '300%';
	$imageSize = "100%";
	$modalBodyFontSize = "100%";
	$nomeCorsoColor = "#bb2e29";
?>

.mm-margin{
	margin: 0;
}

.popoverNotifiche {
		min-width: 300px;
    max-width: 460px;
}

.popoverUser {
		min-width: 170px;
    max-width: 200px;
}

.alert_list {
	font-size: 11px; color:grey
}

li.notifica {
  font-size: 16px;
  color:grey;
  padding:10px 0px 2px 0px;
  border-bottom: thin solid #c0c0c0;
}

li.notifica:hover {
	background-color:#eee
}

.readMore {
	color: #bb2e29;
}

.btn {
    border-radius: 10px;
    background-color: #bb2e29;
    color: #EEEEEE;
    transition-duration: 0.5s;
		border-color: #bb2e29;
}

.btn:hover {
    background-color: #6b0808;
		border-color: #6b0808;
    color: #FFFFFF;
    border-radius: 12px;
    box-shadow: 5px 5px 20px #6b0808;
}

.btn:focus {
    border-radius: 10px;
    background-color: #bb2e29;
    color: #EEEEEE;
    transition-duration: 0.5s;
}

#notifiche,#user,#calendario,#news,#servizi,#carriera {
	transition-duration: 0.2s;
	color: #EEEEEE;
}

#notifiche:hover,#user:hover,#calendario:hover,#news:hover,#servizi:hover,#carriera:hover {
	background-color: #6b0808;
}

#notifiche:focus,#user:focus,#calendario:focus,#news:focus,#servizi:focus,#carriera:focus {
	background-color: #6b0808;
}

.newsAteneoBox {
		transition-duration: 0.5s;
}

.newsAteneoBox:hover {
	border-radius: 10px;
	box-shadow: 2px 2px 20px #444444;
}

.thumbnail {
	transition-duration: 0.5s;
	min-height: 540px;
}

.thumbnail:hover {
	border-radius: 10px;
}

.go-top {
		position: fixed;
		bottom: 2em;
		right: 2em;
		text-decoratioN: none;
		color: white;
		background-color: rgba(0, 0, 0, 0.3);
		font-size: 12px;
		padding: 2em;
		display: none;
}

.go-top:hover {
		background-color: rgba(0, 0, 0, 0.6);
}

.nomeCorsoNews {
	color: <?=$nomeCorsoColor?>;
}

.header {
		padding: 10px;
}

.jumbotron h1,h2,h3 {
	margin-top: 0px;
}

.jumbotron h1 {
		font-size: <?=$titleSize?>;
}

.jumbotron p {
		font-size: <?=$paragraphSize?>;
}

.jumbotron img {
		width: <?=$imageSize?>;
}

.modal-body p {
	font-size: <?=$modalBodyFontSize?>;
}

.glyphicon.glyphicon-chevron-up {
		color: #bb2e29;
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

.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
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

.noStack > li {
		display: inline-block;
}

.noStack {
	padding-right: 20px;
}

.servicePanel {
	transition-duration: 0.2s;
	margin: 1%;
	box-shadow: 2px 2px 5px #DDD;
	display:inline-block;
  float:none;
}

.servicePanel:hover {
	border-radius: 8px;
	box-shadow: 2px 2px 10px #666;
}

.serviceIcon {
	color: #666;
	font-size: 6vw;
	display: block;
  text-align: center;
	margin : 10px;
}

.serviceDescription {
	color: #888;
	font-size: 125%;
	display: block;
  text-align: center;
	margin-bottom: 8%;
}

.buttonList {
	text-align:center;
}

.display-2 {
	color: #666;
}













// end
