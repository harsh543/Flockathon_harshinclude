<?php
$userId=$_POST['userid'];
       // constructor
        require_once 'include/DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $conn = $db->connect();
if($stmt = $conn->prepare("SELECT usertoken FROM users WHERE userid = ?")) {

   $stmt->bind_param("s", $userId); 
   $stmt->execute(); 
$stmt->bind_result($token);


}

$stmt->fetch();
   $ch = curl_init();  
   $postData='?token='.$token.'&groupId='.$_POST['groupid'];

   $url='https://api.flock.co/v1/groups.getMembers'.$postData;
     curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);  
 
    $output=curl_exec($ch);
  
    curl_close($ch);
    $arr_userids=json_decode($output,true);   
if(!empty($_POST['except_name'])) 
$names_arr=explode(',',$_POST['except_name']);

     

   for($j=0;$j<count($arr_userids)-1;$j++){
   
  
    if(($userId != $arr_userids[$j]['id']) || (!empty($_POST['except_name'])&&!in_array($arr_userids[$j]['name'],$names_arr))){
 $ch = curl_init();
$postData='?token='.$token.'&to='.$arr_userids[$j]['id'].'&text='.urlencode($_POST['message']);
    $url='https://api.flock.co/v1/chat.sendMessage'.$postData;

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);  
 
    
 $output=curl_exec($ch);
var_dump($output);

 curl_close($ch);
}
}
$ch = curl_init();  
    $postData='?token='.$token; 
   $url='https://api.flock.co/v1/groups.list'.$postData;
     curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);  
    
   
    $output=curl_exec($ch);
    $name_arr=array(); 
    curl_close($ch);
  $arr=json_decode(($output),true);
if(!empty($_POST['except_name'])) 
$names_arr=explode(',',$_POST['except_name']);

 if(!empty($_POST['groups_name'])){ 
for($i=0;$i<count($arr);$i++){

if(!empty($except_name)&&!(in_array($arr[$i]['name'],$except_name))||($arr[$i]['name']==$except_name))
{
  
   $ch = curl_init();  
   $postData='?token='.$_POST['token'].'&groupId='.$arr[$i]['id'];
   $url='https://api.flock.co/v1/groups.getMembers'.$postData;
      $url='https://api.flock.co/v1/groups.list';
    $output=curl_exec($ch);
   
    curl_close($ch);
    $arr_userids=json_decode($output,true);    

    

}
$url='https://api.flock.co/v1/chat.sendMessage';
     
for($j=0;$j<count($arr_userids);$j++){
   if(($token != $arr_userids[$j]['id']) || (!empty($_POST['except_name'])&&!in_array($arr_userids[$j]['name'],$names_arr))){
     $ch = curl_init();  
    $postData='?token='.$token.'&to='.$arr_userids[$j]['id'].'&text='.$_POST['message'];
    $url='https://api.flock.co/v1/chat.sendMessage'.$postData;
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);  
 
    
 $output=curl_exec($ch);
var_dump($output);

 curl_close($ch);
}
}
}
}
 
   ?>
