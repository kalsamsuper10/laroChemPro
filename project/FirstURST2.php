<!DOCTYPE html>
<html>  
<head>  
<title>FirstURST2</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css" />

<body>

<div id="container">
    <div id="header">
<h1>La Roche College<br>Department of Chemistry<br>Course Assessment Form</h1>
</div>

<?php include('phpconnect2.php'); ?>
    
<div id="content">
    <div id ="nav">
<h3>
    <form action="FirstURST2.php" method="post">
    <input type="hidden" name="submitted1" value="true" />
    <select name= "coursecode" onchange ='this.form.submit()'>
    <option value="Select a Year/Sec">Select a Year/Section</option>    
    <?php while($row = mysqli_fetch_array($resultdrop)):;?>
    <option value = "<?php echo $row[0];?>"><?php echo $row[0];?></option>
    <?php endwhile;?>
    </select>
    <noscript><input type="submit" value="Submit"></noscript>  
</form>
</h3>
</div>    


<div id = "main">
<?php  
if(isset($_POST["submitted1"])){    
include('phpconnect2.php');
$coursecode = $_POST["coursecode"];
$ID = 'ID';
$query = "SELECT * FROM ChemClasses WHERE '$coursecode' = $ID";    
$result = mysqli_query($dbcon, $query) or die("error: $query");   
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
echo "</div>";
echo "</div><h3>";
echo "<h4>";
echo "<label>Course Sec:</label>";
echo "<input type ='text' id= 'Course Sec' name= 'Course Sec' value= {$row['ID']} size ='20' />";
echo "<label> Semester:</label>";
echo "<input type ='text' id= 'Semester' name= 'Semester' value= {$row['Semester']} size ='20' />";
echo "<br>";
echo "<label>Course Title:</label>";
echo "<input type ='text' id= 'Course Title' name= 'Course Title' value= '".$row['Course Title']."' size ='20' />";   
echo "<label> Instructor:</label>";
echo "<input type ='text' id= 'Instructor' name= 'Instructor' value= '".$row['Instructor']."' size ='20' />";   
echo "</h4>";      
}   
}
?> 
    
<?php
    
    if (isset($_POST['submitted2'])){
        
    include('phpconnect2.php');
        
    $SLOID = $_POST['SLOID'];
    $Knowledge_Base = $_POST['Knowledge_Base'];
    $Lab_Skills = $_POST['Lab_Skills'];
    $Practice = $_POST['Practice'];
    $Societal_Connects = $_POST['Societal_Connects'];
    $Capstone = $_POST['Capstone'];
    $sqlinsert = "INSERT INTO SLOform (SLOID, Knowledge_Base, Lab_Skills, Practice, Societal_Connects, Capstone) VALUES ('$SLOID', '$Knowledge_Base', '$Lab_Skills', '$Practice', '$Societal_Connects', '$Capstone')";
     
        if(!mysqli_query($dbcon,$sqlinsert)){
            die('error inserting');
        }
    }
    ?>
    <form action="FirstURST2.php" method="post">
    <input type="hidden" name="submitted2" value="true" />
    <fieldset>
    <legend>Student Learning Outcomes (SLOs) addressed in this course (Please input Yes or No):</legend>
        <label>SLOID: <input type = text name = "SLOID" /></label>
        <label>Knowledge_Base: <input type = text name = "Knowledge_Base" /></label>
        <label>Lab_Skills: <input type = text name = "Lab_Skills" /></label><br>
        <label>Practice: <input type = text name = "Practice" /></label>
        <label>Societal_Connects: <input type = text name = "Societal_Connects" /></label>
        <label>Capstone: <input type = text name = "Capstone" /></label>
    </fieldset>
    <input type= "submit" value="Update SLO" />
    
    
</div>
</div>   
</div>
</body>

    

 








    