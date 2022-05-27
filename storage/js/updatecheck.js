
const formtb = document.getElementsByClassName("formtb");
for(i = 0; i < formtb.length; i++){
    let err = "errorstb"+i.toString() 
    const errtb = document.getElementById(err);
    const form = document.getElementById("tb"+i.toString())
    let name = "idtb1"+i.toString()
    let amount = "idtb2"+i.toString()
    let price = "idtb3"+i.toString()
    const amountReg = new RegExp(/\d+/,"gm");
    const namefield = document.getElementById(name);
    const amountfield = document.getElementById(amount);
    const pricefield = document.getElementById(price);
    form.addEventListener('submit',(e)=>{
        errtb.innerText = ''
        amountfield.classList.remove("error")
        namefield.classList.remove("error")
        pricefield.classList.remove("error")
        let got_err = false

        if(!amountReg.test(amountfield.value)){
            amountfield.classList.add("error")
            errtb.innerText += "Некорректно введено число предметов \n"
            got_err = true;
        }
        if(namefield.value.length < 4){
            namefield.classList.add("error")
            errtb.innerText += " Некорректно введено название Предмета. Название должно быть >3 символов в длину. \n"
            got_err = true
        }
        if(got_err){
            e.preventDefault()
        }
    
    })}