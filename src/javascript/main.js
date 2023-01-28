(function() {
    const veh = document.getElementById('veh-form');
    const clien = document.getElementById('clien-form');
    const plac = document.getElementById('plac_sh');
    const monto = document.getElementById('monto');
    const sig = document.getElementById('siguiente');
    const datos = document.getElementsByName('form');
    

    setInterval(function(){
        let date = new Date();
        let hours = (date.getHours() > 12 ? date.getHours() - 12 : date.getHours())
            document.getElementById('hora').innerHTML = `
            Hora: ${(hours < 10 ? '0' + hours : hours)}:
            ${date.getMinutes() < 10 ? '0' + date.getMinutes(): date.getMinutes()}:
            ${date.getSeconds() < 10 ? '0' + date.getSeconds(): date.getSeconds()}`
       },1000);
       document.getElementById('placa').addEventListener('keyup', function(){
       this.value =  this.value.toUpperCase();
       })
    function Auth(param,ev){
        this.param = param[0];
        this.ev = ev;
    }
    Auth.prototype.placa = function(){
        let placa = this.param.placa.value;
        let tipo = this.param.tipo.value;
        let expreg = tipo == "Moto" ? /^[0-9]{3}[A-Za-z]{3}/ : tipo == "Carro" ? /[A-Za-z]{3}[0-9]{3}/ : /[A-Za-z]{3}[0-9]{3}/ ;
        if(!expreg.test(placa)){
            alert('NO');
            this.ev.preventDefault();
            return false;
        }
        if(placa.length != 6){
            alert('son muchos caracteres');
            this.ev.preventDefault();
            return false;
        }
        return true;
    }
    Auth.prototype.cedula = function(){
        let cedula = this.param.cedula.value;
        if(cedula.length > 6){
            alert('su cedula es demasiado larga')
            this.ev.preventDefault();
            return false;
        }
        if(isNaN(cedula)){
            alert('El campo cedula debe ser numero');
            this.ev.preventDefault();
            return false;
        }
        return true
    }

    datos[0].in.addEventListener('click', function(ev){
         let auth = new Auth(datos, ev);
        auth.placa();
    });
 
    sig.addEventListener("click", function(ev){
        let auth = new Auth(datos, ev);
        let date = new Date();
        let hours = (date.getHours() > 12 ? date.getHours() - 12 : date.getHours())
            datos[0].entrada.value = `
            ${(hours < 10 ? '0' + hours : hours)}:
            ${date.getMinutes() < 10 ? '0' + date.getMinutes(): date.getMinutes()}:
            ${date.getSeconds() < 10 ? '0' + date.getSeconds(): date.getSeconds()}`
        if(auth.placa()){
            console.log(plac.value);
            veh.style.display = "none";
            clien.style.display = "block";
            plac.value = datos[0].placa.value;
            if(datos[0].tipo.value == 'Moto'){
                monto.value = 7300;
            }
            else if(datos[0].tipo.value == 'Carro'){
                monto.value = 9300;
            }
            
        }
    });
})();