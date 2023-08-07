<?php 

/**
 * 
 */
class User extends Db
{
	public $db; 
	
	public static $uname;
	public static $firstname;
	public static $lastname;
	public static $email;
	

	public function __construct()
	{
		 $this->db = parent::__construct();
		 date_default_timezone_set("Africa/lagos");
		  
	} 
	public static function login($fusername,$fpassword){
		$db =new Db;
		$user =  $db->fetch('users','','uname = ? AND password = ?',array( $fusername,$fpassword),'','','');

		if (count($user) > 0 ) {
			self::$firstname = $user[0]['firstname'];
			self::$lastname = $user[0]['lastname'];
			$_SESSION['uname'] = self::$uname = $user[0]['uname'];
			 $_SESSION['email'] = self::$email = $user[0]['email'];

			return true;
		}
		else{
			return false;
		}
	}

	/* Checks if a Visitor Id Number Has been Assigned */
	public function check_id_no($id_no){
		$res = $this->fetch('sign_in','','id_no = ?',$id_no,'','','');
		if (count($res) > 0) {
			return true; // that is id has been taken
		}else{
			return false;// that is id has not been taken
		}
	}
	/* Generates Visitor's Id Number  */
	public function id_no_generator()
	{
		$date  = time();
	    $unique = substr(uniqid(), 2,5);
	    return $id_no = 'Vis/'.date('Ymd/His',$date).'/'.$unique;
	}
	/* Sign In Visitors */
	public function sign_in($registration_number,$model_make,$vehicle_type,$vehicle_colour,$fullname,$email,$phone,$address,$reasons,$image = 'images/avatar_profile.png')
	{
         
         // call id generator
         $id_no = $this->id_no_generator();
         $check_id_no = $this->check_id_no($id_no);
         while ($check_id_no == true) {
         	$id_no = $this->id_no_generator();
         	$check_id_no = $this->check_id_no($id_no);
         }
         if ($check_id_no == false) 
         {
         	$ip=$_SERVER['REMOTE_ADDR'];
         	$loginTime = date('Y-m-d h:i:s a');

	        $this->insert('sign_in',
			array('id','id_no','registration_number','model_make','vehicle_type','vehicle_colour', 'full_name', 'email','phone','address','reasons','image','sign_in_time','ip_address'),
			array('',$id_no,$registration_number,$model_make,$vehicle_type,$vehicle_colour,$fullname,$email,$phone,$address,$reasons,$image,$loginTime,$ip));
	        $_SESSION['latest_sign_in_visitors'] = $id_no;
	       
	        return true;
 	     } 

		 
	}
		public function fetch_sign_in()
		{
		    $user =  $this->fetch('sign_in','',' ','','','','');
			return $user ;			 
		}
		// check that visitor's id is correct

		// check credentials of the person that is signing out visitor;s if it is correct

		public function sign_out_user($id ){
		// first verify that the visitors id is correct
			if($this->check_id_no($id) == false){
				return false; // Meaning Visitor Id is not Correct
			}
			
			else  {
				// checks if user has already signed out
				$res = $this->fetch('sign_in','','id_no = ? ',$id,'','','');
				if (!is_null($res[0]['sign_out_time'])) {
					return $res[0]['sign_out_time'];
				}else{

				$this->query("UPDATE sign_in set sign_out_time = :stime where id_no = :id ");
				$this->bind(':stime', date('Y-m-d h:i:s a'));
				$this->bind(':id', $id);
				$this->execute();
				return 3;
				}
			
			}	 
		}
		
		
		/* Delete Methods */
		/*1. Delete Visitor */
		public function DeleteVisitor($id)
		{
			$this->query("DELETE FROM sign_in where id_no = :id");
			$this->bind(':id',$id);
			$this->execute();
			return  true;
		}
		/*2. Delete User */
		public function DeleteUser($id)
		{
			$this->query("DELETE FROM users where id = :id");
			$this->bind(':id',$id);
			$this->execute();
			return  true;
		}

		/* End of Delete Methods */

		public function AddUsers($fname,$lname,$uname,$email,$pword,$image = 'images/avatar_profile.png')
		{
 			// check if email has been taken
			if (count($this->CheckIfEmailIsTaken($email)) > 0) {
				return 'email taken';
			}
			elseif (count($this->CheckIfUsernameIsTaken($uname)) > 0 ) {
				return 'username taken';
			}
			else{
 			//check if username has been taken    
         	$ip=$_SERVER['REMOTE_ADDR'];
         	$registerTime = date('Y-m-d h:i:s a');
	        $this->insert('users',
			array('id','firstname', 'lastname','uname', 'email','password','ip','date','is_active','rank','img_profile'),
			array('',$fname,$lname,$uname,$email,$pword,$ip,$registerTime,1,2,$image));
	       
	        return true;
 	     } 		 
 	   }
 /*=============================================================================================================================*/ 	     
		/* Checker Methods */
		public function CheckIfUsernameIsTaken($uname){
			return $this->fetch('users','','uname = ? ', $uname,'','','');
		}
		public function CheckIfEmailIsTaken($email){
			return $this->fetch('users','','email = ? ', $email,'','','');
		}
		/* End of Checker Methods */
		
/*=============================================================================================================================*/
 	   /* Getters Methods: Users, Visitors, */

