<?php
	include 'top.php';
	$sql = "SELECT * FROM phim WHERE MaPhim = '".$_GET['id']."'";
                //run câu truy vấn
    $result = $conn->query($sql);
    $sql1= "SELECT theloaiphim.MaTL,theloai.TenTL 
    		FROM theloai,theloaiphim 
    		WHERE theloai.MaTL = theloaiphim.MaTL AND theloaiphim.MaPhim='".$_GET['id']."'";
    $result1 = $conn->query($sql1);
    if ($result && $result->num_rows > 0) {
        // nếu có thì tiến hành lặp để in ra dữ liệu           
        while ($row = $result->fetch_assoc()) {
?>
	<div class="container">
		<div class="item1">
			<div class="back-img">
				<?php
					echo "<img src=".$row['back_image']." alt=img>";
				?>
			</div>
			<div class="img">
				<?php
					echo "<img src=".$row['Image']." alt=img>";
				?>
			</div>
			<div class="info1">
				<div class="name">
					<?php
						echo "<h1>".$row['TenPhim']."</h1>";
					?>
				</div>
				<div class="info">
					<div class="row" style="padding: 5px 15px;">
						<h5>Thể Loại : </h5>
						<?php
							if ($result1 && $result1->num_rows > 0) {
						        // nếu có thì tiến hành lặp để in ra dữ liệu           
						        while ($row1 = $result1->fetch_assoc()) {
						        	echo "<h5><a href=theloai.php?id=".$row1['MaTL'].">".$row1['TenTL'].",</a></h5>";
						        }
						    }
						?>
					</div>
					<div class="row" style="padding: 5px 15px;">
						<h5>Hãng SX : </h5>
						<?php
						echo "<h5><a href=#>".$row['HangSX']."</a></h5>";
						?>
					</div>
					<div class="row" style="padding: 5px 15px;">
						<h5>Năm SX : </h5>
						<?php
						echo "<h5><a href=nam.php?nam=".$row['Nam'].">".$row['Nam']."</a></h5>";
						?>
					</div>
					<div class="row" style="padding: 5px 15px;">
						<h5>Tình Trạng : </h5>
						<h5><a href="#"><?php echo $row['TinhTrang']; ?></a></h5>
					</div>
					<div class="row" style="padding: 5px 15px;">
						<?php
							echo "<a href=view.php?id=".$_GET['id']."&ep=01 class='btn play-now'>Xem Phim</a>";	
						?>
						<a href="#" class="btn play-now">Thêm Vào DS Yêu Thích</a>
					</div>
					<div class="review">
						<h5 style="font-weight: bold;">Nội Dung:</h5>
						<?php
						echo "<p>".$row['NoiDung']."<p>";
					}
				}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

