const flashData = $('.flash-data').data('flashdata');
if (flashData) {
	Swal.fire({
		title: flashData,
		text: 'Silahkan lanjutkan ke menu "My Conference" untuk Upload Link Video.',
		icon: 'success'
	});
}

const flashDataMyConference = $('.flash-data').data('flashdata');
if (flashDataMyConference) {
	Swal.fire({
		position: "top",
		icon: "success",
		title: flashData,
		text: 'Please wait Admin to accept your Conference.',
		showConfirmButton: false,
		timer: 3500
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
