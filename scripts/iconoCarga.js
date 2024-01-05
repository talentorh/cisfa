$(document).ready(function() {    
    $('#select_tipoFarm').on('change', function(){
            
                //Añadimos la imagen de carga en el contenedor
            $('#tabla_resultado').html('<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');

        
        return false;
    });              
}); 

$(document).ready(function() {    
    $('#select_contrato').on('change', function(){
            
                //Añadimos la imagen de carga en el contenedor
            $('#tabla_resultado').html('<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');

        
     return false;
    });              
}); 

$(document).ready(function() {    
    $('#select_numerocontrato').on('change', function(){
            
                //Añadimos la imagen de carga en el contenedor
            $('#tabla_resultado').html('<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');

        
        return false;
    });              
}); 

$(document).ready(function() {    
    $('#select_proveedor').on('change', function(){
            
                //Añadimos la imagen de carga en el contenedor
            $('#tabla_resultado').html('<div id="tabla_resultado" style="position: fixed;  top: 0px; left: 0px;  width: 100%; height: 100%; z-index: 9999;  opacity: .7; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/></div>');

        
        return false;
    });              
});
$(document).ready(function() {    

        //Añadimos la imagen de carga en el contenedor
        $('#tabla_resultado').html('<div id="tabla_resultado" style="position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 9999;  opacity: .8; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/>Un momento, por favor...</div>');

        
        return false;
                
});