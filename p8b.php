<?php
//database details
$servername="localhost";
$username="root";
$password="";
$dbname="student";
//create connection
$conn=new mysqli($servername="localhost",$username,$password,$dbname);
//check connection 
if($conn->connect_error)
{
die('connection error:').$conn->connect_error;
}
//selection sort function
function selectionsort(&$arr,$n){
for($i=0;$i<$n-1;$i++)
{
$minindex=$i;
for($j=$i+1;$j<$n;$j++)
{
if($arr[$j]['roll_no']<$arr[$minindex]['roll_no'])
{
$minindex=$j;
}
}
$temp=$arr[$minindex];
$arr[$minindex]=$arr[$i];
$arr[$i]=$temp;
}
}
//fetch student recs
$sql="select distinct * from stud";
$result=$conn->query($sql);
//store student records
$students=array();
while($row=$result->fetch_assoc())
{
$students[]=$row;
}
//apply selection sort
selectionsort($students,count($students));
//close db connection
$conn->close();
?>
<!DOCTYPE html>
<head> 
<title>
sorted stud records
</title>
<style>
body{
margin:30px;}
th{
background-color: #4CAF50;
color:white;
}
td,th{
text-align:left;
padding:10px;
border:1px solid #ccc;
}
table{
border-collapse:separate;
border:5px solid #ccc;
width:100%;
}
</style>
</head>
<body>
<h1>Sorted student records</h1>
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Roll_no</th>
</tr>
<?php foreach ($students as $student):?>
  <tr>
<td><?php echo $student['id'];?></td>
<td><?php echo $student['name'];?></td>
<td><?php echo $student['roll_no'];?></td>
</tr>
<?php endforeach ?>
</table>
</body>
</html>


