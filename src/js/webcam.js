window.URL = window.URL || window.webkitURL;
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || function(){alert('Su navegador no soporta navigator.getUserMedia().');};

(function() { 

    function iniciaCamara(){
        $(document).ready(function(){
            window.datosVideo = {
                'StreamVideo': null,
                'url' : null
            };
            navigator.getUserMedia({'audio':false, 'video':true}, function(streamVideo){
                datosVideo.StreamVideo = streamVideo;
                datosVideo.url = window.URL.createObjectURL(streamVideo);
                $('#video').attr('src', datosVideo.url);
                escuchaEmpleado();
            }, function(){
                alert('No fue posible obtener acceso a la cámara.');
            });
        });
    }
    
    function almacenaDatos(empleado)
    {
      var canvas= document.getElementById("foto");
      //canvas.getContext("2d").drawImage(video, 0, 0, 320, 240);
      var data = canvas.toDataURL();
        $.post('index.php?/checador/salvarFoto', 
          {
            empleado:empleado,
            imagem:canvas.toDataURL()
          },
         function(data, status)
         {
          $('#salida').html(data);
          });

      //-----------------------------------------------------------
   /*   var xhr = new XMLHttpRequest();
      alert(data);
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4) {
        //$('#salida').html(xhr.responseText);
        $('#empleado').val('');
        
          }
      }
      xhr.open('POST','php/guardar.php',true);
      
      xhr.setRequestHeader('Content-Type', 'application/upload');
      return false;*/
  }
    
    function capturaFoto(){
         var oCamara, oFoto, oContexto, w, h;
         oCamara = $('#video');
         oFoto = $('#foto');
         w = oCamara.width();
         h = oCamara.height();
         oFoto.attr({
             'width': w,
             'height': h
         });
         oContexto = oFoto[0].getContext('2d');
         oContexto.drawImage(oCamara[0], 0, 0, w, h);
    }
    
    function escuchaEmpleado(){
        $('#empleado')
            .focus()
            .keypress(function(e) {
                if (e.which == 13) {
                    validaUsr();
                }
            });         
    }
    
    function validaUsr(){
        var empleado =$('#empleado').val();
        $.post("index.php?/checador" , {'empleado':empleado}, function(c){
            if(c != "") {
                $('#salida').html(c);
            } 
        }).done(function(){
            if ($('.true').length){
                capturaFoto();
                almacenaDatos(empleado);
            }
            if ($('.false').length){
                $('#empleado').val('');
            }
        });
    }
            
    function cerrarCamara(){
         if(datosVideo.StreamVideo){
                  datosVideo.StreamVideo.stop();
                  window.URL.revokeObjectURL(datosVideo.url);
              };
    }
    
    function cargaAdmin(){
        $('#inicio').bind('click',function(){
            cerrarCamara();
            $("body").poster("index.html","");
            //poster("index.html",'.content');  
        });
        
        $('#acceso').bind('click',function(){
            cerrarCamara();
            //$(".content").poster("admin/menu.html","");
            $(".content").poster("html/login.html","");
        });
        
    }
    
    $(function() {
        cargaAdmin();
        iniciaCamara();
      //  $('#reloj').reloj();
        return $;
    });
    
}).call(this);