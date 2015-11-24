var Controller = {
	
	init: function () {
		Controller.setForm();
	
	},
	
	setForm: function () {
		var form = document.querySelector('form');
		form.addEventListener('submit', function(event) {
			Controller.removeFun(form );
			//it is to avoid form submition
			event.preventDefault();
		});
		Controller.setFocus();
	},
	
	setFocus: function() {
		var inputNome = document.getElementById('nome');
		inputNome.focus();
	},
	
	clearForm: function() {
		var form = document.querySelector('form');
		form.reset();
		Controller.setFocus();
	},
	
	removeFun: function(form) {
		var funcionarios = {
			nome: form.nome.value,
			sobrenome:form.sobrenome.value,
			cpf: form.cpf.value,
			rg: form.rg.value,
			nacionalidade: form.nacionalidade.value,
			email: form.email.value,
			nascimento: form.nascimento.value,
			idade: form.idade.value,
			ddd: form.ddd.value,
			sexo: form.sexo.value
		};
		GuestService.add(funcionarios, function(response) {
			Controller.addToHTML(response);
		   Controller.clearForm();
		});
	},
	
};

Controller.init();