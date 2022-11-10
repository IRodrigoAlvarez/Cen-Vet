var Vec= new Array();

function init(){
    console.log("Aplicacion iniciada....");
}

function limpiar(){
    var codigo=document.getElementById("codigo");
    var nombre=document.getElementById("nombre");
    var cantidad=document.getElementById("cantidad");
    var total=document.getElementById("total"); 
    codigo.value ="";
    nombre.value ="";
    cantidad.value ="";
    total.value ="";
}

function agregar(){
    var codigo=document.getElementById("codigo").value;
    var nombre=document.getElementById("nombre").value;
    var cantidad=document.getElementById("cantidad").value;
    var total=document.getElementById("total").value; 
    var venta=new venta(codigo.value,
        nombre.value,
        cantidad.value,
        cedula.value
        );
    Vec.push(per);
    verTabla();
 
}

function verTabla(){

}

function venta(codigo,nombre,cantidad,total){
    this.codigo = codigo;
    this.nombre=nombre;
    this.cantidad=cantidad;
    this.total=total; 
}