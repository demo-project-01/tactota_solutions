<?php
   require_once("database.php");

class authenitication_model{

  //  public string $result = "";


       public function __construct() {
              $this->mysqli = database::getInstance()->getConnection();
           }

           public function login($username,$password)
           {

               $result = "";
               $query = $this->mysqli->query("SELECT * FROM user_account WHERE username='" . $username . "' AND password='" . $password . "' AND verified=1 OR email='".$username."'");
               if ($query->num_rows > 0) {
                   while ($row = $query->fetch_assoc()) {
                       $result = $row['emp_id'];
                   }
                   return $result;
               }else
               {
                   return 0;
               }
           }

          public function getposition($row){
                   $result = "";

             $query = $this->mysqli->query("SELECT * FROM employee WHERE emp_id = '".$row."'");
			  while ($row = $query->fetch_assoc()) {
                     $result = $row['position'];
                  }
               return $result;
               }


    public function valid_email($email)
    {
        $result = "";
        $query = $this->mysqli->query("SELECT token FROM user_account WHERE email='" . $email . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['token'];
            }
            return $result;
        }else
        {
            return 0;
        }
    }

    public function valid_username($username){
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM user_account WHERE username='" . $username . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['emp_id'];
            }
            return $result;
        }else
        {
            return 0;
        }
    }

    public function getempid(){


        $query = $this->mysqli->query("SELECT * from user_account order by emp_id desc LIMIT 1");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row['emp_id'];
            }

            $result = substr($result, 3, 5);
            $result = (int) $result + 1;
            $result = "EMP" . sprintf('%04s', $result);
             return $result;
        }else
        {
            $result = "EMP0001";

            return $result;
        }



    }
    public function emp_register($emp_id,$firstname,$middlename,$lastname,$nic,$address,$image,$job_position,$mobile_no,$dob,$username,$password,$email,$verified,$token){
        $stmt = $this->mysqli->prepare("INSERT INTO employee (emp_id,first_name,middle_name,last_name,nic,address,image,position,mobile_no,dob)
                                        VALUES (?,?,?,?,?,?,?,?,?,?)");

        if($stmt == false)
        {
            return 0;
        }else{
            $stmt->bind_param('ssssssssss',$emp_id,$firstname,$middlename,$lastname,$nic,$address,$image,$job_position,$mobile_no,$dob);

            $stmt1 = $this->mysqli->prepare("INSERT INTO user_account (emp_id,username,password,email,verified,token)
                                        VALUES (?,?,?,?,?,?)");
            $stmt->execute();
            $stmt1->bind_param('ssssss',$emp_id,$username,$password,$email,$verified,$token);

             return $stmt1->execute();
        }
    }


      public function get_details_search($row)
    {
        $query = $this->mysqli->query("SELECT user_account.emp_id,username,position,verified FROM user_account INNER JOIN employee ON user_account.emp_id=employee.emp_id WHERE position LIKE  '%" . $row . "%' OR username LIKE  '%" . $row . "%' ");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result[] = $row;
            }
            return $result;
        }else
        {
            return 0;
        }
    }

    public function get_view_details($id){
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM user_account INNER JOIN employee ON user_account.emp_id=employee.emp_id AND user_account.emp_id='" . $id . "'");

            while ($row = $query->fetch_assoc()) {
                $result = $row;
            }
            return $result;

    }

    public function search_details($search){
        $result = "";
        $query = $this->mysqli->query("SELECT * FROM user_account INNER JOIN employee ON user_account.emp_id=employee.emp_id AND user_account.username='" . $search . "'");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $result = $row;
            }
            return $result;
        }
    }

    public function active_employee_email($emp_id,$token){
           $verified=1;
        $stmt = $this->mysqli->prepare("UPDATE employee INNER JOIN user_account ON employee.emp_id =user_account.emp_id  SET  user_account.verified= ?
                                        WHERE employee.emp_id=? AND user_account.token=?");
        if($stmt==FALSE)
            return 0;
        else{
            $stmt->bind_param('sss',$verified,$emp_id,$token);
            return $stmt->execute();
        }
    }

    public function update_password($key,$password){
        $stmt = $this->mysqli->prepare("UPDATE  user_account  SET  password=? WHERE email=?");
        if($stmt==FALSE)
            return 0;
        else{
            $stmt->bind_param('ss',$password,$key);
            return $stmt->execute();
        }
    }

    public function active_inactive_account($id,$option){
        $stmt = $this->mysqli->prepare("UPDATE  user_account  SET  verified=? WHERE emp_id=?");
        if($stmt==FALSE)
            return 0;
        else{
            $stmt->bind_param('ss',$option,$id);
            return $stmt->execute();
        }
    }
	 public function get_profile_details($id){//nuwan
        $result = ""; 
        $query = $this->mysqli->query("SELECT * FROM user_account INNER JOIN employee ON user_account.emp_id=employee.emp_id AND user_account.emp_id='" . $id . "'");

            while ($row = $query->fetch_assoc()) {
                $result = $row;
            }
            return $result;


    }

    public function update_profile_details($id,$address,$mobile_no,$email){//nuwan
        $stmt = $this->mysqli->prepare("UPDATE employee INNER JOIN user_account ON employee.emp_id=user_account.emp_id  SET  employee.address= ?,  employee.mobile_no= ? ,  user_account.email= ?  WHERE employee.emp_id=?");
          if($stmt==FALSE)
           return 0;
             else{
              $stmt->bind_param('ssss',$address,$mobile_no,$email,$id);
                return $stmt->execute();
                    }

    }

	public function delete_account($emp_id){
        if($this->mysqli->query("DELETE FROM employee INNER JOIN user_account ON employee.emp_id=user_account.emp_id WHERE employee.emp_id = ".$emp_id.";") == TRUE) {
            return true;
        }
        else return false;
    }

}
