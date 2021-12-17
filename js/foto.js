let foto = document.getElementById('fotografia');
let file = document.getElementById('flimagem');
foto.addEventListener('click',() =>{
  file.click();
});
file.addEventListener('alterar',() =>{
  if (file.files.length != 0) {
    let reader = new FileReader();
    reader.onload = () =>{
      foto.src = reader.result;
    }
    reader.readAsDataURL(file.files[0]);
  } else {
    return;
  }
});
