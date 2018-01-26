		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var id_categoria= $("#id_categoria").val();
			var parametros={'action':'ajax','page':page,'q':q,'id_categoria':id_categoria};
			$("#loader").fadeIn('slow');
			$.ajax({
				data: parametros,
				url:'./ajax/buscar_producto.php',
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	
		
			function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("Realmente deseas eliminar el producto")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_producto.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultadosd").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultadosd").html(datos);
		load(1);
		}
			});
		}
		}
		
		
		
		
		
		
		

