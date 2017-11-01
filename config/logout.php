<?php
  namespace session;
  try
  {
    session_start();
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    header("location: ../index.php");
    exit;
  }
  catch (Exception $ex)
  {
    echo $ex->getMessage();
    die;
  }
?>
