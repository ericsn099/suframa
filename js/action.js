
let fecharMsg = () => document.querySelector('.alert-danger').style.display  = 'none';


document.querySelector('.alert-danger .alert-close i ').addEventListener('click', ()=>{
    fecharMsg();
  });

  setTimeout(()=>{
    fecharMsg();
  }, 7000)