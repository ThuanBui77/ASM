<?php

class users

  {
       public function __construct(){
        
    }
       public function getFullthanhtoan($email)
      {
          $db = new connect();
          $query = "SELECT ID, Ten, Diachi, Phone, Email from users where Email = '$email'"; 
          $result = $db->getCG($query);
          return $result;
      }
    
       public function getName($email)
      {
          $db = new connect();
          $query = "SELECT Ten from users where Email = '$email'"; 
          $result = $db->getCG($query);
          return $result;
      }
      
       public function getPassword($email)
      {
          $db = new connect();
          $query = "SELECT Password from users where Email = '$email'"; 
          $result = $db->getCG($query);
          return $result;
      }
      
        public function getRole($email)
      {
          $db = new connect();
          $query = "SELECT Role from users where Email = '$email'"; 
          $result = $db->getCG($query);
          return $result;
      }
      
       public function getEmail($Email)
      {
          $db = new connect();
          $select = "SELECT Email from users where Email='$Email'";
          $result = $db->getCG($select);
          return $result;
      }
      
       public function insertUser($Email,$Ten,$Password,$Diachi,$SDT)
      {
          $db = new connect();
          $query = "INSERT INTO users(Email,Ten,Password,Diachi,Phone) VALUES ('$Email','$Ten','$Password','$Diachi','$SDT')";
          $result = $db->exec($query);
          return $result;
      }
      
       public function insertUserforAdmin($email,$ten,$password,$date,$diachi,$sdt,$gt,$hinh)
      {
          $db = new connect();
          $query = "INSERT INTO users VALUES ('NULL','$email','$ten','$password','$date','$diachi','$sdt','$gt','0','$hinh')";
          $result = $db->exec($query);
          return $result;
      }
      
       public function showUser()
      {
          $db = new connect();
          $query = "SELECT * from users";
          $result = $db->getCGs($query);
          return $result;
      }
      
      public function showkvl()
      {
          $db = new connect();
          $query = "SELECT * from khachvanglai";
          $result = $db->getCGs($query);
          return $result;
      }
      
      
       public function showUserexceptPass()
      {
          $db = new connect();
          $query = "SELECT ID, Ten, Email, Ngaysinh, Diachi, Phone, Gioitinh, Avatar from users";
          $result = $db->getCGs($query);
          return $result;
      }
      
      function xoauser($id)
      {
        $db = new connect();
        $query = "DELETE FROM users where ID = '$id'";
        $result = $db->exec($query);
        return $result;
      }
      
      function xoakvl($id)
      {
        $db = new connect();
        $query = "DELETE FROM khachvanglai where kvlID = '$id'";
        $result = $db->exec($query);
        return $result;
      }
      
      function showAdmin()
      {
        $db = new connect();
        $query = "SELECT * FROM users where Role = 1";
        $result = $db->getCG($query);
        return $result;
      }
      
      function editUser($id,$email,$ten,$password,$date,$diachi,$sdt,$gt,$hinh)
      {
        $db = new connect();
        $query = "UPDATE users SET Email = '$email' ,Ten = '$ten',Password = '$password',Ngaysinh = '$date',Diachi = '$diachi',Phone = '$sdt',Gioitinh = '$gt',Avatar = '$hinh'  WHERE ID = '$id' ";
        $result = $db->exec($query);
        return $result;
      }
      
      function editUserforUser($id,$ten,$date,$diachi,$sdt,$gt,$hinh)
      {
        $db = new connect();
        $query = "UPDATE users SET Ten = '$ten',Ngaysinh = '$date',Diachi = '$diachi',Phone = '$sdt',Gioitinh = '$gt',Avatar = '$hinh'  WHERE ID = '$id' ";
        $result = $db->exec($query);
        return $result;
      }
      
       public function showAvatar($email)
      {
          $db = new connect();
          $query = "SELECT Avatar from users where Email = '$email'";
          $result = $db->getCG($query);
          return $result;
      }
      
       public function getID($email)
      {
          $db = new connect();
          $select = "SELECT ID from users where Email='$email'";
          $result = $db->getCG($select);
          return $result;
      }
      
       public function showUserbyID($id)
      {
          $db = new connect();
          $query = "SELECT * from users where ID ='$id'";
          $result = $db->getCG($query);
          return $result;
      }
      
      function editPass($passmoi,$email)
      {
        $db = new connect();
        $query = "UPDATE users SET Password = '$passmoi' WHERE Email = '$email' ";
        $result = $db->exec($query);
        return $result;
      }
      
  }



?>

