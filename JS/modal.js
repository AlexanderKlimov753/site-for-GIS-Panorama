document.addEventListener("DOMContentLoaded", function() {
  const btnCab = document.querySelector(".btnCab");
  const ModalCab = document.getElementById("ModalCab");
  const modalClose = document.querySelector(".modalClose");
  const cancelbtn = document.querySelector(".cancelbtn");

  btnCab.addEventListener('click', function() {
    ModalCab.style.display = 'block';
  });

  cancelbtn.addEventListener('click', function() {
    ModalCab.style.display = 'none';
  });

  modalClose.addEventListener('click', function() {
    ModalCab.style.display = 'none';
  });
});