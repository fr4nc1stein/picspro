<?php 
	include('dbcon.php');
	class system{

	private $db;
	
	function __construct($conn)
	{
		$this->db = $conn;
	}	
	public function login($username,$password){
			try
		{
				$query = $this->db->prepare("SELECT * FROM user WHERE username = ? AND password = ? ");
				$query->execute(array($username,$password));
				$count = $query->rowcount();
				$row = $query->fetch(); 
							
			if( $count > 0 ) { 
				$_SESSION['id']=$row['user_id'];
				$_SESSION['username']=$row['username'];
				$_SESSION['user_type']=$row['user_type'];
					return true;
			}else{ 
					return false;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}	
	}

	public function register($username,$password,$fname,$lname){
        try {	

        	$salt = '$$$$$';
			$hash=hash_hmac('sha512', $salt, $password);

        	//Prepare and execute an insert into DB

        	$query= $this->db->prepare("INSERT INTO user(username,password,fname,lname) 
		                                       VALUES(:username, :password,:fname,:lname)");
        	$query->bindparam(":username", $username);
			$query->bindparam(":password", $hash);
			$query->bindparam(":fname", $fname);
			$query->bindparam(":lname", $lname);
			$query->execute();	
			return $query;					  		
			 // 4. use echo
        	// you should probably return something here...
    		} catch (PDOException $e) {
        	// 5. Fail ~descriptively~
        	echo 'false';
        	// you should probably return something here...
    		}
		}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	public function is_loggedin()
	{
		if(isset($_SESSION['user_id']))
		{
			return true;
		}
	}
	public function logout()
	{
		session_destroy();
		unset($_SESSION['user_id']);
		return true;
	}

	}
$system = new system($conn);
?>