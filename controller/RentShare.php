<?php
require_once "model/Property.php";
class RentShareController
{
    protected $model;
    public function __construct()
    {
        $db = new connect();
        $this->model = new ModelHome($db);
    }

    private function formatPrice($price)
    {
        if ($price >= 1000000000) {
            $formatted_price = number_format($price / 1000000000, 1);
            return $formatted_price . " tỷ";
        } else if ($price >= 1000000) {
            return number_format($price / 1000000, 1) . " triệu";
        } else if ($price >= 1000) {
            return number_format($price / 1000, 1) . " nghìn";
        } else {
            return $price;
        }
    }


    public function index()
    {
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $district = isset($_POST['district']) ? $_POST['district'] : '';
        $propertyType = 4;
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $bedroom = isset($_POST['bedroom']) ? $_POST['bedroom'] : '';
        $bathroom = isset($_POST['bathroom']) ? $_POST['bathroom'] : '';
        $utilities = isset($_POST['utilities']) ? $_POST['utilities'] : '';
        $offset = isset($_POST['offset']) ? $_POST['offset'] : 0;
        $limit = isset($_POST['limit']) ? $_POST['limit'] : 10;

        $result = $this->model->rentRoomProperties($keyword, $district, $propertyType, $price, $bedroom, $bathroom, $utilities, $offset, $limit);

        foreach ($result as $key => $row) {
            $result[$key]['formatted_price'] = $this->formatPrice($row['price']);
        }

        require_once 'view/rent_share/index.php';
    }

    private function indexDistrict($input_district)
    {
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $district = $input_district;
        $propertyType = 4;
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $bedroom = isset($_POST['bedroom']) ? $_POST['bedroom'] : '';
        $bathroom = isset($_POST['bathroom']) ? $_POST['bathroom'] : '';
        $utilities = isset($_POST['utilities']) ? $_POST['utilities'] : '';
        $offset = isset($_POST['offset']) ? $_POST['offset'] : 0;
        $limit = isset($_POST['limit']) ? $_POST['limit'] : 10;

        $result = $this->model->rentRoomProperties($keyword, $district, $propertyType, $price, $bedroom, $bathroom, $utilities, $offset, $limit);

        foreach ($result as $key => $row) {
            $result[$key]['formatted_price'] = $this->formatPrice($row['price']);
        }

        require_once 'view/rent_share/index.php';
    }

    public function single()
    {
        if (isset($_GET['property_id'])) {
            $propertyId = $_GET['property_id'];

            // Tăng giá trị view_count lên 1 đơn vị
            $this->model->incrementViewCount($propertyId);

            $property = $this->model->getPropertyById($propertyId);

            // Kiểm tra nếu bất động sản tồn tại
            if (!empty($property)) {
                // Lấy danh sách ảnh của bất động sản từ cơ sở dữ liệu
                $propertyImages = $this->model->getPropertyImages($propertyId);

                // Định dạng lại giá bất động sản
                $property['formatted_price'] = $this->formatPrice($property['price']);

                // Lấy danh sách các bất động sản tương tự
                $similarProperties = $this->model->getSimilarProperties($propertyId, $property['type_id']);

                // Truyền dữ liệu $property, $propertyImages và $similarProperties vào view
                $data['property'] = $property;
                $data['propertyImages'] = $propertyImages;
                $data['similarProperties'] = $similarProperties;
                require_once 'view/rent_share/single.php';
            } else {
                // Xử lý trường hợp không tìm thấy bất động sản hoặc không có giá trị 'price'
                echo "Không tìm thấy bất động sản hoặc không có giá.";
            }
        } else {
            // Xử lý trường hợp không có ID bất động sản được truyền vào
            echo "Vui lòng cung cấp ID bất động sản.";
        }
    }

    public function thanhkhe()
    {
        $this->indexDistrict('Thanh Khê');
    }

    public function haichau()
    {
        $this->indexDistrict('Hải Châu');
    }

    public function lienchieu()
    {
        $this->indexDistrict('Liên Chiểu');
    }

    public function camle()
    {
        $this->indexDistrict('Cẩm Lệ');
    }

    public function sontra()
    {
        $this->indexDistrict('Sơn Trà');
    }

    public function nguhanhson()
    {
        $this->indexDistrict('Ngũ Hành Sơn');
    }

    public function hoavang()
    {
        $this->indexDistrict('Hòa Vang');
    }

    public function hoangsa()
    {
        $this->indexDistrict('Hoàng Sa');
    }
}
