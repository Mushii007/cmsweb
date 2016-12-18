<?php


class Users{

private $db2;

function __construct($DB_con){

$this->db2 = $DB_con;

 }

public function signup($fname,$lname,$uname,$email,$phone,$address,$pass){
//$new_pass=password_hash($pass, PASSWORD_DEFAULT);

$stmt= $this->db2->prepare("INSERT INTO users 
	(first_name, last_name, username,email, phone, address, password, add_date, user_role) 
	VALUES(:first_name, :last_name, :username, :email, :phone, :address, :password, NOW(),'Pending')");

$stmt->bindparam(":first_name",$fname);
$stmt->bindparam(":last_name",$lname);
$stmt->bindparam(":username",$uname);
$stmt->bindparam(":email",$email);
$stmt->bindparam(":phone",$phone);
$stmt->bindparam(":address",$address);
$stmt->bindparam(":password",$pass);

$stmt->execute();
return true;
  	}
public function roleCheck($role){

        $stmt = $this->db2->prepare("SELECT * FROM users  LIMIT 1");
//          $stmt->execute(array(':uname'=>$uname, ':uemail'=>$uemail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
         // print_r($userRow['password']);
          if($stmt->rowCount() == 1)
          { 
             if($userRow['user_role'] != $role  )
             {
                //$_SESSION['user_session'] = $userRow['id'];
               // $_SESSION['role_session'] = $userRow['user_role'];
              // echo $userRow['password'];
               // echo $_SESSION['role_session'];
                return true;
            }
             else
             {
                return false;
             }   
          }
}




public function signin($uname,$uemail,$pass,$role){

          $stmt = $this->db2->prepare("SELECT * FROM users WHERE username=:uname OR email=:uemail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':uemail'=>$uemail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
         // print_r($userRow['password']);
          if($stmt->rowCount() == 1)
          {

            
             if($userRow['password'] == $pass )
             {

              if($userRow['user_role'] == 'Pending'){

                header("Location: login.php?failure");

              }

              else{
                $_SESSION['user_session'] = $userRow['id'];
               // $_SESSION['role_session'] = $userRow['user_role'];
              // echo $userRow['password'];
               // echo $_SESSION['role_session'];
                return true;
}
             }
             else
             {
               header("Location: login.php?err");
                //return false;
             }
          }
      
}

public function signout(){
        session_destroy();
        unset($_SESSION['user_session']);
        return true;

}
public function is_loggedin(){

	if(isset($_SESSION['user_session']))
      {
         return true;
      }

      return false;
}

public function fbLogin(){
try {
    $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
    $userNode = $profile_request->getGraphUser();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    session_destroy();
    // redirecting user back to app login page
    header("Location: ./");
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  
  // printing $profile array on the screen which holds the basic info about user
//  print_r($userNode);
// echo "Welcome !<br><br>";
//    echo 'Name: ' . $userNode->getName().'<br>';
//    echo 'User ID: ' . $userNode->getId().'<br>';
//    echo 'Email: ' . $userNode->getProperty('email').'<br><br>';

//    $image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
//    echo "Picture<br>";
//    echo "<img src='$image' /><br><br>";

//    $logoutUrl = $helper->getLogoutUrl($accessToken, 'http://localhost/cmsweb/user/login.php');
//    echo '<a href="slogout.php">Logout of Facebook!</a>';

    // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
}





public function redirect($url)
   {
       header("Location: $url");
   }
public function get_user_role($id){

$stmt= $this->db2->prepare("SELECT user_role from users WHERE user_role=:id");
$stmt->execute(array(":id"=>$id));
$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;


}

public function userlist($userquery){

$stmt = $this->db2->prepare($userquery);
$stmt->execute();
if($stmt->rowCount() > 0){

while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{

  echo $row['id'];
  echo $row['first_name'];

  $userArr= array(

    'id'=>$row['id'],
    'name'=>$row['first_name']


    );
}

}

}
}



?>