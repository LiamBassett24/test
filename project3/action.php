<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', 'rRmvLDie9Wnz1b', 'CSannouncement');

$input = filter_input_array(INPUT_POST);

$date = mysqli_real_escape_string($connect, $input["date"]);
$title = mysqli_real_escape_string($connect, $input["title"]);
$description = mysqli_real_escape_string($connect, $input["description"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE announcement 
 SET date = '".$date."', 
 title = '".$title."',
 description = '".$description."' 
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM announcement 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>