<?php include('src/config.php') ?>
<?php
    if (isset($_POST['cat'])){
       $cat-$_POST['cat'];
       $query=mysqli_query($con,"select * from doctor where Category=$cat ");
       while ($row=mysqli_fetch_array($query){
           $id=$row['id'];
           $doctor=$row['doctor'];
           echo"<option value '$id'>$doctor</option>; 
       })
    }
 ?>