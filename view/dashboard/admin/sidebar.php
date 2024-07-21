<?php
require_once("verify.php");
?>

<!-- sidebar user -->
<div id="sidebar-user" class="col-lg-3 col-md-4">
    <div class="property_dashboard_navbar">
        <div class="dash_user_avater">
            <img src="public/upload/users/<?php echo $user['avatar_url']; ?>" class="img-fluid avater" alt="">
            <h4><?php echo $_SESSION["uauth"]["username"]; ?></h4>
            <span><?php echo $user['account_type_name']; ?></span>
        </div>

        <div class="dash_user_menues">
            <ul>
                <!-- thêm active vào li tương ứng với url đang chạy -->
                <?php
                if (isset($_SESSION["uauth"]["account_type_id"]) && $_SESSION["uauth"]["account_type_id"] == 1 || $_SESSION["uauth"]["account_type_id"] == 1) {
                    echo '<li><a href="?controller=DashBoard&action=index"><i class="fa fa-cog"></i>Trang user</a></li>';
                } else {
                }
                ?>
                <li><a href="index.php?controller=DashBoard&action=admin_dashboard"><i class="fa fa-tachometer-alt"></i>Trang chủ</a></li>
                <li><a href="index.php?controller=DashBoard&action=admin_account"><i class="fa fa-users"></i>Quản lý tài khoản</a></li>
                <li><a href="index.php?controller=DashBoard&action=admin_property"><i class="fa fa-folder"></i>Quản lý tin cho thuê</a></li>
                <li><a href="index.php?controller=DashBoard&action=admin_news"><i class="fa fa-newspaper"></i>Quản lý blogs</a></li>
            </ul>
        </div>

    </div>
</div>
<!-- -------------------------------- -->
<script>
    // Lấy đường dẫn hiện tại
    var currentUrl = window.location.href;

    // Lấy tất cả các thẻ <a> trong danh sách menu
    var menuLinks = document.querySelectorAll('.dash_user_menues a');

    // Lặp qua từng liên kết và kiểm tra nếu href của nó khớp với đường dẫn hiện tại
    for (var i = 0; i < menuLinks.length; i++) {
        if (menuLinks[i].href === currentUrl) {
            // Thêm class "active" vào thẻ li của liên kết đó
            menuLinks[i].parentNode.classList.add('active');
            break; // Kết thúc vòng lặp sau khi tìm thấy liên kết khớp
        }
    }
</script>