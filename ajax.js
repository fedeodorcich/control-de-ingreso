function getPeople(value){
	$.ajax({
		url: 'php/getPeople.php',
		type: 'POST',
		data: {value},
		success:function(data){
			$('#select-name').append(data);
		},
		error:function(){
			console.log("HUBO UN ERROR");
		}
	});
}

function getLastEntrys(name){

	$.ajax({
		url: 'php/getLastEntrys.php',
		type: 'POST',
		data: {name},
		success:function(data){
			$('#body-table tr').empty();
			$('#alert').empty();
			if(data){
				console.log(data);
				$('#alert').empty();
				$('#body-table tr').append(data);
			}else{
				$('#alert').empty();
				$('#alert').append('<div class="mt-3 alert alert-danger text-center" role="alert">'+
  									'Seleccione un nombre'+
									'</div>');
			}
		},
		error:function(){
			console.log("HUBO UN ERROR");
		}
	});
}


function marcar (name){
	
	$.ajax({
		url: 'php/marcado.php',
		type: 'POST',
		data: {name},
		success:function(data){
			$('#alert').empty();
			if(data){
				console.log(data);
				$('.table').fadeOut(function(){
					$('#alert').append(data);
				});
				
			}else{
				$('.table').fadeOut(function(){
					$('#alert').append('<div class="mt-3 alert alert-danger text-center" role="alert">'+
  									'Seleccione un nombre'+
									'</div>');
				});
				
			}
		},
		error:function(){
			console.log("HUBO UN ERROR");
		}
	});

} 
