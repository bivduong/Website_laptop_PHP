<?php
	$filepath = realpath(dirname(__FILE__));
	
	
	include_once($filepath.'/../lib/database.php');
	include_once($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class feecback
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_feedback($data,$id){
			
			

			$customer_id = mysqli_real_escape_string($this->db->link, $id);
			$title = mysqli_real_escape_string($this->db->link,$data['title']);
$content = mysqli_real_escape_string($this->db->link,$data['content']);
			if($title==""|| $content=="") {
				$alert = "Title not empty";
				return $alert;
			}else{
				$query = "INSERT INTO contact(customer_id,title,content) values('$customer_id','$title','$content')";
				$result = $this->db->insert($query);
				if($result){
					$alert="<span class='sucess' style='color:blue;'>Send successfull</span>";
					return $alert;
				}
				else{
					$alert="<span class='error' style='color:red;'>Insert not Successfull</span>";
					return $alert;

				}
						
		}

	}
	public function show_feedback(){
		$query = "SELECT contact.contact_id, account.name,account.email,account.phone,contact.title,contact.content FROM contact,account WHERE contact.customer_id=account.id ";
			$result = $this->db->select($query);
			return $result;
	}
	public function del_contact($id){
			$query = "DELETE FROM contact where contact_id = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Xoa thanh cong</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Xoa that bai</span>";
				return $alert;
			}
			
		}
	public function show_feedback_limit()
	{
		$query="SELECT contact.contact_id, account.name,account.email,account.phone,contact.title,contact.content,contact.date_time FROM contact,account WHERE contact.customer_id=account.id order by contact.contact_id desc LIMIT 8";
		$result = $this->db->select($query);
			return $result;
	}
	
	
}
?>