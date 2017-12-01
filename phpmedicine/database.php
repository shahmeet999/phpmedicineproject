<?php
class database
{
	
public function connection()
{
    
	$con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
    return $con;
}


   public function question_my($eid)
   {
    $res=mysql_query("select q.*,u.* from question_tbl as q,user_tbl as u  where q.email_id=$eid and question_status='accept' order by q.question_id desc ",$this->connection());
	return $res;
   }


		public function delete_fav($id)
		{
		$res=mysql_query("delete from favourite_tbl where favourite_id='$id'",$this->connection());
		return $res;
		}



	public function Favourite_join($eid)
	{
		$res=mysql_query("select p.*,f.* from product_tbl as p,favourite_tbl as f where p.product_id=f.product_id and f.email_id='$eid'",$this->connection());
		return $res;
	}


    public function display_product($fid)
    {
    $res=mysql_query("select * from product_tbl where product_id='$fid'",$this->connection()); 
	return $res;
    }

    public function fav_add($fid,$name,$amt)
    {
    $res=mysql_query("insert into favourite_tbl values('NULL','$fid','$name','$amt')",$this->connection()); 
	return $res;
    }
 public function check_fav($eid,$pid)
    {
        
        $res=mysql_query("SELECT * FROM favourite_tbl WHERE email_id='$eid' and product_id='$pid'",$this->connection());
		$cnt=mysql_num_rows($res);
        return $cnt;
    }
	



	public function count_Fav($eid)
	{
	//	$con=mysql_connect('localhost','root','');
	//	mysql_select_db('medicine',$con);
		$res=mysql_query("select *  from favourite_tbl where email_id='$eid'",$this->connection());
		return $res;
	}


	public function final_amount_history_page($eid)
	{
	//	$con=mysql_connect('localhost','root','');
	//	mysql_select_db('medicine',$con);
		$res=mysql_query("select sum(total_price) as 'total_amount' from order_tbl where email_id='$eid' and status='buy'",$this->connection());
		return $res;
	}

	public function product_join_history($eid)
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('medicine',$con);
		$res=mysql_query("select p.*,o.* from product_tbl as p,order_tbl as o where p.product_id=o.product_id and o.email_id='$eid' and o.status='buy' order by o.order_id desc ",$con);
		return $res;
	}

	public function history_count($eid)
	{
	//	$con=mysql_connect('localhost','root','');
//		mysql_select_db('medicine',$con);
		$res=mysql_query("select * from order_tbl where email_id='$eid' and status='buy'",$this->connection());
		return $res;
	}

		public function delete_cart($id)
		{
		$res=mysql_query("delete from order_tbl where order_id='$id'",$this->connection());
		return $res;
		}

	public function cart_cnt($id)
	{
	//	$con=mysql_connect('localhost','root','');
	//	mysql_select_db('medicine',$con);
		$res=mysql_query("select * from order_tbl where email_id='$id' and status='cart'",$this->connection());
		$cnt=mysql_num_rows($res);
        return $cnt;
    
	}
	public function final_amount_cart_page($eid)
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('medicine',$con);
		$res=mysql_query("select sum(total_price) as 'total_amount' from order_tbl where email_id='$eid' and status='cart'",$con);
		return $res;
	}
	public function product_join_cart($eid)
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('medicine',$con);
		$res=mysql_query("select p.*,o.* from product_tbl as p,order_tbl as o where p.product_id=o.product_id and o.email_id='$eid' and o.status='cart'",$con);
		return $res;
	}
	public function count_display($eid)
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('medicine',$con);
		$res=mysql_query("select * from order_tbl where email_id='$eid' and status='cart'");
		return $res;
	}
	public function wishlist_add($date,$qty,$pid,$email,$amt,$flag,$productprice)
	{
		$id="Null";
		$con=mysql_connect('localhost','root','');
		mysql_select_db('medicine',$con);
		$res=mysql_query("insert into order_tbl values('$id','$date','$qty','$pid','$email','$amt',
		'$flag','$productprice')",$con);
		return $res;
	}
