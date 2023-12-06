
<?php 
session_start();
if(!isset($_SESSION['userdata'])){
    header("location:../");
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0){
    $status = '<b style="color:red"> Not voted</b>';
}
else{
    $status = '<b style="color:green"> voted</b>';
}



?>

<html>
    <head>
        <title>Online Voting System-Dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">    
    </head>
    <body>

    <style>
        #backbtn{
            padding: 5px;
            border-radius: 5px;
           background-color: #48dbfb;
           color: white;
           font-size: 15px;
           float: left;
           margin: 15px;
        }
        #logoutbtn{
            padding: 5px;
            border-radius: 5px;
           background-color: #48dbfb;
           color: white;
           font-size: 15px;
           float: right;
           margin: 15px;
        }
        #profile{
            background-color: white;
            width: 30%;
            padding: 20px;
            float:left;
        }
        #Group{
            background-color: white;
            width: 60%;
            padding: 20px;
            float: right;

        }
        #votebtn{
            padding: 5px;
            border-radius: 5px;
           background-color: #48dbfb;
           color: white;
           font-size: 15px;
           float: left;

        }
        #mainpanel{
            padding: 10px;

        }
        #headersection{
            padding: 10px;

        }
        #voted{
            padding: 5px;
            border-radius: 5px;
           background-color: grren;
           color: white;
           font-size: 15px;
           float: left;

        }
    </style>

    <div id="mainsection">
        <center>
        <div id="headersection">
        <a href="../"><Button id="backbtn" >Back</Button></a>
        <a href="logout.php"> <Button id="logoutbtn">Logout</Button></a>
           <h1>Online Voting System</h1>
       </div>
       </center>
       <hr>
       
    <div id="mainpanel">

       <div id="profile">
       <center> <img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100"></center><br>
        <b>Name:</b> <?php echo $userdata['name'] ?><br><br>
        <b>Mobile:</b> <?php echo $userdata['mobile'] ?><br><br>
        <b>Address:</b> <?php echo $userdata['address'] ?><br><br>
        <b>Status:</b>  <?php echo $status ?><br>
       </div>
       
       <div id="Group">
        <?php
           
         if($_SESSION['groupsdata']){
              for($i=0; $i<count($groupsdata); $i++){
                ?>
                <div>
                    <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                <b>GroupName:</b><?php echo $groupsdata[$i]['name']?><br><br>
                <b>Votes: </b><?php echo $groupsdata[$i]['votes']?> <br><br>

                <form action="../api/vote.php" method="POST">
                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">

                <?php
                    if($_SESSION['userdata']['status']==0){
                        ?>
                        <input type="submit" name="votebtn" value="Vote" id="votebtn"><br><br>
                        <?php

                    }
                    else{
                        ?>
                        <button Button disabled  type="button" name="votebtn" value="Vote" id="voted">Voted</button><br><br>
                        <?php

                    }
                ?>
                    
                </form>
                </div>  
                <hr>         
                 <?php
             }

           }
           else{

           }
        
        ?>

       </div>

    </div>

       
       
    </div>  
        
    </body>
</html>

