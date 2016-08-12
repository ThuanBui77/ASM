<?php 
    include '../view/header.php';
?>


<div class="container-fluid">
        <div class="row ct1">
            
            <div class="col-lg-1">
                
            </div>
            
            <div class="col-lg-10">
                <div class="picct">
                    <img src="../view/images/<?php echo $result[0]?>">
                </div>
                <div class="titlect">
                    <h1> <?php echo $result[1]?> </h1>
                    <p> <?php echo $khihau ?> | <?php echo $xuatxu  ?> </p>
                    <p style="color: #C00; font-size: 25px; font-weight: bold"> <?php echo number_format($result[4]) . " " . "VNĐ" ?> </p>
                    <p style="text-align: justify"> <?php echo $result[5]?>
                    </p>
                    <a class="cbp-vm-icon cbp-vm-add" href="?action=datmua&Macg=<?php echo $result[7] ?>">ĐẶT MUA</a>
                    <p> </p>
                    <p style="font-weight: bold"> Thời gian làm việc: 8h00 - 19h30 / (Thứ 2 - Chủ Nhật)  </p>
                </div>
            </div>
            
            <div class="col-lg-1">
                
            </div>
        </div>
        
       <div class="row ct2">
            <div class="col-lg-1">
                
            </div>
            <div class="col-lg-10">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title">Chi tiết sản phẩm</h3>
                  </div>
                  <div class="panel-body">
                    <?php echo $result[6]?>
                  </div>
                </div>
            </div>
           
            <div class="col-lg-1">
                
            </div>
       </div>
</div>

<?php include '../view/footer.php'; ?>
