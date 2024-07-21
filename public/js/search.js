const wardsByDistrict = {
	"Hải Châu": [
		"Bình Hiên",
		"Bình Thuận",
		"Hòa Cường Bắc",
		"Hòa Cường Nam",
		"Hòa Thuận Đông",
		"Hòa Thuận Tây",
		"Nam Dương",
		"Phước Ninh",
		"Tam Thuận",
		"Thanh Bình",
		"Thạch Thang",
		"Thuận Phước",
	],
	"Thanh Khê": [
		"An Khê",
		"Chính Gián",
		"Tam Thuận",
		"Thạc Gián",
		"Thanh Khê Đông",
		"Thanh Khê Tây",
		"Vĩnh Trung",
	],
	"Sơn Trà": [
		"An Hải Bắc",
		"An Hải Đông",
		"An Hải Tây",
		"Mân Thái",
		"Nại Hiên Đông",
		"Phước Mỹ",
		"Thọ Quang",
	],
	"Cẩm Lệ": [
		"Hòa An",
		"Hòa Phát",
		"Hòa Thọ Đông",
		"Hòa Thọ Tây",
		"Hòa Xuân",
		"Khuê Trung",
		"Tam Phú",
		"Thạch Thang",
		"Thanh Khê Đông",
	],
	"Liên Chiểu": [
		"Hoà Hiệp Bắc",
		"Hoà Hiệp Nam",
		"Hoà Khánh Bắc",
		"Hoà Khánh Nam",
		"Hoà Minh",
	],
	"Ngũ Hành Sơn": ["Hòa Hải", "Hòa Quý", "Khuê Mỹ", "Mỹ An"],
	"Hoà Vang": [
		"Hòa Bắc",
		"Hòa Châu",
		"Hòa Khương",
		"Hòa Liên",
		"Hòa Nhơn",
		"Hòa Phong",
		"Hòa Phú",
		"Hòa Phước",
		"Hòa Sơn",
		"Hòa Tiến",
	],
	"Hoàng Sa": ["Hoàng Sa"],
};

function updateWards() {
	const districtSelect = document.getElementById("districtSelect");
	const wardSelect = document.getElementById("wardSelect");
	const selectedDistrict = districtSelect.value;

	// Xóa các phường cũ
	wardSelect.innerHTML = '<option value="">Phường, xã</option>';

	if (selectedDistrict !== "") {
		const wards = wardsByDistrict[selectedDistrict];
		// Thêm các phường mới
		wards.forEach((ward) => {
			const option = document.createElement("option");
			option.text = ward;
			option.value = ward;
			wardSelect.appendChild(option);
		});
	}
}
