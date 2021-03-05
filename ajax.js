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
				$('#body-table tr').append(data);
			}else{
				$('#alert').append("Seleccione nombre");
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
				$('#alert').append(data);
			}else{
				$('#alert').append("Seleccione nombre");
			}
		},
		error:function(){
			console.log("HUBO UN ERROR");
		}
	});

} 
