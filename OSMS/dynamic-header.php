<?php 
if (isset($_GET['page'])) {
	$pagename = $_GET['page'];
}else {
	$url = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
	$name2 =pathinfo($url, PATHINFO_FILENAME);
	$pagename = $name2;

}
	define('TITLE','Change password');
    define('PAGE', $pagename);

 ?>