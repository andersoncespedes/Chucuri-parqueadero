(function() {
    function Auth(param,ev){
        this.param = param[0];
        this.ev = ev;
    }
    Auth.prototype.placa = function(){
        let placa = this.param.placa.value;
        if(placa.length != 6){
            alert('son muchos caracteres');
            this.ev.preventDefault();
        }
    }
    Auth.prototype.cedula = function(){
        let cedula = this.param.cedula.value;
        if(cedula.length > 6){
            alert('su cedula es demasiado larga')
            this.ev.preventDefault();
        }
    }
    const datos = document.getElementsByName('form');
    datos[0].in.addEventListener('click', function(ev){
         let auth = new Auth(datos, ev);
        auth.placa();
        auth.cedula();

    })
   
    console.log('funciona');
})();