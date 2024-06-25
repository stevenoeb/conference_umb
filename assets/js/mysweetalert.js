const flashDataBtn = $('.flash-data').data('flashdata');
if (flashDataBtn) {
	Swal.fire({
		title: flashDataBtn,
		text: 'Please proceed to the "My Conference" menu to Upload Video Link.',
		icon: 'success'
	});
}

const flashDataToast = $('.flash-data').data('flashdata-toast');
const flashDataToastText = $('.flash-data-text').data('flashdata-toast-text');
const flashDataToastIcon = $('.flash-data-icon').data('flashdata-toast-icon');

if (flashDataToast && flashDataToastText) {
	Swal.fire({
		icon: flashDataToastIcon,
		title: flashDataToast,
		text: flashDataToastText,
		showConfirmButton: false,
		timer: 3500
	});
}

// Delete button on My Conference
$('.mc-delete-btn').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: "Are you sure to delete this conference?",
		text: "You can't undo all your conference data after delete.",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!"
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});