public function view_product($proid)
	{
		$con=mysql_connect('localhost','root','');
		mysql_select_db('medicine',$con);
		$res=mysql_query("select product_price from product_tbl where product_id='$proid'");
		return $res;
	}
	 public function checkcart($eid,$pid)
    {
        $con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
        $res=mysql_query("SELECT * FROM order_tbl WHERE email_id='$eid' and product_id='$pid' and status='cart'",$con);
		$cnt=mysql_num_rows($res);
        return $cnt;
    }
	
		
    public function get_selected_address_of_user($eid)
    {
    $con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
    $res=mysql_query("select * from user_tbl where email_id='$eid'",$con);
    return $res;
    }
    public function update_cart_address($newadd,$eid)
    {
    $con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
    $res=mysql_query("update user_tbl set ship_address='$newadd' where email_id='$eid'",$con);
    }
    public function add_prescription($target_file,$eid)
    {
    $con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
    $res=mysql_query("insert into prescription_tbl values('NULL','$target_file','$eid')",$con); 
   
    }

    public function sidebar_product_count()
    {
        
	$con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
    $res1=mysql_query("select * from company_tbl",$con);
    $cnt=mysql_num_rows($res1);
    return $cnt;
    }

    public function sidebar_product_display()
    {

	$con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
	$cnt1=mysql_query('select count(p.product_id) "cnt",c.* from product_tbl as p,company_tbl as c where p.company_id=c.company_id group by c.company_name',$con);
    return $cnt1;

    }
    public function alphabetic_search($ch)
    {

    $con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
    $res=mysql_query("select * from product_tbl where product_name LIKE '$ch%'");
    return $res;

    }
    public function view_some_product()
    { 
         
    $con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con); 
    $res=mysql_query("select p.*,c.company_name from product_tbl as p,company_tbl as c where p.company_id=c.company_id and p.status='available' ORDER BY p.product_id desc LIMIT 0, 12",$con);
    return $res;
    }
	
    public function view_products()
    { 
         
    $con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con); 
    $res=mysql_query("select p.*,c.company_name from product_tbl as p,company_tbl as c where p.company_id=c.company_id ORDER BY p.product_id desc ",$con);
    return $res;
    }
   public function signup($id,$uname,$pass,$add,$city,$zip,$gen,$mob,$temp)
   {
	
   $con=mysql_connect('localhost','root','');
   mysql_select_db('medicine',$con);
   $res=mysql_query("insert into user_tbl values('$id','$uname','$pass','$add','$city','$zip','$gen','$mob','$temp','user')");
   
   }

    public function login($name,$passs)
   {
	$con=mysql_connect('localhost','root','');
   mysql_select_db('medicine',$con);
   $res=mysql_query("select * from user_tbl where email_id='$name' and  password='$passs' and status='true' ",$con);
   $count=mysql_num_rows($res);  
   return $count;  
   
   } 

   public function put_question($que,$eid)
   {
       $con=mysql_connect('localhost','root','');
       mysql_select_db('medicine',$con);
       $res=mysql_query("insert into question_tbl values(NULL,'$que','reject','not answer','$eid')",$con);
       return $res;
   }
   
   public function check_type($name,$passs)
   {
       $con=mysql_connect('localhost','root','');
       mysql_select_db('medicine',$con);
       $res=mysql_query("select type from user_tbl where email_id='$name' and password='$passs'",$con);
       return $res;
   }

   public function companybyid($id)
   {
	   
    $con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
	$res=mysql_query("select * from product_tbl where company_id='$id'");
	return $res;
   }

   public function product_display()
   {
        $con=mysql_connect('localhost','root','');
        mysql_select_db('medicine',$con);  
        $res1=mysql_query("select * from product_tbl",$con);
        $cnt=mysql_num_rows($res1);
        return $cnt;
   }
   public function question_display($eid)
   {

       $con=mysql_connect('localhost','root','');
       mysql_select_db('medicine',$con);
      $res=mysql_query("select q.*,u.* from question_tbl as q,user_tbl as u  where q.email_id=u.email_id and question_status='accept' order by question_id desc ",$con);
    //  $res=mysql_query("select q.* from question_tbl as q where  q.question_status='accept' order by question_id desc ",$con);
      return $res;
   }
   public function insert_user($id,$uname,$pass,$add,$city,$zip,$gen,$mob,$temp,$active,$code,$date)
   {
    $con=mysql_connect('localhost','root','');
   mysql_select_db('medicine',$con);
   $res=mysql_query("insert into user_tbl values('$id','$uname','$pass','$add','$city','$zip','$mob','$gen','$temp','user','$active','$code','$date')");
   
   }
   public function product_by_id($id)
   {
    $con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
	$cnt1=mysql_query("select * from product_tbl where product_id=$id",$con);
    return $cnt1;
   }
   
   public function getUserName($id)
   {
	   $con=mysql_connect("localhost","root","");
	mysql_select_db("medicine",$con);
	$res=mysql_query("select * from user_tbl where email_id='$id'",$con);
	return $res;
   }
   
   
   		public function getuserbycode($code)
	{
		
		$res=mysql_query("select * from user_tbl where link='$code'",$this->connection());

		$count=mysql_num_rows($res);
		
		return $count;
	
	}
	public function activateuser($code)
	{
	
		$res=mysql_query("update user_tbl set status='true' where link='$code'",$this->connection());
		return $res;
	
	}
	
   
   
   

}
   
 ?>

 
