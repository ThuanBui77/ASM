<?php 
    include '../view/header.php';
?>


<div class="row header3">
        	<div class="col-lg-12 hd3c1 ">
            
                <h1 style="color:#FFF"> SỰ LỰA CHỌN </h1>			
                <h1 style="color:#FFF"> TỐT NHẤT </h1>
                <a href="footer.php"></a>
                <h1 style="color:#FFF"> CHO MỌI KHU VƯỜN </h1>
                <p> Chúng tôi luôn nỗ lực 
                
                vì muốn <br>mang đến bạn sản phẩm tốt nhất </p>			 				
                <a href="?action=caygiong"><button class="button button--aylen button--round-l button--text-thick">Cây giống</button></a>
                <img style="margin-top:-275px;" src="../view/images/tree on banner.png"/>
            </div>
        </div>
    </div>
 </header>
 <section>
 	<div class="container-fluid" >
    
    	<div class="row section1">
        <!--   show cây giống mới nhất-->
        	<div class="col-lg-12 sec1">
            	<h3 class="title"> - CÂY GIỐNG MỚI NHẤT - </h3>
                <div class="main">
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list">List View</a>
					</div>
                                    
                                    
					<ul>
                                            
                                             <?php 
                
                                              foreach ($result as $row)
                                              {
                                                  
                                                  
                                                  
                                              
                                            ?>
                                            
						<li>
							<a class="cbp-vm-image" href="?action=chitiet&Macg=<?php echo $row[4] ?>"><img src="<?php  echo "../view/images/" . $row[3] ?>"></a>
                                                        <a style="text-decoration: none" href="?action=chitiet&Macg=<?php echo $row[4] ?>"><h3 class="cbp-vm-title"> <?php  echo $row[0]; ?> </h3></a>
							<div class="cbp-vm-price"><?php  echo number_format($row[1]) . " ". "VNĐ"; ?></div>
							<div class="cbp-vm-details">
								<?php echo substr($row[2], 0,150). "..."; ?>
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="?action=datmua&Macg=<?php echo $row[4] ?>">ĐẶT MUA</a>
						</li>
						
                                     
						<?php } ?>
						
					
					</ul>
				</div>
			</div> 
                
                
            </div>
            
            
            
            
        </div>
        
       
            
            
            
        </div>
        
        
       
        <div class="container-fluid">
        <div class="row section2">
             <div class="col-lg-12 sec2">
                 <!-- show cây giống bán chạy nhất-->
            	<h3 class="title"> - CÂY GIỐNG BÁN CHẠY NHẤT - </h3>
               <div class="main">
				<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					

					<ul>
                                            
                                             <?php 
                
                                              foreach ($results as $row)
                                              {
                                            
                                             ?>
                                            
						<li>
							<a class="cbp-vm-image" href="?action=chitiet&Macg=<?php echo $row[4] ?>"><img src="<?php  echo "../view/images/" . $row[3] ?>"></a>
                                                        <a style="text-decoration: none" href="?action=chitiet&Macg=<?php echo $row[4] ?>"><h3 class="cbp-vm-title"> <?php  echo $row[0]; ?> </h3></a>
							<div class="cbp-vm-price"><?php  echo number_format($row[1]) . " ". "VNĐ"; ?></div>
							<div class="cbp-vm-details">
								<?php echo $row[2]; ?>
							</div>
							<a class="cbp-vm-icon cbp-vm-add" href="?action=datmua&Macg=<?php echo $row[4] ?>">ĐẶT MUA</a>
						</li>
						
                                     
						<?php } ?>
						
					
					</ul>
				</div>
			</div> 
                
                
            </div>
            
        	
        </div>
        </div>
        
                
        	<div class="col-lg-12 lastsection">
            	<h1> VÌ SAO NÊN CHỌN GREEN PLANET </h1>
                <p class="p1ls" style="color:#FFF; font-weight:bold; "> <strong>Với hơn 50 chi nhánh khắp đất nước. GREEN PLANET luôn sẵn sàng đáp ứng nhu cầu của khách hàng </strong></p>
                <p class="p2ls" style="color:#FFF; font-weight:bold; "> <strong>Đội ngũ tư vấn chuyên nghiệp tận tâm luôn sẵn sàng giải đáp các thắc mắc từ khách hàng </strong></p>
                <p class="p3ls" style="color:#FFF; font-weight:bold; "> <strong> Cung cấp mọi loại giao dịch hiện đại nhất hiện nay, đem lại sự tiện lợi và nhanh chóng cho khách hàng   </strong></p>
                </div>
        
        
 
 </section>
<?php include '../view/footer.php'; ?>