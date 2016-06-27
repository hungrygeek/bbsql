<?php
// Create connection
$con=mysqli_connect("espprod.cwll6n3zrnry.us-west-2.rds.amazonaws.com","esp_admin","espdbpass01","IMCANALYTICS");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>

<head>
<style>
th,td {
    text-align: center;
}
</style>
</head>
<body>

<strong>BASIC SQL SELECT EXAMPLE - CRM (Table):</strong>
<p>

<?php

$search1 = mysqli_query($con,"SELECT * FROM `CRM`");
$o = 0;

$arraylist = array();
?>

<table class="display" cellspacing="0" width="100%">
    <thead  style="background-color: #848482; color: #ffffff;" >
		<tr>
          <th>First Name</th>
		  <th>Last Name</th>
		  <th>Username</th>
		  <th>Customer ID</th>
		  <th>Genre Preference</th>
		</tr>
    </thead>

 <?php
while($row = mysqli_fetch_array($search1)) {
 echo '<tr>';
  echo '<td>' . $row['First'] . '</td>';
  echo '<td>' . $row['Last'] . '</td>';
  echo '<td>' . $row['Uname'] . '</td>';
  echo '<td>' . $row['UID'] . '</td>';
  echo '<td>' . $row['Pref'] . '</td>';

 echo '</tr>';
 $o++;
 }
 ?>

</table>

<p>
<strong>WHERE EXAMPLE - GENRE PREFERENCE = 1</strong>
<p>

<?php
$sql = "SELECT * FROM CRM WHERE Pref = 1";
$search2 = mysqli_query($con,$sql);
$o = 0;

$arraylist = array();

?>

<table class="display" cellspacing="0" width="100%">
    <thead  style="background-color: #848482; color: #ffffff;" >
		<tr>
		  <th>Last Name</th>
		  <th>Customer ID</th>
		</tr>
    </thead>

 <?php
while($row = mysqli_fetch_array($search2)) {
 echo '<tr>';

  echo '<td>' . $row['Last'] . '</td>';
  echo '<td>' . $row['UID'] . '</td>';

 echo '</tr>';
 $o++;
 }
 ?>

</table>

<p>
<strong>JOIN EXAMPLE - LAST TOUCH CHANNEL</strong>
<p>

<?php
//$sql = "SELECT CRM.Last, CHANNEL_REF.SOURCE_NAME FROM CRM INNER JOIN CHANNEL_REF ON Customer.LastClick = Media.CHAN_ID";
//$sql = "SELECT * FROM WEB WHERE cust_id > 0";
$sql = "SELECT WEB.cust_id, CHANNEL_REF.SOURCE_NAME FROM WEB INNER JOIN CHANNEL_REF ON CHANNEL_REF.CHANNEL_ID = WEB.source WHERE WEB.cust_id > 0";
$search3 = mysqli_query($con,$sql);
$o = 0;

$arraylist = array();

?>

<table class="display" cellspacing="0" width="100%">
    <thead  style="background-color: #848482; color: #ffffff;" >
		<tr>
		  <th>Last Name</th>
		  <th>Last Referring Channel</th>
		</tr>
    </thead>

 <?php
while($row = mysqli_fetch_array($search3)) {
 echo '<tr>';

  echo '<td>' . $row['cust_id'] . '</td>';
  echo '<td>' . $row['SOURCE_NAME'] . '</td>';

 echo '</tr>';
 $o++;
 }
 ?>

</table>

<p>
<strong>WHERE ASSIGNMENT - PURCHASES WHERE GENRE PREF = 2 </strong>
<p>


<table class="display" cellspacing="0" width="100%">
    <thead  style="background-color: #848482; color: #ffffff;" >
		<tr>
		  <th>Titles Here</th>
		</tr>
    </thead>

 <?php
$search4 = mysqli_query($con,"SELECT * FROM SALES WHERE genre = 2");
while($row = mysqli_fetch_array($search4)) {
echo '<tr>';

echo '<td>' . $row['variables here'] . '</td>';


echo '</tr>';
$o++;
 }
?>

</table>

<p>
<strong>JOIN (AND WHERE) ASSIGNMENT - INCLUDE GENRE NAME IN PURCHASES ON 1/16/16</strong>
<p>

<table class="display" cellspacing="0" width="100%">
    <thead  style="background-color: #848482; color: #ffffff;" >
		<tr>
		  <th>Titles Here</th>
		</tr>
    </thead>

 <?php
 //STUDENT COMMENT:
 $sql = "SQL here";
$search5 = mysqli_query($con,$sql);
 while($row = mysqli_fetch_array($search5)) {
 echo '<tr>';

echo '<td>' . $row['Variables Here'] . '</td>';


echo '</tr>';
$o++;
 }
 ?>

</table>

<p>
<strong>ARRAY ASSIGNMENT - ALL FIELDS IN CRM </strong>
<p>

 <?php
//STUDENT COMMENT:
$o = 0;
$sql = "SQL Here";
$search6 = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($search6)) {
//STUDENT COMMENT:
  $arraylist[$o][First] = $row['First'];
  $arraylist[$o][Last] = $row['Last'];
  $arraylist[$o][Cust_id] = $row['Uname'];
  $arraylist[$o][VisitDays] = $row['UID'];
  $arraylist[$o][Pref] = $row['Pref'];

 $o++;
 }
 ?>

</table>

<p><strong>CUSTOMERS (Array):</strong><p>
<?php

mysqli_close($con);

  echo "<pre>";

//STUDENT COMMENT:
  print_r($arraylist);

//STUDENT QUESTION - WHY/WHEN USE ARRAY INSTEAD OF TABLE?:

?>

</body>
