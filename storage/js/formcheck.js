const form = document.getElementById("form");
const err = document.getElementById('errors');
const reg = new RegExp(/[0-9]+/,"g");
form.addEventListener('submit',(e)=>{
    const namefield = document.getElementById("id_2")
    const amountfield = document.getElementById("id_3")
    const pricefield = document.getElementById("id_4")
    err.innerText = ''
    namefield.classList.remove("error")
    amountfield.classList.remove("error")
    pricefield.classList.remove("error")
    let got_err = false;
    if(reg.test(amountfield.value)){
        amountfield.classList.add("error")
        err.innerText += " Некорректно введено число предметов \n"
        got_err = true;
    }
    if(namefield.value.length < 4){
        namefield.classList.add("error")
        err.innerText += " Некорректно введено название Предмета. Название должно быть >3 символов в длину. \n"
        got_err = true
    }
    if(got_err){
        e.preventDefault();
    }
    });