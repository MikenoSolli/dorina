<?php
         echo $name=$_POST['username'];
         echo $pass=$_POST['pass']; 
     
       
           
?>
<?php
$host = "localhost"; //IP of your database
$userName = "root"; //Username for database login
$userPass = ""; //Password associated with the username
$database = "dorina"; //Your database name

$connectQuery = mysqli_connect($host,$userName,$userPass,$database);

if(mysqli_connect_errno()){
    echo mysqli_connect_error();
    exit();
}else{
    $selectQuery = "SELECT credentials.id, credentials.username, credentials.password ,person.Name,person.level FROM person inner join credentials on person.id=credentials.id ";
    $result = mysqli_query($connectQuery,$selectQuery);
    if(mysqli_num_rows($result) > 0){
    }else{
        $msg = "No Record found";
    }
}

         while($row = mysqli_fetch_assoc($result)){
        
        
           
             
            
               if ($name==  $row['username'] && 
                  $pass == $row['password']) {
                      echo"<script>
                    function showMessage(message) {
                        if (!('Notification' in window)) {
                          // Code to run if notifications are not
                          // supported by the visitor's browser
                        } else {
                          if (Notification.permission === 'granted') {
                            var notification = new Notification(message);
                          } else if (Notification.permission !== 'denied') {
                            Notification.requestPermission().then(function (permission) {
                              if (permission === 'granted') {
                                var notification = new Notification(message);
                              }
                        });
                          }
                        }
                      }
                      
                      showMessage('You have logged in.');
                      </script>";
                  echo $page = $row['level'];
                session_start();
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                 $_SESSION['varName'] = $row['id'];
                  
                  
                  header( "Location: ".$page.".php" );
                  
                  echo 'You have entered valid use name and password';
               }else {
                 
                  $msg = 'Wrong username or password';
                
               }
            }
            
?>