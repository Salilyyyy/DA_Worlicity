<?php
require_once 'config/db.php';
$db = new connect();
$conn = $db->getConnection();


// Lấy dữ liệu từ bảng "property_types"
$propertyTypesQuery = "SELECT * FROM property_types";
$propertyTypesResult = $conn->query($propertyTypesQuery);
// Lấy dữ liệu từ bảng "utilities"
$utilitiesQuery = "SELECT * FROM utilities";
$utilitiesResult = $conn->query($utilitiesQuery);
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

<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->

<!-- ============================ All Property ================================== -->
<section class="gray pt-4">

    <div class="container">

        <div class="row m-0">
            <div class="short_wraping">
                <div class="row align-items-right">
                 

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <!-- order-lg-2 order-md-3 elco_bor col-sm-12 -->
                        <div class="shorting_pagination">
                            <div class="shorting_pagination_laft">
                                <h4>Nhà nguyên căn cho thuê</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- property Sidebar -->
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="page-sidebar p-0">
                    <a class="filter_links" data-toggle="collapse" href="#fltbox" role="button" aria-expanded="false" aria-controls="fltbox">Open Advance Filter<i class="fa fa-sliders-h ml-2"></i></a>
                    <div class="collapse" id="fltbox">
                        <form action="" method="POST">
                            <!-- Find New Property -->
                            <div class="sidebar-widgets p-4">

                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
                                        <i class="ti-search"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="district" name="district" class="form-control">
                                            <option hidden value="">Quận, huyện</option>
                                            <option value="Hải Châu">Hải Châu</option>
                                            <option value="Thanh Khê">Thanh Khê</option>
                                            <option value="Sơn Trà">Sơn Trà</option>
                                            <option value="Cẩm Lệ">Cẩm Lệ</option>
                                            <option value="Liên Chiểu">Liên Chiểu</option>
                                            <option value="Ngũ Hành Sơn">Ngũ Hành Sơn</option>
                                            <option value="Hoà Vang">Hoà Vang</option>
                                            <option value="Hoàng Sa">Hoàng Sa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="ptype" name="propertyTypes" class="form-control">
                                            <option value="2">Nhà nguyên căn</option>
                                            <!-- <?php while ($row = $propertyTypesResult->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <option value="<?php echo $row['type_id']; ?>"><?php echo $row['type_name']; ?></option>
                                            <?php } ?> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="price" name="price" class="form-control">
                                            <option hidden value="">Mức giá</option>
                                            <option value="1000000">Dưới 1 triệu</option>
                                            <option value="2000000">1 triệu - 2 triệu</option>
                                            <option value="3000000">2 triệu - 3 triệu</option>
                                            <option value="5000000">3 triệu - 5 triệu</option>
                                            <option value="7000000">5 triệu - 7 triệu</option>
                                            <option value="10000000">7 triệu - 10 triệu</option>
                                            <option value="15000000">10 triệu - 15 triệu</option>
                                            <option value="15000001">Trên 15 triệu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="bedrooms" name="bedroom" class="form-control">
                                            <option hidden value="">Phòng ngủ</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="simple-input">
                                        <select id="bathrooms" name="bathroom" class="form-control">
                                            <option hidden value="">Phòng tắm</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                                        <h6>Tiện ích</h6>
                                        <ul class="row p-0 m-0">
                                            <?php while ($row = $utilitiesResult->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <li class="col-lg-6 col-md-6 p-0">
                                                    <input id="utilities-<?php echo $row['utility_id']; ?>" class="checkbox-custom" name="utilities[]" type="checkbox" value="<?php echo $row['utility_id']; ?>">
                                                    <label for="utilities-<?php echo $row['utility_id']; ?>" class="checkbox-custom-label"><?php echo $row['utility_name']; ?></label>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                                        <button type="submit" class="btn theme-bg rounded full-width">Tìm kiếm</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="row justify-content-center">

                    <!-- Single Property -->
                    <?php foreach ($result as $row) { ?>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="property-listing list_view">

                                <div class="listing-img-wrapper">
                                    <div class="_exlio_125" id="priceElement">
                                        <?php echo $row['formatted_price']; ?>/<?php echo $row['unit']; ?>
                                    </div>
                                    <div class="list-img-slide">
                                        <div class="click">
                                            <div><a href="?controller=RentHouse&action=single&property_id=<?php echo $row['property_id']; ?>"><img src="public/upload/properties/<?php echo $row['image_url']; ?>" class="img-fluid mx-auto" alt="" /></a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list_view_flex">

                                    <div class="listing-detail-wrapper mt-1">
                                        <div class="listing-short-detail-wrap">
                                            <div class="_card_list_flex mb-2">
                                                <div class="_card_flex_01">
                                                    <span class="_list_blickes types"><?php echo $row['type_name']; ?></span>
                                                    <span class="property-type elt_rent"><?php echo $row['age']; ?></span>
                                                </div>
                                                <div class="_card_flex_last">
                                                    <h6 class="listing-card-info-price mb-0">
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="_card_list_flex">
                                                <div class="_card_flex_01">
                                                    <h4 class="listing-name verified"><a href="?controller=RentHouse&action=single&property_id=<?php echo $row['property_id']; ?>" class="prt-link-detail">
                                                            <?php
                                                            $property_name = $row['property_name'];
                                                            if (strlen($property_name) > 150) {
                                                                $property_name = substr($property_name, 0, 147) . '...';
                                                            }
                                                            echo htmlentities($property_name);
                                                            ?>
                                                        </a></h4>
                                                    </>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="price-features-wrapper">
                                            <div class="list-fx-features">
                                                <div class="listing-card-info-icon">
                                                    <div class="inc-fleat-icon"><img src="public/img/bed.svg" width="13" alt="" /></div><?php echo $row['bedroom_count']; ?> phòng ngủ
                                                </div>
                                                <div class="listing-card-info-icon">
                                                    <div class="inc-fleat-icon"><img src="public/img/bathtub.svg" width="13" alt="" /></div><?php echo $row['bathroom_count']; ?> toilet
                                                </div>
                                                <div class="listing-card-info-icon">
                                                    <div class="inc-fleat-icon"><img src="public/img/move.svg" width="13" alt="" /></div><?php echo $row['real_area']; ?> m<sup>2
                                                </div>
                                            </div>
                                        </div>

                                        <div class="listing-detail-footer">
                                            <div class="footer-first">
                                                <div class="foot-rates">
                                                    <span class="elio_rate perfect"><i class="fas fa-eye"></i> <?php echo $row['view_count']; ?></span>
                                                    <span class="elio_rate perfect"><i class="fas fa-map-marker-alt"></i> <?php echo $row['district']; ?></span>
                                                </div>
                                            </div>
                                            <div class="footer-flex">
                                                <a href="?controller=RentHouse&action=single&property_id=<?php echo $row['property_id']; ?>" class="prt-view">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End Single Property -->



                </div>
            </div>


        </div>
    </div>
</section>
<!-- ============================ All Property ================================== -->