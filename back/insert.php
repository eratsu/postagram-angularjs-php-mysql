<?php

include 'config.php';

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$user_id = '';
$post = '';

if(empty($form_data->user_id))
{
 $error[] = 'user id is required';
}
else
{
 $user_id = $form_data->user_id;
}

if(empty($form_data->post))
{
 $error[] = 'post is Required';
}
else
{
 $post = $form_data->post;
}

if(empty($error))
{
 if($form_data->action == 'Insert')
 {
  $data = array(
   ':user_id'  => $user_id,
   ':post'  => $post
  );

  $query = $database->insert("feed", [
	"user_id" => :user_id,
	"post" => :post
	
]);

 
  if($query)
  {
   $message = 'Data Inserted';
  }
 }
 else
 {
  $validation_error = implode(", ", $error);
 }

 $output = array(
  'error'  => $validation_error,
  'message' => $message
 );

echo json_encode($output);

?>