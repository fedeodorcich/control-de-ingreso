function getPeople(value){
	$.ajax({
		url: 'php/getPeople.php',
		type: 'POST',
		data: {value},
		success:function(data){
			console.log(data);
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
			console.log(data);
			$('#body-table tr').append(data);
		},
		error:function(){
			console.log("HUBO UN ERROR");
		}
	});
}