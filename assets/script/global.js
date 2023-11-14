let getUrl = window.location;
let baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/'; 

function info(pesan,timer) {
	$(document).Toasts('create', {
		class: 'bg-info', 
		title: 'Informasi',
		autohide: true,
		delay: timer,
		body: pesan
	})
}
function infoSuccess(pesan,timer) {
	$(document).Toasts('create', {
		class: 'bg-success', 
		title: 'Informasi',
		autohide: true,
		delay: timer,
		body: pesan
	})

}
function error(pesan,timer) {
	$(document).Toasts('create', {
		class: 'bg-warning', 
		title: 'Informasi',
		autohide: true,
		delay: timer,
		body: pesan
	})
}

function swallLoading(title,text) {
	Swal.fire({
		title: title,
		text: text,
		didOpen: () => {
			Swal.showLoading();
		}
	})
}