 	   public function GetUsers()
		{
 			return $this->fetch('users','','rank <> ?',1,'date desc','','');
			
 	     }
        public function getUser(){
            return $this->fetch('users','','uname = ?',$_SESSION['uname'],'date desc','','');
        }
 	     /* Get Logged in user Image */
		public function GetImage()
		{
			$user =  $this->fetch('users','',' uname = ?',$_SESSION['uname'],'','','');
			return $image = $user[0]['img_profile'];
		}
		public function GetTodayVisitors($today,$count_sign_out=null)
		{
			if ($count_sign_out == true) {
			  $this->query("SELECT COUNT(*) as total FROM `sign_in` WHERE sign_out_time  <> '' ");
			  return $this->fetchresult();
			}else{

			  $this->query("SELECT COUNT(*) as total FROM `sign_in` WHERE sign_in_time  like '$today%'");
			  return $this->fetchresult();
			  }
			
		}
		/* Fetch All Sign_in Visitor's Details */
		public function GetVisitors($id_no = null)
		{
			if ( is_null($id_no)) {
				return  $user =  $this->fetch('sign_in','',' ','','sign_in_time desc','','');
			}
			else{
				return  $user =  $this->fetch('sign_in','','id_no = ? ',$id_no,'','','');
			}
				
		}

 	     /* End of Getters Methods */
/*=============================================================================================================================*/ 	     
		


		public function fetchProfileDetails(){
			 $res=$this->fetch('users','','uname = ?',$_SESSION['uname'],'','','');
			 return $res;
		}
		public function fetch_password($oldpass){
			$username = $_SESSION['uname'];
			$user =  $this->fetch('users','','uname = ? AND password = ?',array($username,$oldpass),'','','');
			if (count($user) > 0) {
				return true;
			}else{
			return false ;						
			}
		}
		public function change_password($np,$oldpass){
			//$con="update user set password=?  where id=? and password = ?";
			$this->query("UPDATE users set password= :a where uname=:c and password=:d");
			$this->bind(':a', $np);
			$this->bind(':c', $_SESSION['uname']);
			$this->bind(':d', $oldpass);
			$this->execute();
			
		}

		public function update_profile($fname,$lname,$pics){
			if (empty($pics)) {
				$pics = $this->fetchProfileDetails()[0]['img_profile'];
			}
			
			$this->query("UPDATE users set firstname=:fname,lastname=:lname,img_profile =:f where uname=:g");
			$this->bind(':fname', $fname);
			$this->bind(':lname', $lname);
			
			$this->bind(':f', $pics);
			$this->bind(':g', $_SESSION['uname']);
			$this->execute();
			
		}

		public static function FileHandler($name)
	{
	    $file = $_FILES[$name];
	    $img = $file['name']; // holds image name
	    $imgTmp = $file['tmp_name'];// holds image temperal name
	    $destination = 'uploaded/'.$img;// holds destination
	    $imageType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));
	    $check = getimagesize($imgTmp);
	    if ($check !== false) {
	    	 move_uploaded_file($imgTmp, '../'.$destination);
	        return $destination;
	    }

	}
	public static function timeago($curr_time){
			$time = strtotime($curr_time);
			// converts timestamp to time ago
			//calculates the difference btw current current time and given timestamp in seconds
			$diff = time() - $time;
			//echo time().' diff is:'.$diff.' dbtime is:'.$time;
			// time difference in seconds
			$sec = $diff;
		

			// convert time difference in minues
			$min = round($diff/60);
			// convert time difference in hours
			$hrs = round($diff / 3600);

			// convert time difference in days
			$days = round($diff/86400);

			// convert time difference in weeks
			$weeks = round($diff/604800);
			// convert time difference in months
			$mnths = round($diff/2600640);

			// convert time difference in yrs
			$yrs = round($diff/31207680);

			//check for seconds
			if ($sec <= 60) {
				return "$sec seconds ago";
			}elseif ($min <=60) {
				if ($min == 1) {
					return "one minute ago";
				}else{
					return "$min minutes ago";
				}
			}
			// chec for hours
			elseif ($hrs <= 24) {
				if ($hrs == 1) {
					return("an hour ago");
				}else{
					return("$hrs hours ago");
				}
			}
			//check for days
			elseif ($days <= 7) {
				if ($days == 1) {
					return("yesterday");
				}else{
					return("$days days ago");
				}
			}
			// check for weeks
			elseif ($weeks <= 4.3) {
				if ($weeks == 1) {
					return("a week ago");
				}else{
					return("$weeks weeks ago");
				}
			}
			//check for months
			elseif ($mnths <= 12) {
				if ($mnths == 1) {
					return("a month ago");
				}else{
					return("$mnths months ago");
				}
			}
			// check for years
			else{
				if ($yrs == 1) {
					return "one year ago";
				}else{
					return "$yrs years ago";
				}
			}
		} 
	
	

}
 ?>