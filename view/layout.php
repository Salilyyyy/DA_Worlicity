<!-- bat dau session -->
<?php
session_start();
require_once "model/Property.php";
?>
<!-- ... -->
<!-- Đoạn code layout của trang layout.php -->
<!-- ... -->


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- icon tag -->
	<link rel="icon" href="public/img/logo-icon.png" type="image/x-icon">
	<link rel="shortcut icon" href="public/img/logo-icon.png" type="image/x-icon">

	<!-- Custom CSS -->
	<link href="public/css/styles.css" rel="stylesheet">
	<script src="public/js/tinymce.min.js" referrerpolicy="origin"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
	<!-- Custom JS -->
	<!-- Title -->
	<title>WORLICITY</title>
	<style>
		.custom-datepicker {
			background-color: black;
			color: white;
			font-family: Arial, sans-serif;
		}

		.custom-datepicker .datepicker-days tr th,
		.custom-datepicker .datepicker-months tr th,
		.custom-datepicker .datepicker-years tr th {
			color: white;
		}

		.custom-datepicker .datepicker-switch:hover {
			background-color: #333;
		}

		.custom-datepicker .datepicker-days .disabled,
		.custom-datepicker .datepicker-months .disabled,
		.custom-datepicker .datepicker-years .disabled {
			color: rgba(255, 255, 255, 0.5);
		}

		.custom-datepicker .datepicker-days .active,
		.custom-datepicker .datepicker-months .active,
		.custom-datepicker .datepicker-years .active {
			background-color: #333;
		}

		.custom-datepicker .datepicker-days table tr td,
		.custom-datepicker .datepicker-months table tr td,
		.custom-datepicker .datepicker-years table tr td {
			border: 1px solid #333;
		}

		.custom-datepicker .datepicker-days table tr td:hover,
		.custom-datepicker .datepicker-months table tr td:hover,
		.custom-datepicker .datepicker-years table tr td:hover {
			background-color: #666;
		}

		.image-wrapper {
			position: relative;
			width: 100%;
			padding-top: 75%;
			/* Tỷ lệ 3:4 */
		}

		.image-wrapper img {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
	</style>
</head>



<body class="yellow-skin">

	<!-- menu & slide -->


	<!-- ============================================================== -->
	<!-- Start Navigation -->
	<div class="header header-transparent change-logo">
		<div class="container">
			<nav id="navigation" class="navigation navigation-landscape">
				<div class="nav-header">
					<a class="nav-brand static-logo" href="index.php"><img src="public/img/logo-light.png" class="logo" alt="" /></a>
					<a class="nav-brand fixed-logo" href="index.php"><img src="public/img/logo.png" class="logo" alt="" /></a>
					<div class="nav-toggle"></div>
				</div>
				<div class="nav-menus-wrapper" style="transition-property: none;">
					<ul class="nav-menu">

						<li><a href="index.php?controller=RentRoom&action=index">Phòng trọ, nhà trọ<span class="submenu-indicator"></span></a>
							<ul class="nav-dropdown nav-submenu">
								<li><a href="index.php?controller=RentRoom&action=thanhkhe">Thanh Khê<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentRoom&action=haichau">Hải Châu<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentRoom&action=lienchieu">Liên Chiểu<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentRoom&action=camle">Cẩm Lệ<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentRoom&action=sontra">Sơn Trà<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentRoom&action=nguhanhson">Ngũ Hành Sơn<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentRoom&action=hoavang">Hoà Vang<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentRoom&action=hoangsa">Hoàng Sa<span class="submenu-indicator"></span></a></li>
							</ul>
						</li>

						<li><a href="index.php?controller=RentHouse&action=index">Nhà nguyên căn<span class="submenu-indicator"></span></a>
							<ul class="nav-dropdown nav-submenu">
								<li><a href="index.php?controller=RentHouse&action=thanhkhe">Thanh Khê<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentHouse&action=haichau">Hải Châu<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentHouse&action=lienchieu">Liên Chiểu<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentHouse&action=camle">Cẩm Lệ<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentHouse&action=sontra">Sơn Trà<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentHouse&action=nguhanhson">Ngũ Hành Sơn<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentHouse&action=hoavang">Hoà Vang<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentHouse&action=hoangsa">Hoàng Sa<span class="submenu-indicator"></span></a></li>
							</ul>
						</li>

						<li><a href="index.php?controller=RentApartment&action=index">Căn hộ cho thuê<span class="submenu-indicator"></span></a>
							<ul class="nav-dropdown nav-submenu">
								<li><a href="index.php?controller=RentApartment&action=thanhkhe">Thanh Khê<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentApartment&action=haichau">Hải Châu<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentApartment&action=lienchieu">Liên Chiểu<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentApartment&action=camle">Cẩm Lệ<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentApartment&action=sontra">Sơn Trà<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentApartment&action=nguhanhson">Ngũ Hành Sơn<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentApartment&action=hoavang">Hoà Vang<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentApartment&action=hoangsa">Hoàng Sa<span class="submenu-indicator"></span></a></li>
							</ul>
						</li>

						<li><a href="index.php?controller=RentShare&action=index">Tìm người ở ghép<span class="submenu-indicator"></span></a>
							<ul class="nav-dropdown nav-submenu">
								<li><a href="index.php?controller=RentShare&action=thanhkhe">Thanh Khê<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentShare&action=haichau">Hải Châu<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentShare&action=lienchieu">Liên Chiểu<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentShare&action=camle">Cẩm Lệ<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentShare&action=sontra">Sơn Trà<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentShare&action=nguhanhson">Ngũ Hành Sơn<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentShare&action=hoavang">Hoà Vang<span class="submenu-indicator"></span></a></li>
								<li><a href="index.php?controller=RentShare&action=hoangsa">Hoàng Sa<span class="submenu-indicator"></span></a></li>
							</ul>
						</li>

						<li>
							<a href="index.php?controller=Blog&action=index">Tin tức<span class="submenu-indicator"></span></a>
						</li>

					</ul>
					<!-- ==============================  View Signing  ================================ -->
					<?php
					require_once __DIR__ . '/../Controller/Login.php';
					$userController = new UserController();
					$loggedIn = $userController->checkLogin();
					?>
					<?php if ($loggedIn) : ?>
						<ul class="nav-menu nav-menu-social align-to-right dhsbrd">
							<li>
								<div class="btn-group account-drop">
									<!-- Nội dung cho menu đã đăng nhập -->
									<button type="button" class="btn btn-order-by-filt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<img src="public/upload/users/<?php echo isset($_SESSION["uauth"]["avatar_url"]) && !empty($_SESSION["uauth"]["avatar_url"]) ? $_SESSION["uauth"]["avatar_url"] : 'default.jpg'; ?>" class="avater-img" alt="">
									</button>
									<div class="dropdown-menu pull-right animated flipInX">
										<div class="drp_menu_headr">
											<h4>Hi, <?php echo $_SESSION["uauth"]["username"]; ?></h4>
										</div>
										<ul>
											<li><a href="index.php?controller=DashBoard&action=index"><i class="fa fa-tachometer-alt"></i>Trang quản trị</a></li>
											<li><a href="index.php?controller=DashBoard&action=profile"><i class="fa fa-user-tie"></i>Thông tin cá nhân</a></li>
											<li><a href="index.php?controller=DashBoard&action=myProperty"><i class="fa fa-tasks"></i>Nhà của bạn</a></li>
											<?php
											if (isset($_SESSION["uauth"]["account_type_id"]) && $_SESSION["uauth"]["account_type_id"] == 1 || $_SESSION["uauth"]["account_type_id"] == 1) {
												echo '<li><a href="index.php?controller=DashBoard&action=saveProperty"><i class="fa fa-bookmark"></i>Blogs cá nhân</a></li>';
												echo '<li><a href="index.php?controller=DashBoard&action=newProperty"><i class="fa fa-pen-nib"></i>Tạo Blogs</a></li>';
											} else {
											}
											?>
											<li><a href="index.php?controller=DashBoard&action=changePassword"><i class="fa fa-unlock-alt"></i>Đổi mật khẩu</a></li>
											<li><a href="index.php?controller=Logout&action=index"><i class="fa fa-power-off"></i>Thoát</a></li>
										</ul>
									</div>
								</div>
							</li>
							<li class="add-listing">
								<a href="index.php?controller=DashBoard&action=submitProperty" class="theme-cl">
									<i class="fas fa-plus-circle mr-1"></i>Đăng tin
								</a>
							</li>
						</ul>
					<?php else : ?>
						<ul class="nav-menu nav-menu-social align-to-right">
							<li>
								<a href="#" class="alio_green" data-toggle="modal" data-target="#login">
									<i class="fas fa-sign-in-alt mr-1"></i><span class="dn-lg">Đăng nhập</span>
								</a>
							</li>
							<li class="add-listing">
								<a href="#" class="theme-cl" data-toggle="modal" data-target="#login">
									<i class="fas fa-plus-circle mr-1"></i>Đăng tin
								</a>
							</li>
						</ul>
					<?php endif; ?>

					<!-- ==============================  View Signing  ================================ -->
				</div>
			</nav>
		</div>
	</div>
	<!-- End Navigation -->
	<!-- ============================================================== -->




	<!-- ============================================================== -->
	<!-- Giao dien nguoi dung -->
	<?php require_once 'router.php'; ?>
	<!-- Giao dien nguoi dung -->
	<!-- ============================================================== -->


	<!-- ============================ Call To Action ================================== -->
	<section class="theme-bg call_action_wrap-wrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<div class="call_action_wrap">
						<div class="call_action_wrap-head">
							<h3>Bạn có thắc mắc nào không ?</h3>
							<span>Chúng tôi sẽ giúp bạn phát triển sự nghiệp và thành công.</span>
						</div>
						<a href="index.php?controller=Contact&action=index" class="btn btn-call_action_wrap">Liên hệ ngay hôm nay</a>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- ============================ Call To Action End ================================== -->


	<!-- ============================================================== -->
	<!-- Start Footer -->

	<footer class="dark-footer skin-dark-footer style-2">
		<div class="footer-middle">
			<div class="container">
				<div class="row">

					<div class="col-lg-5 col-md-5">
						<div class="footer_widget">
							<img src="public/img/logo-light.png" class="img-footer small mb-2" alt="" />
							<h4 class="extream mb-3">Bạn cần trợ giúp ?</h4>
							<p>Nhận thông tin cập nhật, ưu đãi hấp dẫn, hướng dẫn, giảm giá được gửi thẳng vào hộp thư của bạn hàng tháng</p>
							<div class="foot-news-last">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Địa chỉ Email">
									<div class="input-group-append">
										<button type="button" class="input-group-text theme-bg b-0 text-light">Đăng ký</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-7 ml-auto">
						<div class="row">

							<div class="col-lg-4 col-md-4">
								<div class="footer_widget">
									<h4 class="widget_title">Hướng dẫn</h4>
									<ul class="footer-menu">
										<li><a href="#">Báo giá & hỗ trợ</a></li>
										<li><a href="#">Câu hỏi thường gặp</a></li>
										<li><a href="#">Thông báo</a></li>
										<li><a href="#">Liên hệ</a></li>
										<li><a href="#">Sitemap</a></li>
										<li><a href="#">Góp ý báo lỗi</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-5 col-md-4">
								<div class="footer_widget">
									<h4 class="widget_title">Quy định</h4>
									<ul class="footer-menu">
										<li><a href="#">Quy định đăng tin<span class="new">New</span></a></li>
										<li><a href="#">Quy chế hoạt động</a></li>
										<li><a href="#">Điều khoản thỏa thuận<span class="new">New</span></a></li>
										<li><a href="#">Chính sách bảo mật</a></li>
										<li><a href="#">Giải quyết khiếu nại</a></li>
										<li><a href="#">Góp ý báo lỗi</a></li>
									</ul>
								</div>
							</div>

							<div class="col-lg-3 col-md-4">
								<div class="footer_widget">
									<h4 class="widget_title">Khu vực</h4>
									<ul class="footer-menu">
										<li><a href="index.php?controller=RentRoom&action=thanhkhe">Thanh Khê</a></li>
										<li><a href="index.php?controller=RentRoom&action=haichau">Hải Châu</a></li>
										<li><a href="index.php?controller=RentRoom&action=lienchieu">Liên Chiểu</a></li>
										<li><a href="index.php?controller=RentRoom&action=camle">Cẩm Lệ</a></li>
										<li><a href="index.php?controller=RentRoom&action=sontra">Sơn Trà</a></li>
										<li style="width:150px"><a href="index.php?controller=RentRoom&action=nguhanhson">Ngũ Hành Sơn <span class="update">Up</span></a></li>
										<li><a href="index.php?controller=RentRoom&action=hoavang">Hoà Vang</a></li>
										<li><a href="index.php?controller=RentRoom&action=hoangsa">Hoàng Sa</a></li>
									</ul>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-12 col-md-12 text-center">
						<p class="mb-0">© 2024 WORLICITY. Designd and Powered By <a href="#">Tu Quy Heo</a>.</p>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- End Footer -->
	<!-- ============================================================== -->

	<!-- ============================================================== -->
	<!-- Giao dien nguoi dung -->
	<?php require_once 'login/log.php'; ?>
	<!-- Giao dien nguoi dung -->
	<!-- ============================================================== -->

	<!-- Send Message -->
	<div class="modal fade" id="autho-message" tabindex="-1" role="dialog" aria-labelledby="authomessage" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
			<div class="modal-content" id="authomessage">
				<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
				<div class="modal-body">
					<h4 class="modal-header-title">Drop Message</h4>
					<div class="login-form">
						<form>

							<div class="form-group">
								<label>Subject</label>
								<div class="input-with-icons">
									<input type="text" class="form-control" placeholder="Message Title">
								</div>
							</div>

							<div class="form-group">
								<label>Messages</label>
								<div class="input-with-icons">
									<textarea class="form-control ht-80"></textarea>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-md full-width pop-login">Send Message</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->



	<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
	<!-- ============================ Login ================================== -->

	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/ion.rangeSlider.min.js"></script>
	<script src="public/js/select2.min.js"></script>
	<script src="public/js/jquery.magnific-popup.min.js"></script>
	<script src="public/js/slick.js"></script>
	<script src="public/js/slider-bg.js"></script>
	<script src="public/js/lightbox.js"></script>
	<script src="public/js/imagesloaded.js"></script>
	<script src="public/js/daterangepicker.js"></script>
	<script src="public/js/custom.js"></script>

	<!-- Morris.js charts -->
	<script src="public/js/raphael.min.js"></script>
	<script src="public/js/morris.min.js"></script>

	<!-- Custom Morrisjs JavaScript -->
	<script src="public/js/morris.js"></script>
	<!-- ============================================================== -->
	<!-- This page plugins -->
	<!-- ============================================================== -->
	<script src="public/js/ajaxjs.js"></script>
	<!-- ============================================================== -->

	<script>
		tinymce.init({
			selector: '#description',
			plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
			toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
			tinycomments_mode: 'embedded',
			tinycomments_author: 'Author name',
			mergetags_list: [{
					value: 'First.Name',
					title: 'First Name'
				},
				{
					value: 'Email',
					title: 'Email'
				},
			]
		});
	</script>

	<script>
		tinymce.init({
			selector: '#description_news',
			plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
			toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
			tinycomments_mode: 'embedded',
			tinycomments_author: 'Author name',
			mergetags_list: [{
					value: 'First.Name',
					title: 'First Name'
				},
				{
					value: 'Email',
					title: 'Email'
				},
			]
		});
	</script>
	<!-- ============================================================== -->


	<!-- ============================================================== -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
	<script>
		$(document).ready(function() {
			$('input[name="checkin"]').datepicker({
				format: 'dd/mm/yyyy',
				autoclose: true,
				beforeShow: function(input, inst) {
					setTimeout(function() {
						$('.datepicker-dropdown').addClass('custom-datepicker');
					}, 0);
				}
			});

			$('input[name="checkout"]').datepicker({
				format: 'dd/mm/yyyy',
				autoclose: true,
				beforeShow: function(input, inst) {
					setTimeout(function() {
						$('.datepicker-dropdown').addClass('custom-datepicker');
					}, 0);
				}
			});
		});
	</script>
	<!-- ============================================================== -->
	<script>
		function calculateRent() {
			var priceText = document.getElementById("price").innerText; // Lấy giá trị từ phần tử HTML
			var price = parseInt(priceText.replace(/[^0-9]/g, "")); // Chuyển đổi giá trị thành số nguyên

			var checkin = new Date(document.getElementById("checkin").value); // Lấy giá trị từ ô input checkin
			var checkout = new Date(document.getElementById("checkout").value); // Lấy giá trị từ ô input checkout

			var oneDay = 24 * 60 * 60 * 1000; // Số mili giây trong một ngày
			var numberOfDays = Math.round(Math.abs((checkout - checkin) / oneDay)); // Tính tổng số ngày thuê

			var dailyRent = price / 30; // Tính giá thuê từng ngày (giả sử 30 ngày trong một tháng)
			var totalRent = dailyRent * numberOfDays; // Tính tổng hợp đồng

			document.getElementById("totalRent").innerText = totalRent.toLocaleString() + " VND"; // Hiển thị giá trị tổng hợp đồng
		}
	</script>



	<!-- ============================================================== -->
	<script>
		$(document).ready(function() {
			$('.delete-user').click(function(e) {
				e.preventDefault();
				var userId = $(this).data('userid');

				// Gửi yêu cầu xóa thông qua Ajax
				$.ajax({
					url: 'app/delete_user.php', // Đường dẫn tới file xử lý xóa người dùng
					type: 'POST',
					data: {
						user_id: userId
					},
					success: function(response) {
						// Xử lý kết quả trả về sau khi xóa người dùng
						if (response === 'success') {
							// Xóa dòng người dùng khỏi danh sách trực tiếp
							$(e.target).closest('tr').remove();
						}
					}
				});
			});
		});
	</script>

	<!-- ============================================================== -->
	<script>
		$(document).ready(function() {
			$("#btnSaveChanges").click(function(e) {
				e.preventDefault();

				var oldPassword = $("input[name='oldPassword']").val();
				var newPassword = $("input[name='newPassword']").val();
				var confirmPassword = $("input[name='confirmPassword']").val();

				// Kiểm tra xác nhận mật khẩu
				if (newPassword !== confirmPassword) {
					alert("Mật khẩu mới và mật khẩu xác nhận không khớp.");
					return;
				}

				// Mã hóa mật khẩu bằng MD5
				var oldPasswordMD5 = md5(oldPassword);
				var newPasswordMD5 = md5(newPassword);

				// Gửi Ajax request để đổi mật khẩu
				$.ajax({
					url: "app/change_password.php",
					method: "POST",
					data: {
						oldPassword: oldPasswordMD5,
						newPassword: newPasswordMD5
					},
					success: function(response) {
						if (response === "success") {
							alert("Đổi mật khẩu thành công.");
						} else {
							alert("Đổi mật khẩu thất bại. Vui lòng kiểm tra lại mật khẩu cũ.");
						}
					},
					error: function() {
						alert("Đã xảy ra lỗi. Vui lòng thử lại sau.");
					}
				});
			});
		});
	</script>
	<!-- ============================================================== -->
	<script>
		var priceElements = document.getElementsByClassName('formatted-price');
		for (var i = 0; i < priceElements.length; i++) {
			var priceElement = priceElements[i];
			var price = parseFloat(priceElement.getAttribute('data-price'));
			var formattedPrice = price.toLocaleString('vi-VN');
			priceElement.textContent = formattedPrice;
		}
	</script>
	<!-- ============================================================== -->

	<!-- ============================================================== -->

</body>

</html>