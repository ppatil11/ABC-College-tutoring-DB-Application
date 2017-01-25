<html>
<head>
<title>ABC College Tutoring</title>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<style>
  .bs-example{
    	margin: 20px;
    }
	.table {
		width:60%;
	}
</style>
</head>
<body>


    <nav role="navigation" class="navbar navbar-default">

        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">

            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">

                <span class="sr-only">Toggle navigation</span>

              <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </button>

            <a href="displaybatchtable.php" class="navbar-brand">ABC College Tutors</a>

        </div>

        <!-- Collection of nav links and other content for toggling -->

        <div id="navbarCollapse" class="collapse navbar-collapse">

            <ul class="nav navbar-nav">

          //      <li><a href="#">Home</a></li>
                <li class="active"><a href="Analysis6.php">Home</a></li>

         //       <li class="active"><a href="displaybatchtable.php">Second Page</a></li>

                <li><a href="#">Third Page</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li><a href="#">Login</a></li>

            </ul>

        </div>

    </nav>


</body>
</html>

//<?php include("dbconfig.php"); ?>
<?php
// comment the first line and uncomment the below two lines if you are unable to include dbconfig.php file 
 $connection = mysqli_connect('localhost', 'root', ''); //The Blank string is the password
 mysqli_select_db($connection,'abc college tutoring');

$query = "select nationality as 'Nationality',timing as 'Prefered Batch Timing', count(timing) as 'No. of Students' from (select a.stu_name, 
a.nationality, b.batch_id, c.timing from students a, student_batch_info b, batch c where a.stu_id = b.stu_id and b.batch_id = 
c.batch_id) as nationality_count group by nationality,timing";//You don't need a ; like you do in SQL
$result = mysqli_query($connection,$query);

echo "<div class='bs-example'>";
echo "<table class='table table-striped'>"; // start a table tag in the HTML
//echo "<tr><th>AVG_NO_OF_STUDENTS</th></tr>";
echo "<tr><th>BATCH_ID</th><th>TIMING</th><th>SUB_ID</th><th>FAC_ID</th><th>STUDENTS</th></td>";
if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
//echo "<tr><td>".$row['AVG_NO_OF_STUDENTS']."<td><tr>";
echo "<tr><td>" . $row['Nationality'] . "</td><td >" . $row['Prefered Batch Timing'] ."</td><td >" . $row['No. of Students'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML
echo "</div>";

mysqli_close($connection); //Make sure to close out the database connection

?>
