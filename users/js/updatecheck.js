
const formtb = document.getElementsByClassName("formtb");
for(i = 0; i < formtb.length; i++){
    let err = "errorstb"+i.toString() 
    const errtb = document.getElementById(err);
    const form = document.getElementById("tb"+i.toString())
    let email = "idtb1"+i.toString()
    const mailfield = document.getElementById(email);
    form.addEventListener('submit',(e)=>{
        mailfield.classList.remove("error")
        errtb.innerText = ''
        const mailreg = new RegExp(/\w+@\w+\.\w+/,"gm");
        let got_err = false
        if(!mailreg.test(mailfield.value)){
            mailfield.classList.add("error")
            errtb.innerText += " Некорректно введён email. Шаблон *@*.* \n"
            got_err = true
        }
        if(got_err){
            e.preventDefault()
        }
    
    })}