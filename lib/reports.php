<?php
	
	class reports{

	private $db;

	function __construct($conn)
	{
		$this->db = $conn;
	}
	
	public function count_members()
	{

		$query = $this->db->prepare("SELECT * FROM member");
		$query->execute();
		$count = $query->rowCount();
		echo $count;
	}

	public function count_gender($gender)
	{

		$query = $this->db->prepare("SELECT * FROM member where gender='$gender' ");
		$query->execute();
		$count = $query->rowCount();
		echo $count;
	}

	public function member_type($type)
	{

		$query = $this->db->prepare("SELECT * FROM member where member_type='$type' ");
		$query->execute();
		$count = $query->rowCount();
		echo $count;
	}
}

$reports = new reports($conn);

?>
