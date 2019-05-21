<div id="address_product" class="col-md-10">
	<p id="border">DANH SÁCH ĐỊA ĐIỂM</p>
	<?php if ( $data!= 0 ): ?>
		<?php foreach ($data as $row){ ?>
			<a href='../cotroller/c_detail.php?id=<?=$row['id']?>'>
				<div id="address_1" class="col-md-4 khung">
					<div class="address_1_1">
						<div id="hinh_anh">
							<img src="../images/<?=$row['img']?>" alt="hình ảnh">
						</div>
						<div class="noi_dung">
							<div class="noi_dung_1">
								<div class="mo_ta">
									<div class="title">
										<p><?=$row['name']?></p>
									</div>
									<p class="title_1"><?=$row['address']?></p>
									<!-- <p class="title_2"></p> -->
								</div>
								<div class="chu_de">
									<p><?=$row['shop_types']?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</a>
		<?php } ?>
	<?php endif ?>
	<div id="page" class="col-md-4 col-md-offset-4" style="clear: both;">
		<ul class="pagination">
			<?php if(isset($total_page) && isset($current_page) && $current_page > 1 ): ?>
			<li><a href="?page=<?=$current_page-1?>"> < </a></li>
		<?php endif ?>
		<?php for( $i=1 ; $i <= $total_page; $i++ ){ ?>

			<?php if($current_page == $i){ ?>
				<li class="active">
					<a href=""><?=$i?></a>
				</li>
			<?php }else{ ?>
				<li class="">
					<a href="?page=<?=$i?>"><?=$i?></a>
				</li>
			<?php } ?>
		<?php } ?>
		<?php if(isset($total_page) && isset($current_page) && $current_page < $total_page ): ?>
		<li><a href="?page=<?=$current_page+1?>"> > </a></li>
	<?php endif ?>

</ul>
</div>
</div>
</div>
</div>

