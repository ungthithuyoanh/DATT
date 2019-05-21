<div id="banner" class="widget-section">
	<div class="container">
		<h2>Carousel Example</h2>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">

				<div class="item active">
					<img src="../images/banner-2.png" alt="Los Angeles" style="width:100%;">
					<div class="carousel-caption">
						<h3>Los Angeles</h3>
						<p>LA is always so much fun!</p>
					</div>
				</div>

				<div class="item">
					<img src="../images/banner-2.png" alt="Chicago" style="width:100%;">
					<div class="carousel-caption">
						<h3>Chicago</h3>
						<p>Thank you, Chicago!</p>
					</div>
				</div>

				<div class="item">
					<img src="../images/banner-2.png" alt="New York" style="width:100%;">
					<div class="carousel-caption">
						<h3>New York</h3>
						<p>We love the Big Apple!</p>
					</div>
				</div>

			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>
<div class="card-body">
	
</div>
<div id="body" class="widget-section">
	<div class="container">
		<div id="search_product" class="col-md-2">
			<p id="border">LỌC KẾT QUẢ</p>
			<div class="search_1">
				<p>Quận/Đà Nẵng</p>
				<div class="search_1_1">
					<form  method="POST">
						<label>
							<!-- <a href="../controller/c_index.php?diachi=null"> -->
								<input id="diachi" type="radio" name="diachi" checked>
								<span>Tất cả</span>
							<!-- </a> -->
						</label>
						<br>
						<label>
							<!-- <a href="../controller/c_index.php?diachi=hải châu"> -->
								<input type="radio" id="diachi" name="diachi" value="hai chau">
								<span>Hải Châu</span>
							<!-- </a> -->
						</label>
						<br>
						<label>
							<input type="radio" id="diachi" name="diachi" value="lien chieu">
							<span>Liên Chiểu</span>
						</label>
						<br>
						<label>
							<input type="radio" id="diachi"  name="diachi" value="cam le">		
							<span>Cẩm Lệ</span>
						</label>
						<br>
						<label>
							<input type="radio" id="diachi"  name="diachi" value="thanh khe">
							<span>Thanh Khê</span>
						</label>
					</form>
				</div>
			</div>
			<div class="search_2">
				<p>Danh Mục</p>
				<div class="search_2_1">
					<form>
						<label>
							<input type="radio" name="danhmuc" checked>
							<span>Tất cả</span>
						</label>
						<br>
						<label>
							<input type="radio" name="danhmuc">
							<span>Quán Ăn</span>
						</label>
						<br>
						<label>
							<input type="radio" name="danhmuc">
							<span>Nhà Hàng</span>
						</label>
						<br>
						<label>
							<input type="radio" name="danhmuc">		
							<span>Cafe/kem</span>
						</label>
					</form>
				</div>
			</div>
		</div>
		
<!-- <script type="text/javascript" charset="utf-8" async defer>
	$('#diachi').click(function(){
		$.ajax({
			method: "post",
			url : "../controller/c_foodshop.php",
			data: $('#diachi:checked').var,
		});
	});
</script> -->
