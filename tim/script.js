let header_button = document.querySelector(".mobile_icon");
let header = document.querySelector("header");

// Menu 
function open_popup() {
	document.querySelector("header").classList.add("open");
	document.querySelector("img").src = "./images/free-icon-close-cross-64498.png";
}

function close_popup() {
	document.querySelector("header").classList.remove("open");
	document.querySelector("img").src = "./images/free-icon-menu-bar-8107138.png"
};

header_button.addEventListener("click", function () {

	if (header.classList.contains("open")) {
		close_popup();
	}
	else {
		open_popup();
	}

});

document.querySelector(".cards").addEventListener("click", close_popup, false);
document.querySelector(".popup").addEventListener("click", close_popup, false);


// Add photos 
document.querySelector("#show_add_photo").addEventListener("click", function () { // Чтобы открыть меню с добавлением
	document.querySelector(".add_new_photo").classList.add("open");
});

document.querySelector("#cancel").addEventListener("click", function (e) {// Чтобы закрыть меню с добавлением по кнопке
	e.preventDefault();
	document.querySelector(".add_new_photo").classList.remove("open");
});

function open_photo() {
	let src = this.querySelector("img").src,
		popup_photo = document.querySelector("#popup_photo");
	popup_photo.querySelector("img").src = src;
	popup_photo.classList.add("open");
}

let photos = document.querySelectorAll(".item");
for (let item of photos) {
	item.addEventListener("click", open_photo, false);
}

document.querySelector("#popup_photo").addEventListener("click", function () {
	this.classList.remove("open")
})