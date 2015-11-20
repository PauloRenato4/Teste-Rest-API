var GuestController = {
	
	init: function () {
		GuestController.setForm();
	},
	
	setForm: function () {
		var form = document.querySelector('form');
		form.addEventListener('submit', function(event) {
			GuestController.addFun(form );
			//it is to avoid form submition
			event.preventDefault();
		});
		GuestController.setFocus();
	},
	
	setFocus: function() {
		var inputNome = document.getElementById('nome');
		inputNome.focus();
	},
	
	clearForm: function() {
		var formulario = document.querySelector('formulario');
		formulario.reset();
		GuestController.setFocus();
	},
	
	addFun: function(form) {
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
		GuestService.add(funcionarios, function(addedfuncionarios) {
			GuestController.addToHTML(addedfuncionarios);
			GuestController.clearForm();
		});
	},
	



};

//TODO consider to have an HTMLService.js
//initialization
GuestController.init();
