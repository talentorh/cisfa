function multiplicar(valor){
    total1=document.getElementById('txt_campo_1').value;
    total2=document.getElementById('txt_campo_2').value;
    total5=document.getElementById('txt_campo_3').value;
    total3=parseFloat(total1);
    total=parseFloat(Math.round(total3*total2*100)/100).toFixed(2);
    total4=parseFloat(Math.round(total3*total5*100)/100).toFixed(2);
    document.getElementById('spTotal').value=total;
    document.getElementById('spTotal2').value=total4
}
window.addEventListener('load',function(){
    let select=document.querySelector("#select_usuario");
    let i="";let input=document.querySelector("#input");
    select.addEventListener('change',function(e){
        e.preventDefault();input.innerHTML='';
        for(i=0;i<select.value;i++){
            createInputs()}});
    function createInputs(){
        let element=document.createElement('div');
        element.innerHTML=`<div class="form-group"><p>Inresa el nombre del laboratorio ${i+1}</p><input type="text"class="form-control"name="otroLaboratorio"placeholder="Ingresa el nombre del laboratorio"/></div>`;
        input.appendChild(element)}});