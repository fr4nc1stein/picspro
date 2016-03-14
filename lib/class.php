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

				$_SESSION['isAdminLoggedIn']=1;
				$_SESSION['user_id']=$row['user_id'];
				$_SESSION['username']=$row['username'];
				$_SESSION['user_type']=$row['user_type'];
				$_SESSION['valid'] = true;
         		$_SESSION['timeout'] = time();

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

		public function membership($email_address,$member_type,$gender,$lastname,$firstname,$middlename,$birthday,$placeofbirth,$company_name,$company_address,$position,$residence_address,$mobile_number,$specialization,$membership_other){
	        try {
	      //Prepare and execute an insert into DB
	      $query= $this->db->prepare("INSERT INTO member(email_address,member_type,gender,lastname,firstname,middlename,birthday,placeofbirth,company_name,company_address,position,residence_address,mobile_number,specialization,membership_other,date_registration)
			                                    VALUES(:email_address,:member_type,:gender,:lastname,:firstname,:middlename,:birthday,:placeofbirth,:company_name,:company_address,:position,:residence_address,:mobile_number,:specialization,:membership_other,NOW())");
	      $query->bindparam(":email_address", $email_address);
				$query->bindparam(":member_type", $member_type);
				$query->bindparam(":gender", $gender);
				$query->bindparam(":lastname", $lastname);
				$query->bindparam(":firstname", $firstname);
				$query->bindparam(":middlename", $middlename);
				$query->bindparam(":birthday", $birthday);
				$query->bindparam(":placeofbirth", $placeofbirth);
				$query->bindparam(":company_name", $company_name);
				$query->bindparam(":company_address", $company_address);
				$query->bindparam(":position", $position);
				$query->bindparam(":residence_address", $residence_address);
				$query->bindparam(":mobile_number", $mobile_number);
				$query->bindparam(":specialization", $specialization);
				$query->bindparam(":membership_other", $membership_other);
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

	public function logout()
	{
		session_destroy();
		unset($_SESSION['user_id']);
		return true;
	}

	public function session_check()
	{

		if (trim($_SESSION['user_id']) == '') {
    	header("location: index.php");
		}
	}
}

$system = new system($conn);

?>
