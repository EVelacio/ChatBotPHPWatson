<?php
session_start();

const C_BASE_URL = 'http://localhost/restbot/';

//
function escape($str)
{
   return htmlspecialchars($str);
}

//
function myecho($str)
{
   echo escape($str);
}

//
function base_url($uri = '')
{
   return C_BASE_URL . $uri;
}
?>