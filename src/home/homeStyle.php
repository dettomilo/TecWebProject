<!-- php code to use stylesheet in php-created html -->
<?php

	header("Content-type: text/css; charset: UTF-8");
	$paragraphSize = '85%';
	$imageSize = "80%";
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
