const imgInput = document.getElementById('image');
imgInput.addEventListener("change", (e) => {
  const [file] = imgInput.files;
  if (file) {
    document.getElementById('preview').src = URL.createObjectURL(file);
  }
})