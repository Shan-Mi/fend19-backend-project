<?php

  // only allow post requests
  if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') { die; }

  include_once("../../php/cms.php");

  $updatedBlogPost = [];
  $updatedBlogPost['id'] = $_POST["postId"];
  $updatedBlogPost['title'] = $_POST["post-title"];
  $updatedBlogPost['body'] = $_POST["post-body"];
  $updatedBlogPost['media_iframe'] = $_POST["post-media_iframe"];
  $updatedBlogPost['published'] = stringToBoolean($_POST["post-published"]);
  $updatedBlogPost['date_last_edit'] = date("Y-m-d H:i:s", time());

  CMS::updateBlogPost($updatedBlogPost);

  header("Location: ../index.php");
  die;

  function stringToBoolean($string) { return $string == "on"; }

?>