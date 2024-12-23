const menuBtn = document.querySelector('.sidebarBurger');
const menu = document.querySelector('.sidebarContent');
menuBtn.addEventListener('click', function(){
	menu.classList.toggle('active');
});

function myFunction(x) {
    x.classList.toggle("change");
}
