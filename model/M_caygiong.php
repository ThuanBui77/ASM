<?php

  class caygiong

  {
      
       public function __construct(){
        
        }
      public function showCGbyDate()
      {
          $db = new connect();
//          show cây giống mới nhất sắp xếp theo cột Ngaythem với giới hạn chỉ có 6 cây giống
          $query = "SELECT Tencg, Gia, Chuthich, URL, ID from caygiong ORDER by Ngaythem DESC LIMIT 6 "; 
          $result = $db->getCGs($query);
          return $result;
      }
//          show cây giống bán chạy nhất sắp xếp theo cột Rating với giới hạn chỉ có 3 cây giống
      public function showCGsbyRating()
      {
          $db = new connect();
          $query = "SELECT Tencg, Gia, Chuthich, URL, ID from caygiong ORDER by Rating DESC LIMIT 3 "; 
          $result = $db->getCGs($query);
          return $result;
      }
//          show các thông tin cây giống thuộc loại Hoa(có cột Loai = 1)
      public function showCGsbyHoa()
      {
          $db = new connect();
          $query = "SELECT Tencg, Gia, Chuthich, URL, Mausac, Khihau, Xuatxu, ID  from caygiong where Loai = '1' "; 
          $result = $db->getCGs($query);
          return $result;
      }
      
      public function showCGsbyAntrai()
      {
          $db = new connect();
          $query = "SELECT Tencg, Gia, Chuthich, URL, Mausac, Khihau, Xuatxu, ID  from caygiong where Loai = '2' "; 
          $result = $db->getCGs($query);
          return $result;
      }
      
      public function showCGsbyThango()
      {
          $db = new connect();
          $query = "SELECT Tencg, Gia, Chuthich, URL, Mausac, Khihau, Xuatxu, ID  from caygiong where Loai = '3' "; 
          $result = $db->getCGs($query);
          return $result;
      }
      
      public function showCGsbyTraikieng()
      {
          $db = new connect();
          $query = "SELECT Tencg, Gia, Chuthich, URL, Mausac, Khihau, Xuatxu, ID  from caygiong where Loai = '4' "; 
          $result = $db->getCGs($query);
          return $result;
      }
      
      public function showCGsbyDau()
      {
          $db = new connect();
          $query = "SELECT Tencg, Gia, Chuthich, URL, Mausac, Khihau, Xuatxu, ID  from caygiong where Loai = '5' "; 
          $result = $db->getCGs($query);
          return $result;
      }
      
      public function showCGsbyKiengla()
      {
          $db = new connect();
          $query = "SELECT Tencg, Gia, Chuthich, URL, Mausac, Khihau, Xuatxu, ID  from caygiong where Loai = '6' "; 
          $result = $db->getCGs($query);
          return $result;
      }
      
      public function showCGsbyRaucai()
      {
          $db = new connect();
          $query = "SELECT Tencg, Gia, Chuthich, URL, Mausac, Khihau, Xuatxu, ID  from caygiong where Loai = '7' "; 
          $result = $db->getCGs($query);
          return $result;
      }
      
      public function showCGsbyGiavi()
      {
          $db = new connect();
          $query = "SELECT Tencg, Gia, Chuthich, URL, Mausac, Khihau, Xuatxu, ID  from caygiong where Loai = '8' "; 
          $result = $db->getCGs($query);
          return $result;
      }
      
      public function showCGsbyCu()
      {
          $db = new connect();
          $query = "SELECT Tencg, Gia, Chuthich, URL, Mausac, Khihau, Xuatxu, ID  from caygiong where Loai = '9' "; 
          $result = $db->getCGs($query);
          return $result;
      }
      
      public function showCGsbyVattu()
      {
          $db = new connect();
          $query = "SELECT Tencg, Gia, Chuthich, URL, Mausac, Khihau, Xuatxu, ID  from caygiong where Loai = '10' "; 
          $result = $db->getCGs($query);
          return $result;
      }
      
       public function countLoai()
      {
          $db = new connect();
          // Chọn ra cột Loai dùng cho việc đếm số lượng Loại cây giống
          $query = "SELECT Loai from caygiong"; 
          $result = $db->getCGs($query);
          return $result;
      }
      
       public function giohang($Macg)
      {
          $db = new connect();
          $query = "SELECT ID, Tencg, Gia, URL from caygiong where ID = '$Macg'"; 
          $result = $db->getCG($query);
          return $result;
      }
      
        public function getChitietcg($ID)
      {
          $db = new connect();
          $query = "SELECT URL, Tencg, Khihau, Xuatxu, Gia, Chuthich, Noidung, ID from caygiong where ID = '$ID'";
          $result = $db->getCG($query);
          return $result;
      }
      
        public function getallcaygiongs ()
      {
        $db = new connect();
        $query = "SELECT ID, Tencg, Ngaythem, Gia, Mausac, Khihau, Khihau, Loai, URL, Rating from caygiong";
        $result = $db->getCGs($query);
        return $result;
      }
      
      function xoacg($id)
      {
        $db = new connect();
        $query = "DELETE FROM caygiong where ID = '$id'";
        $result = $db->exec($query);
        return $result;
      }
         
        public function getallcaygiongsbyID ($id)
      {
        $db = new connect();
        $query = "SELECT * from caygiong where ID = '$id'";
        $result = $db->getCG($query);
        return $result;
      }
      
        public function getMausac()
      {
        $db = new connect();
        $query = "SELECT Mausac from mausac";
        $result = $db->getCGs($query);
        return $result;
      }
      
         public function getKhihau()
      {
        $db = new connect();
        $query = "SELECT Khihau from khihau";
        $result = $db->getCGs($query);
        return $result;
      }
      
       public function getXuatxu()
      {
        $db = new connect();
        $query = "SELECT Xuatxu from xuatxu";
        $result = $db->getCGs($query);
        return $result;
      }
      
       public function getLoai()
      {
        $db = new connect();
        $query = "SELECT Loai from loai";
        $result = $db->getCGs($query);
        return $result;
      }
      
     function editCg($id,$tencg,$date,$gia,$mausac,$khihau,$xuatxu,$loai,$ct,$nd,$hinh,$rating)
      {
        $db = new connect();
        $query = "UPDATE caygiong SET Tencg = '$tencg' ,Ngaythem = '$date',Gia = '$gia',Mausac = '$mausac',Khihau = '$khihau',Xuatxu = '$xuatxu',Loai = '$loai',Chuthich = '$ct',Noidung = '$nd',URL = '$hinh',Rating = '$rating' WHERE ID = '$id' ";
        $result = $db->exec($query);
        return $result;
      }
      
      
      function insertCg($tencg,$date,$gia,$mausac,$khihau,$xuatxu,$loai,$ct,$nd,$hinh,$rating)
    { 
        $db = new connect();
        $query = "INSERT INTO caygiong (ID,Tencg,Ngaythem,Gia,Mausac,Khihau,Xuatxu,Loai,Chuthich,Noidung,URL,Rating) VALUES ('NULL','$tencg','$date','$gia','$mausac','$khihau','$xuatxu','$loai','$ct','$nd','$hinh','$rating')";
        $result = $db->exec($query);
        return $result;
    } 
    
      function insertCgs($tencg,$date,$gia,$mausac,$khihau,$xuatxu,$loai,$ct,$nd,$hinh,$rating)
    { 
        $db = new connect();
        $query = "INSERT INTO caygiong VALUES ('NULL','$tencg','$date','$gia','$mausac','$khihau','$xuatxu','$loai','$ct','$nd','$hinh','$rating')";
        $result = $db->exec($query);
        return $result;
    }  
      
  }

?>
