function validar(e,opcion){    
    var tecla = (document.all) ? e.keyCode : e.which;
 
    if (tecla==13){
        if (opcion==1){
            buscarpaciente_ci();
        }
        
        if (opcion==2){
            buscarpaciente_codigo();
        }
        
        if (opcion==3){
            buscarpaciente_nombre();
        }
    }
}

function buscarpaciente_ci(){
    var paciente_ci = document.getElementById('paciente_ci').value;
    var parametro = " paciente_ci = "+paciente_ci;
    
    buscar_paciente(parametro);
}

function buscarpaciente_codigo(){
    var paciente_codigo = document.getElementById('paciente_codigo').value;
    var parametro = " paciente_codigo = "+paciente_codigo;
    
    buscar_paciente(parametro);
}

function buscarpaciente_nombre(){
    var paciente_nombre = document.getElementById('paciente_nombre').value;
    var parametro = " paciente_nombre = '"+paciente_nombre+"'";
    
    buscar_paciente(parametro);
}

function buscar_paciente(parametro){
//    alert(parametro);
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"prueba/buscar"
    
    //alert(controlador);
    
    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){     
               
               var registros = JSON.parse(respuesta);
                
               if (registros != null){
                   
                  // alert('regresa aqui'+registros.length);
               }
           
        },
        error:function(respuesta){

        }
        
    });
}

function seleccionar(opcion){
    //alert(opcion);
}