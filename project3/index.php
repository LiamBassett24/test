<?php
$connect = mysqli_connect("localhost", "root", "rRmvLDie9Wnz1b", "CSannouncement");
$query = "SELECT * FROM announcement ORDER BY id DESC";
$result = mysqli_query($connect, $query);
?>

<html>  
 <head>  
    <title>CS Announcements</title>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="jquery.tabledit.min.js"></script>
 </head>  
 
 <body>  
	<div class="container">  
		<br />  
		<br />  
		<br />  
		<div class="table-responsive">  
			<h3 align="center">CS Announcements</h3><br />  
			<table id="editable_table" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>ID</th>
				<th>Date</th>
				<th>Title</th>
				<th>Description</th>
			</tr>
			</thead>
			<tbody>
				<?php
				while($row = mysqli_fetch_array($result))
				{
					echo '
					<tr>
						<td>'.$row["id"].'</td>
						<td>'.$row["date"].'</td>
						<td>'.$row["title"].'</td>
						<td>'.$row["description"].'</td>
					</tr>
					';
				}
				?>
			</tbody>
			</table>
		</div>  
	</div> 
	
  </body>  
</html>  
<script>  
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'action.php',
      columns:{
       identifier:[0, "id"],
       editable:[[1, 'date'], [2, 'title'], [3, 'description']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
 
});  
</script>

