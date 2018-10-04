<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<div class="icon-bar">
  <a class="active" href="index.html"><i class="fa fa-home"></i></a> 
 <center><h2>DEPARTMENT OF INFORMATION SCIENCE AND TECHNOLOGY</h2></center>
</div>
<link rel="stylesheet" href="csssheet.css">
<h2>Courses</h2>
<!--<p>Type something in the input field to search the table for first names, last names or emails:</p>  -->
<input id="myInput" type="text" placeholder="Search..">
<br><br>


  <?php
$connect = mysqli_connect('127.0.0.1', 'dd', 'dd', 'srp_project');

$query = mysqli_query($connect, "SELECT * FROM Courses");?>
<center>
<table>
  <thead>
    <tr>
	<th>Course_code</th>
      <th>Course_name</th>
      
      <!--<th>View</th>-->
    </tr>
  </thead>
  <!--<tbody id="myTable">-->
<?php while($row = mysqli_fetch_row($query)): ?>
<tbody id="myTable">
<tr>
<td><?php echo $row[1]; ?></td>
<td><?php echo $row[2]; ?></td>
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