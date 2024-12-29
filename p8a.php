<!DOCTYPE html>
<head>
<style>
body{
font-family:Arial, sans-serif;
}

.container{
background:lightpink;
text-align:center;
align-items:center;
padding:10px;
margin-top:20px;
max-width:50%;
border:1px solid #ccc;
border-radius:4px;
}
</style>

<title>Visitor counter</title>
</head>
<body>
<div class="container">
<h1>Welcome<br>to<br>CIT!!</h1>
<?php
$count="count.txt";
if(!file_exists($count))
{
file_put_contents($count,0);
}
$visitorCount=file_get_contents($count);
$visitorCount++;
file_put_contents($count,$visitorCount);
?>
<p>You are visitor number:<strong><?php echo $visitorCount;?></strong></p?
</div>
</body>
</html>
