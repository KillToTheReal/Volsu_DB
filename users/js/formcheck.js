const form = document.getElementById("form");
        const err = document.getElementById('errors');
        const reg = new RegExp(/\w+@\w+\.\w+/,"gm");
        form.addEventListener('submit',(e)=>{
            const mailfield = document.getElementById("id_2");
            mailfield.classList.remove("error")
            let got_err = false;
            err.innerText = ''
            if(!reg.test(mailfield.value)){
                mailfield.classList.add("error")
                err.innerText += " Некорректно введён email. Шаблон *@*.* \n"
                got_err = true;
            }        
            if(got_err){
                e.preventDefault();
            }
        });