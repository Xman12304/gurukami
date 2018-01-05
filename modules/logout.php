<?php

session_start();
session_destroy();

echo"<h1>anda sudah logout</h1>";
echo"<script>window.location.href='../index'</script>";

?>