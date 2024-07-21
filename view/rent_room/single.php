<!-- ============================ Page Title Start================================== -->
<div class="page-title" style="background:#f4f4f4 url(public/img/slider.jpg);" data-overlay="5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
			</div>
		</div>
	</div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- Gallery Part Start -->
<section class="gallery_parts pt-2 pb-2 d-none d-sm-none d-md-none d-lg-none d-xl-block">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-8 col-md-7 col-sm-12 pr-1">
				<div class="gg_single_part left" style="width: 100%; max-width: 100%; height: 0; padding-top: 75%; position: relative;">
					<?php if (isset($propertyImages) && is_array($propertyImages) && count($propertyImages) > 0) { ?>
						<a href="public/upload/properties/<?php echo $propertyImages[0]['image_url']; ?>" class="mfp-gallery">
							<img src="public/upload/properties/<?php echo $propertyImages[0]['image_url']; ?>" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center;" alt="" />
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-5 col-sm-12 pl-1">
				<?php if (isset($propertyImages) && is_array($propertyImages) && count($propertyImages) > 1) {
					for ($i = 1; $i < count($propertyImages); $i++) { ?>
						<div class="gg_single_part-right min" style="position: relative; width: 100%; height: 0; padding-top: 50%; margin: 6px 0;">
							<a href="public/upload/properties/<?php echo $propertyImages[$i]['image_url']; ?>" class="mfp-gallery">
								<img src="public/upload/properties/<?php echo $propertyImages[$i]['image_url']; ?>" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center;" alt="" />
							</a>
							<?php if ($i === 3 && count($propertyImages) > 4) { ?>
								<div class="overlay"></div>
								<div class="image-count">
									<?php echo count($propertyImages) - 3; ?>+ <!-- Hiển thị số ảnh phía sau -->
								</div>
							<?php } ?>
						</div>
				<?php }
				} ?>
			</div>


		</div>
	</div>
</section>

<!-- Đây là phần hiển thị trên di động hoặc màn hình kích thước hẹp -->
<div class="featured_slick_gallery gray d-block d-md-block d-lg-block d-xl-none">
	<div class="featured_slick_gallery-slide">
		<?php if (isset($propertyImages) && is_array($propertyImages) && count($propertyImages) > 0) {
			for ($i = 0; $i < count($propertyImages); $i++) { ?>
				<div class="featured_slick_padd">
					<a href="public/upload/properties/<?php echo $propertyImages[$i]['image_url']; ?>" class="mfp-gallery">
						<img src="public/upload/properties/<?php echo $propertyImages[$i]['image_url']; ?>" class="img-fluid mx-auto" alt="" />
					</a>
				</div>
		<?php }
		} ?>
	</div>
</div>


<!-- ============================ Property Detail Start ================================== -->
<section class="pt-4">
	<div class="container" style="display: flex;     justify-content: space-around;">
		<div class="row">

			<!-- property main detail -->
			<div class="col-lg-12 col-md-12 col-sm-12">

				<div class="property_info_detail_wrap mb-4">

					<div class="property_info_detail_wrap_first">
						<div class="pr-price-into">
							<ul class="prs_lists">
								<li><span class="bath"><?php echo $property['district']; ?></span></li>
								<li><span class="gar"><?php echo $property['age']; ?></span></li>
								<li><span class="sqft"><?php echo $property['type_name']; ?></span></li>
							</ul>
							<h2><?php echo $property['property_name']; ?></h2>
							<span>
								<h3 class="price"><?php echo $property['formatted_price']; ?>/<?php echo $property['unit']; ?></h3>
							</span>
							<span><i class=" lni-map-marker"></i> <?php echo $property['address']; ?>
							</span>
							<br>
							<span>
								<i class="fas fa-eye"></i> <?php echo $property['view_count']; ?>
							</span>
						</div>
					</div>

					<div class="property_detail_section">
						<div class="prt-sect-pric">
							<ul class="_share_lists">
								<li><a href="#"><i class="fa fa-bookmark"></i></a></li>
								<li><a href="#"><i class="fa fa-share"></i></a></li>
							</ul>
						</div>
					</div>

				</div>

				<!-- Single Block Wrap -->
				<div class="property_block_wrap">

					<div class="property_block_wrap_header">
						<h4 class="property_block_title">Thông tin bất động sản</h4>
					</div>

					<div class="block-body">
						<p style="text-align: justify; text-justify: inter-word;"><?php echo $property['description']; ?></p>
					</div>

				</div>

				<!-- Single Block Wrap -->
				<div class="property_block_wrap">

					<div class="property_block_wrap_header">
						<h4 class="property_block_title">Đặc điểm</h4>
					</div>

					<div class="block-body">
						<ul class="row p-0 m-0">
							<li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-bed mr-1"></i><?php echo $property['bedroom_count']; ?> Phòng ngủ</li>
							<li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-bath mr-1"></i><?php echo $property['bathroom_count']; ?> Phòng tắm</li>
							<li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-expand-arrows-alt mr-1"></i><?php echo $property['real_area']; ?> m<sup>2</li>
							<!-- <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-house-damage mr-1"></i>1 Living Rooms</li> -->
							<li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-building mr-1"></i>Năm xây dựng: <?php echo $property['age']; ?></li>
							<!-- <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-utensils mr-1"></i>2 Kitchens </li> -->
						</ul>
					</div>

				</div>

				<!-- Single Block Wrap -->
				<div class="property_block_wrap">

					<div class="property_block_wrap_header">
						<h4 class="property_block_title">Tiện ích</h4>
					</div>

					<div class="block-body">
						<ul class="avl-features third">
							<?php
							$utilities = explode(", ", $property['utilities']);
							foreach ($utilities as $utility) {
								echo "<li class='active'>$utility</li>";
							}
							?>
						</ul>
					</div>


				</div>


				<!-- Single Block Wrap -->
				<div class="property_block_wrap">

					<div class="property_block_wrap_header">
						<h4 class="property_block_title">Google Maps</h4>
					</div>

					<div class="block-body">
						<div class="map-container">
							<!-- <?php
									$address;
									?> -->

							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12730.62177161898!2d108.20464098328773!3d16.047465492630653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0xfc14e3a044436487!2zxJDDoCBO4bq1bmcsIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1715178431515!5m2!1svi!2s" class="full-width" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- property Sidebar -->
		<div class="col-lg-4 col-md-12 col-sm-12">
			<!-- Agent Detail -->
			<div class="sider_blocks_wrap">
				<div class="side-booking-body">
					<div class="agent-_blocks_title">

						<div class="agent-_blocks_thumb"><img src="public/upload/users/<?php echo $property['avatar_url']; ?>" alt=""></div>
						<div class="agent-_blocks_caption">
							<h4><a href="#"><?php echo $property['username']; ?></a></h4>
							<?php
							if (isset($property['phone_number']) && !empty($property['phone_number'])) {
								// Nếu "phone_number" tồn tại và không rỗng
								echo '<i style="" class="ti-mobile"></i> ' . $property['phone_number'];
								$zalo_link = "https://zalo.me/" . $property['phone_number'];
							} else {
								// Nếu "phone_number" không tồn tại hoặc rỗng
								echo '<span class="approved-agent"><i style="background: #737373" class="ti-check"></i>Chưa xác minh</span>';
							}
							?>
						</div>
						<div class="clearfix"></div>
					</div>

					<a href="<?php echo $zalo_link ?>" class="agent-btn-contact"><i class="ti-comment-alt"></i>Nhắn Zalo</a>

				</div>
			</div>



			<!-- Similar Property -->
			<div class="sidebar-widgets">

				<h4>Gợi ý phòng trọ cho bạn</h4>

				<div class="sidebar_featured_property">

					<?php foreach ($similarProperties as $property) : ?>
						<!-- List Sibar Property -->
						<div class="sides_list_property">
							<div class="sides_list_property_thumb">
								<img src="public/upload/properties/<?php echo $property['image_url']; ?>" class="img-fluid" alt="" />
							</div>
							<div class="sides_list_property_detail">
								<h4><a href="?controller=RentRoom&action=single&property_id=<?php echo $property['property_id']; ?>">
										<?php
										$property_name = $property['property_name'];

										if (strlen($property_name) > 113) {
											$property_name = substr($property_name, 0, 110) . '...';
										}

										echo htmlentities($property_name);

										?>
									</a></h4>
								<span><i class="ti-location-pin"></i><?php echo $property['district']; ?></span>
							</div>
						</div>
					<?php endforeach; ?>


				</div>

			</div>

		</div>
	</div>

	</div>
	</div>
</section>
<!-- ============================ Property Detail End ================================== -->