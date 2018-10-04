<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<div class="icon-bar">
  <a class="active" href="designation.html"><i class="fa fa-home"></i></a> 
 <center><h2>DEPARTMENT OF INFORMATION SCIENCE AND TECHNOLOGY</h2></center>
</div>
<link rel="stylesheet" href="csssheet.css">
<h2>Associative Professor</h2>
<!--<p>Type something in the input field to search the table for first names, last names or emails:</p>  -->
<input id="myInput" type="text" placeholder="Search..">
<br><br>


  <?php
$connect = mysqli_connect('127.0.0.1', 'dd', 'dd', 'srp_project');
$sql="SELECT * FROM Faculty WHERE Designation='Associative Professor'";
//$query = mysqli_query($connect, "SELECT * FROM Faculty");
$query=mysqli_query($connect,$sql);?>
<center>
<table>
  <thead>
    <tr>
      <th>Designation</th>
      <th>Name</th>
      <th>Year Of Experience</th>
      <th>Mail</th>
	  <th>View</th>
    </tr>
  </thead>
  <!--<tbody id="myTable">-->
<?php while($row = mysqli_fetch_array($query)): ?>
<tbody id="myTable">
<tr>
<td><?php echo $row[1]; ?></td>
<td><?php echo $row[2];  ?></td>
<td><?php echo $row[3]; ?></td>
<td><?php echo $row[4]; ?></td>
<td><?php echo '<a href="tablefetch.php?F_id='.$row['F_id'].'">'.$row['Name'].'</a>';?><td>
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($query); ?>
<?php mysqli_close($connect); ?>
 </tbody>
</table>
</center>
<script src="tablejs.js"></script>
<div class="footer">
  <p>copyright &copy; DIST</p>
</div>
</body>
</html>