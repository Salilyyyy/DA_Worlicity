<?php
// Kết nối tới cơ sở dữ liệu

require_once 'config/db.php';
$db = new connect();
$conn = $db->getConnection();


// Lấy dữ liệu từ bảng "property_types"
$propertyTypesQuery = "SELECT * FROM property_types";
$propertyTypesResult = $conn->query($propertyTypesQuery);

// Lấy dữ liệu từ bảng "areas"
$areasQuery = "SELECT * FROM areas";
$areasResult = $conn->query($areasQuery);

// Lấy dữ liệu từ bảng "bedrooms"
$bedroomsQuery = "SELECT * FROM bedrooms";
$bedroomsResult = $conn->query($bedroomsQuery);

// Lấy dữ liệu từ bảng "bathrooms"
$bathroomsQuery = "SELECT * FROM bathrooms";
$bathroomsResult = $conn->query($bathroomsQuery);

// Lấy dữ liệu từ bảng "genders"
$genderQuery = "SELECT * FROM genders";
$genderResult = $conn->query($genderQuery);

// Lấy dữ liệu từ bảng "utilities"
$utilitiesQuery = "SELECT * FROM utilities";
$utilitiesResult = $conn->query($utilitiesQuery);

// Đóng kết nối
$conn = null;
?>


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

<?php
// Tạo một đối tượng LoginModel
$loginModel = new LoginModel();

// Gọi phương thức isLoggedIn() để kiểm tra trạng thái đăng nhập
$loggedIn = $loginModel->isLoggedIn();
?>
<?php if (!$loggedIn) : ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="alert alert-info" role="alert">
                        <p>Bạn chưa đăng nhập ? Đăng nhập ngay <a href="#">Tại đây</a></p>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php else : ?>

    <!-- ============================ Submit Property Start ================================== -->
    <section>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="alert alert-info" role="alert">
                        <p>Mọi thông tin chi tiết xin liên hệ CSKH - Worlicity <a href="index.php?controller=Contact&action=index">Tại đây</a></p>
                    </div>

                </div>

                <!-- Submit Form -->
                <form action="controller/ResultSubmit.php" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-12 col-md-12">

                        <div class="submit-page p-0">

                            <!-- Basic Information -->
                            <div class="frm_submit_block">
                                <h3>Thông tin mô tả</h3>
                                <div class="frm_submit_wrap">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="property_name">Tên phòng trọ</label>
                                            <input type="text" id="property_name" name="property_name" required class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="age" style="width: 200px">Năm hoàn thành</label>
                                            <input type="text" id="age" name="age" required class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="property_type">Loại phòng</label>
                                            <!-- Load data -->
                                            <select id="property_type" name="property_type" required class="form-control">
                                                <!-- <option value="">&nbsp;</option> -->
                                                <?php while ($row = $propertyTypesResult->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['type_id']; ?>"><?php echo $row['type_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- Load data -->
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="price">Giá (Ví dụ: 2000000)</label>
                                            <input type="text" id="price" name="price" required class="form-control" placeholder="">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Đơn vị</label>
                                            <select id="unit" name="unit" class="form-control">
                                                <!-- <option value="">&nbsp;</option> -->
                                                <option value="tháng">giá/tháng</option>
                                                <option value="m²">giá/m²</option>
                                                <option value="căn">giá/căn</option>
                                                <option value="Thoả thuận">Thỏa thuận</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="area">Khoảng diện tích</label>
                                            <!-- Load data -->
                                            <select id="area" name="area" required class="form-control">
                                                <option value="">&nbsp;</option>
                                                <?php while ($row = $areasResult->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['area_id']; ?>"><?php echo $row['area']; ?> m²</option>
                                                <?php } ?>
                                                <option value="over1000">Trên 1000+ m²</option>
                                                <option value="option">Tùy chọn</option>
                                            </select>
                                            <!-- Load data -->
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="real_area">Diện tích thực tế</label>
                                            <input type="text" id="real_area" name="real_area" required class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="bedroom">Phòng ngủ</label>
                                            <!-- Load data -->
                                            <select id="bedroom" name="bedroom" required class="form-control">
                                                <!-- <option value="">&nbsp;</option> -->
                                                <?php while ($row = $bedroomsResult->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['bedroom_id']; ?>"><?php echo $row['bedroom_count']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- Load data -->
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="bathroom">Phòng tắm</label>
                                            <!-- Load data -->
                                            <select id="bathroom" name="bathroom" required class="form-control">
                                                <!-- <option value="">&nbsp;</option> -->
                                                <?php while ($row = $bathroomsResult->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['bathroom_id']; ?>"><?php echo $row['bathroom_count']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- Load data -->
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="gender">Giới tính người thuê</label>
                                            <!-- Load data -->
                                            <select id="gender" name="gender" required class="form-control">
                                                <!-- <option value="">&nbsp;</option> -->
                                                <?php while ($row = $genderResult->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['gender_id']; ?>"><?php echo $row['gender_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- Load data -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Gallery -->
                            <div class="frm_submit_block">
                                <h3>Thư viện ảnh</h3>
                                <div class="frm_submit_wrap">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Tải ảnh lên<a href="#" class="tip-topdata" data-tip="giữ Shift hoặc chọn nhiều mục để chọn nhiều ảnh"><i class="ti-help"></i></a></label>
                                            <i class="ti-gallery"></i><input type="file" name="my_image[]" required class="form-control" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Location -->
                            <div class="frm_submit_block">
                                <h3>Vị trí</h3>
                                <div class="frm_submit_wrap">
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="address">Địa chỉ (số nhà, tên đường, phường xã)</label>
                                            <input type="text" name="address" required class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="district">Quận, huyện</label>
                                            <select id="district-input" name="district" required class="form-control">
                                                <option value="" selected disabled hidden>Tìm kiếm...</option>
                                                <option value="Thanh Khê">Thanh Khê</option>
                                                <option value="Hải Châu">Hải Châu</option>
                                                <option value="Liên Chiểu">Liên Chiểu</option>
                                                <option value="Cẩm Lệ">Cẩm Lệ</option>
                                                <option value="Sơn Trà">Sơn Trà</option>
                                                <option value="Ngũ Hành Sơn">Ngũ Hành Sơn</option>
                                                <option value="Hoà Vang">Hoà Vang</option>
                                                <option value="Hoàng Sa">Hoàng Sa</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Detailed Information -->
                            <div class="frm_submit_block">
                                <h3>Chi tiết</h3>
                                <div class="frm_submit_wrap">
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label for="description">Mô tả</label>
                                            <textarea id="description" name="description" class="form-control h-120"></textarea>
                                        </div>


                                        <div class="form-group col-md-12">
                                            <label>Tiện ích khác (Tùy chọn)</label>
                                            <div class="o-features">
                                                <ul class="no-ul-list third-row">

                                                    <!-- Lấy dữ liệu từ cơ sở dữ liệu bảng utilities -->
                                                    <?php while ($row = $utilitiesResult->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <li>
                                                            <input id="utilities-<?php echo $row['utility_id']; ?>" class="checkbox-custom" name="utilities[]" type="checkbox" value="<?php echo $row['utility_id']; ?>">
                                                            <label for="utilities-<?php echo $row['utility_id']; ?>" class="checkbox-custom-label"><?php echo $row['utility_name']; ?></label>
                                                        </li>
                                                    <?php } ?>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-lg-12 col-md-12">
                                    <button class="btn btn-theme" type="submit" name="submit">Đăng tin cho thuê</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- ============================ Submit Property End ================================== -->
<?php endif; ?>