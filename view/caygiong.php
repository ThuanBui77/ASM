
<?php 
    include '../view/header.php';
?>

<section>
    
    
        <div class="container-fluid">
        <div class="row section1cg">
            <div class="col-lg-1 sec1cg">
                
            </div>
            
            <?php
                         // Sau khi dùng phương thức countLoai, phương thức này sẽ trả về mảng
                         // chứa một dãy các số Loại cây giống
                         // sử dụng foreach để lấy ra các số này từ mảng
                         foreach ($count as $rows)
                         {
                         // sử biến toàn cục $stringrow để chứa các số Loại được lấy ra
                         // bằng vòng lặp foreach
                         global $stringrow;
                         // ghép dồn các giá trị vào biến $stringrow
                         $stringrow .= $rows[0] . " ";
                                              
                         }
                         
                         // mảng $toarray chứa mảng tổng hợp các số Loại
                         // thông qua hàm explode
                         
                         $toarray = (explode(" ",$stringrow));
                         // mảng $sll lấy kết quả từ việc đếm số lần xuất hiện của các giá trị
                         // trong mảng $toarray thông qua hàm array_count_values
                         $sll = array_count_values($toarray);
                         
                         for ($i = 1; $i <= count($toarray); $i++)
                         {
                             // xét điều kiện nếu như phần tử nào trong mảng $toarray nào chưa được set
                             // thi tự động được gán số lần xuất hiện bằng 0
                             if(!isset($sll[$i]))
                             {
                                 $sll[$i] = 0;
                             }
                         }
                                                    
          ?>
             
            <div class="col-lg-3 sec2cg">
                <div class="list-group">
                  <a href="#" class="list-group-item active"> DANH MỤC CÂY GIỐNG</a>
                  <a href="?action=caygiong" class="list-group-item">CÂY GIỐNG HOA (<?php echo $sll[1] ?>)</a>
                  <a href="?action=antrai" class="list-group-item">CÂY GIỐNG ĂN TRÁI (<?php echo $sll[2] ?>)</a>
                  <a href="?action=thango" class="list-group-item">CÂY GIỐNG THÂN GỖ (<?php echo $sll[3] ?>)</a>
                  <a href="?action=traikieng" class="list-group-item">CÂY GIỐNG TRÁI KIỂNG (<?php echo $sll[4] ?>)</a>
                  <a href="?action=dau" class="list-group-item">CÂY GIỐNG ĐẬU (<?php echo $sll[5] ?>)</a>
                  <a href="?action=kiengla" class="list-group-item">CÂY GIỐNG KIỂNG LÁ (<?php echo $sll[6] ?>)</a>
                  <a href="?action=raucai" class="list-group-item">CÂY GIỐNG RAU CẢI (<?php echo $sll[7] ?>)</a>
                  <a href="?action=giavi" class="list-group-item">CÂY GIỐNG GIA VỊ (<?php echo $sll[8] ?>)</a>
                  <a href="?action=cu" class="list-group-item">CÂY GIỐNG CỦ (<?php echo $sll[9] ?>) </a>
                  <a href="?action=vattu" class="list-group-item">VẬT TƯ - PHÂN THUỐC (<?php echo $sll[10] ?>)</a>
                </div>
            </div>
                     
            <div class="col-lg-7 sec3cg">
 
                <div class="row">
                 <!-- Sử dụng jquery A Pen by Captain Anonymous để lọc cây giống theo Màu sắc, xuất xứ, khí hậu  -->
                  <p> Phân loại theo : </p>
                    
                 <!-- Dropdown dùng để đưa ra các điều kiện cho người dùng chọn để lọc các kết quả, trong mỗi các dropdown
                      ở phần value chứa điều kiện. Còn trong mỗi li có class có chứa các kết quả tương ứng với các điều
                      kiện được người dùng chọn
                 -->  
                 <div class="dropdown phanloai">
                 <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                   Màu sắc <span class="caret"></span>
                 </a>

                 
                 <ul class="dropdown-menu phanloaimenu" role="menu" aria-labelledby="dLabel">
                     <li><input type="checkbox" value="filter_vang" data-filter_id="pc"> Vàng</li>
                     <li><input type="checkbox" value="filter_xanhla" data-filter_id="pc"> Xanh lá</li>
                     <li><input type="checkbox" value="filter_do" data-filter_id="pc"> Đỏ</li>
                     <li><input type="checkbox" value="filter_trang" data-filter_id="pc"> Trắng</li>
                     <li><input type="checkbox" value="filter_xanhlam" data-filter_id="pc"> Xanh lam</li>
                     <li><input type="checkbox" value="filter_tim" data-filter_id="pc"> Tím</li>
                 </ul>
                
                
                </div>
                
                
                    
                <div class="dropdown phanloai">
                 <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                   Xuất xứ  <span class="caret"></span>
                 </a>

               
                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                     <li><input type="checkbox" value="filter_vn" data-filter_id="pc"> Việt Nam</li>
                     <li><input type="checkbox" value="filter_my" data-filter_id="pc"> Mỹ</li>
                     <li><input type="checkbox" value="filter_nb" data-filter_id="pc"> Nhật Bản</li>
                     <li><input type="checkbox" value="filter_nga" data-filter_id="pc"> Nga</li>
                     <li><input type="checkbox" value="filter_tl" data-filter_id="pc"> Thái Lan</li>
                     
                 </ul>
                
                
                </div> 
                    
                    
                <div class="dropdown phanloai">
                 <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
                   Khí hậu  <span class="caret"></span>
                 </a>

               
                 <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                     <li><input type="checkbox" value="filter_xn" data-filter_id="pc"> Xứ nóng</li>
                     <li><input type="checkbox" value="filter_xl" data-filter_id="pc"> Xứ lạnh</li>
                     
                 </ul>
                
                
                </div>
                    
                </div>    
                    
            
                
                
                
                
                
                
                
                
                <div class="row">
                <!-- sử dụng Switch View Mode để hiển thị kết quả theo dạng lưới hoặc dạng danh sách -->
                <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                    <div class="cbp-vm-options">
                            <a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid">Grid View</a>
                            <a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list">List View</a>
                    </div>
                    <?php
                      // Sử dụng foreach để lấy các giá trị trong mảng result
                      foreach ($result as $row)
                      {
                       // Dùng switch để chuyển đổi các $row 4,5,6 tức các cột
                       // Màu sắc , khí hậu, xuất xứ sang dạng text vì mặc định
                       // các cột đó trong csdl chỉ các ID từng loại
                        switch ($row[4])
                        {
                            
                         case "1" :
                             $result_color = "filter_vang";
                             break;
                         case "2" :
                             $result_color = "filter_xanhla";
                             break;
                         case "3" :
                             $result_color = "filter_do";
                             break;
                         case "4" :
                             $result_color = "filter_trang";
                             break;
                         case "5" :
                             $result_color = "filter_xanhlam";
                             break;
                         case "6" :
                             $result_color = "filter_tim";
                             break;
                         default :
                             $result_color = null;
                             break;
                        }
                        
                        switch ($row[5])
                        {
                            
                         case "1" :
                             $result_kh = "filter_xn";
                             break;
                         case "2" :
                             $result_kh = "filter_xl";
                             break; 
                         default :
                             $result_kh = null;
                             break;
                        }
                        
                        switch ($row[6])
                        {
                            
                         case "1" :
                             $result_xx = "filter_vn";
                             break;
                         case "2" :
                             $result_xx = "filter_my";
                             break;
                         case "3" :
                             $result_xx = "filter_nb";
                             break;
                         case "4" :
                             $result_xx = "filter_nga";
                             break;
                         case "5" :
                             $result_xx = "filter_tl";
                             break;         
                         default :
                             $result_xx = null;
                             break;
                        }
                        
                         
                    ?> 
                    
                            <div class="list">
                                <ul id="product-list">
                                    <li class = "<?php echo $result_color ?> <?php echo $result_kh ?> <?php echo $result_xx ?>">
                                        <a class="cbp-vm-image" href="?action=chitiet&Macg=<?php echo $row[7] ?>"><img src="<?php  echo "../view/images/" . $row[3] ?>"></a>
                                        <a style="text-decoration: none" href="?action=chitiet&Macg=<?php echo $row[7] ?>"><h3 class="cbp-vm-title"> <?php  echo $row[0]; ?> </h3></a>
                                        <div class="cbp-vm-price"><?php  echo number_format($row[1]) . " ". "VNĐ"; ?></div>
                                        <div class="cbp-vm-details">
                                                <?php echo $row[2]; ?>
                                        </div>
                                        <a class="cbp-vm-icon cbp-vm-add" href="?action=datmua&Macg=<?php echo $row[7] ?>"> ĐẶT MUA</a>
                                    </li>
                               </ul>
                            </div>
                <?php } ?>
                </div>
                    
            </div>
                
            
                
            </div>    
                
            <div class="col-lg-1 sec4cg">
                
            </div>    
    
    </div>
    </div>
</section>
        
<?php include '../view/footer.php'; ?>
