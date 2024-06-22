const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal.fire({
		title: '',
		text: flashData,
		icon: 'success'
	});
}

// Accept Button for Payment
// $('.accept-btn').on('submit', function (e) {
// 	Swal.fire({
// 		position: "top-end",
// 		icon: "success",
// 		title: "Your work has been saved",
// 		showConfirmButton: false,
// 		timer: 1500
// 	});
// });
