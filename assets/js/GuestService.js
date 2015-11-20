var GuestService = {

	list: [],
	
	add: function(funcionarios, callback) {
		$.ajax({
			type: 'POST',
			contentType: 'application/json',
			url: 'api/funcionarios/',
			data: JSON.stringify(funcionarios),
			success: function(addedfuncionarios) {
				console.log('Guest created!');
				callback(addedfuncionarios);
			},
			error: function() {
				console.log('Error to add guest ' + funcionarios.nome);
			}
		});
	},
	
	remove: function(id, callback) {
		$.ajax({
			type: 'DELETE',
			url: 'api/funcionarios/' + id,
			success: function(response) {
				console.log('Guest deleted!');
				callback(true);
			},
			error: function(jqXHR) {
				console.log('Error to delete guest with id ' + id);
				callback(false);
			}
		});
	},
	
	getList: function(callback) {
		$.ajax({
			type: 'GET',
			url: 'api/funcionarios/',
			dataType: 'json',
			success: function(list) {
				callback(list);
			}
		});
	}
}