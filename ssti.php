
<?php

$name=$_GET['sage'];
// include and register Twig auto-loader
include 'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
try {
  // specify where to look for templates
  $loader = new Twig_Loader_String();
  
  // initialize Twig environment
  $twig = new Twig_Environment($loader);
 // set template variables
 // render template
$result= $twig->render($name);
echo json_encode(array("success" => true, "message" => $result));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}


?>


