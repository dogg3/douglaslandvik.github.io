<?php  
session_start();
mysql_connect("localhost", "root", "");
mysql_select_db('logintest');
$id = $_SESSION['id'];
$query = mysql_query("SELECT * FROM anvand WHERE id='$id'");
$row = mysql_fetch_assoc($query);
?>



<!DOCTYPE html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LOG IN</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="loginsql.css" rel="stylesheet">

</head>
<body>

    <?php include 'header.php'; ?>





        <div class=" sida col-xs-12">
        
          

          <form class= "regga col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3" action="upload_image.php" method="post" enctype="multipart/form-data">
                <fieldset><h2>update your profile picture</h2></fieldset>
          <div class="row">
               <?php  
      if (!$row['file']) {
        $avatar = "facebook-avatar.jpg";
        
     
          }

          else {
             $avatar = $row['file'];
             
          }




          
            echo "<div class='col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5 profilbild'><div class='updatePP'>change pp</div><img src='profilePhotos/".$avatar."'></div>";
              ?>
          </div>

              <input class="col-xs-12" type="hidden" name="MAX_FILE_SIZE" value="1000000" />
              <input class="filehora col-xs-8 col-md-4 col-md-offset-4 col-xs-offset-2" type="file" name="image" value="chose image" placholder="chose image"/>
              <input class="col-xs-4 col-xs-offset-4" type="submit" name="upload" value="upload" />
              </form>
             





          <form class="regga col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3" enctype="multipart/form-data" action="updateProfile.inc.php" method="POST">
            
            <fieldset><h2>update your player profile</h2></fieldset>
            

            <h5>position</h5>
 
            <input class="col-xs-12 col-md-10 col-md-offset-1" value="<?php echo $row['position']?>"  type="text" name="position">
            <h5>foot</h5>
       
            <input class="col-xs-12 col-md-10 col-md-offset-1" value="<?php echo $row['foot']?>"  type="text" name="foot">
              <h5>club</h5>
            <input class="col-xs-12 col-md-10 col-md-offset-1" value="<?php echo $row['club']?>" type="text" name="club">
            <h5>year you joined current club</h5>
            
         <input class="col-xs-12 col-md-10 col-md-offset-1" value="<?php echo $row['startYearClub']?>" type="text" name="startYearClub">
            <h5>games played</h5>
            <input class="col-xs-12 col-md-10 col-md-offset-1" value="<?php echo $row['gamesPlayed']?>" type="text" name="gamesPlayed" placeholder="games played">
            <h5> goals</h5>
            <input class="col-xs-12 col-md-10 col-md-offset-1" value="<?php echo $row['goals']?>" type="text" name="goals" placeholder="goals">
             <h5> assists</h5>
            <input class="col-xs-12 col-md-10 col-md-offset-1" value="<?php echo $row['assists']?>" type="text" name="assists" placeholder="assists">
          <h5>highlight video embed url</h5>
            <input class="col-xs-12 col-md-10 col-md-offset-1" value="<?php echo $row['video']?>" type="text" name="video" >
            <!-- <h5>full game video embed url</h5>
            <input class="col-xs-12 col-md-10 col-md-offset-1" value="<?php echo $row['video']?>" type="text" name="video" > 
            -->
                        <button class="button col-xs-6 col-xs-offset-3" type="submit">update</button>
            
          </form>

          </div>
        
 
 
<?php include 'footer.php' ?>



</body>
</html>