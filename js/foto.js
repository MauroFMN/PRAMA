let foto = document.getElementById('fotografia');
let file = document.getElementById('foto');
foto.addEventListener('click',() =>{
  file.click();
});
file.addEventListener('change',() =>{
  if (file.files.length != 0) {
    let reader = new FileReader();
    reader.onload = () =>{
      foto.src = reader.result;
      foto.style.width = '90%';
      foto.style.height = '100%';
      foto.style.borderRadius = '50%';
    }
    reader.readAsDataURL(file.files[0]);
  } else {
    return;
  }
});
