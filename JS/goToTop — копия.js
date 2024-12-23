function uploadImage() {
  let imageFile = document.getElementById('imageInput').files[0];
  fetch('/upload', { method: 'POST', body: new FormData().append('image', imageFile) })
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error(error));
}