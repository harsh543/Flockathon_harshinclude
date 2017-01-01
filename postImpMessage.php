<!doctype html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <title>Post Messages</title>
  
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700">
  <link rel="stylesheet" type="text/css">

  <style>

  .formarea{
    width: 100%;
  }
  .formarea textarea{
    display: block;
    width: 100%;
    border:1px solid #ccc;
                resize:none;
                height:200px;    
  }
  .formarea textarea:focus{
    border-color:#000;
  }
  .formarea .btnsub{
                margin-top:20px;
    border:0;
    width: 100%;
    height: 36px;
    line-height: 36px;
    text-align: center;
    background-color: #2ed177;
    color:#fff;
    border-radius:18px;
    text-transform: capitalize;
    font-size: 14px;
  }

  </style>
</head>


  
<body>
 



<form action="processMessages.php" method="post">
  <div class="formarea">
<label>Any other group Name</label></br>
<input name="groups_name" "margin-bottom:50px;" type="text" size="50" /><br/>
<label style=>Excluding anybody?</label></br>
<input name="except_name" type="text"  size="50" />
<h4>Enter the message here:</h4>

    <textarea name="message"></textarea>
               <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$flockarr=json_decode($_GET['flockEvent'],true);

$chat=$flockarr['chat'];

   
$userid=$flockarr['userId'];

  ?>
         
               <input type="hidden" name="userid" value="<?=$userid?>" />

                <input type="hidden" name="groupid" value="<?=$chat?>" />
                 

                  <button class="btnsub">Post</button>
  </div>
</form>

 
</body>


</html>
