var GuestController = {
	
	init: function () {
		GuestController.setForm();
		GuestController.showList();
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
		var form = document.querySelector('form');
		form.reset();
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
	
	showList: function () {
		GuestService.getList(function(list) {
			list.forEach(function(funcionarios) {
				GuestController.addToHTML(funcionarios);
			});	
		});
	},
	
	
	
	addToHTML: function (funcionarios) {
		var
			guestList = document.getElementById('guestList'),
			dl = document.createElement('dl'),
			dt = GuestController.createDT(funcionarios),
			ddNome = GuestController.createDD(funcionarios.nome, 'nome'),
			imgDelete = GuestController.createDelete(funcionarios),
			ddSobrenome = GuestController.createDD(funcionarios.sobrenome, 'sobrenome'),
			ddCpf = GuestController.createDD(funcionarios.cpf, 'cpf'),
			ddRg = GuestController.createDD(funcionarios.rg, 'rg'),
			ddNacionalidade = GuestController.createDD(funcionarios.nacionalidade, 'nacionalidade'),
			ddEmail = GuestController.createDD(funcionarios.email, 'email'),
			ddNascimento = GuestController.createDD(funcionarios.nascimento, 'nascimento'),
			ddIdade = GuestController.createDD(funcionarios.idade, 'idade'),
			ddDdd = GuestController.createDD(funcionarios.ddd, 'ddd'),
			ddSexo = GuestController.createDD(funcionarios.sexo, 'sexo');
		
		
		ddNome.appendChild(imgDelete);
		
		dl.appendChild(dt);
		dl.appendChild(ddNome);
		dl.appendChild(ddSobrenome);
		dl.appendChild(ddCpf);
		dl.appendChild(ddRg);
		dl.appendChild(ddNacionalidade);
		dl.appendChild(ddEmail);
		dl.appendChild(ddNascimento);
		dl.appendChild(ddIdade);
		dl.appendChild(ddDdd);
		dl.appendChild(ddSexo);
		
		guestList.appendChild(dl);
	},
	
	
	
	
	
	createDD: function(value, classNome) {
		var dd = document.createElement('dd');
		
		dd.innerHTML = value;
		dd.classNome = classNome;
		
		return dd;
	},
	
	createDelete: function(funcionarios) {
		var imgDelete = GuestController.createImage('assets/images/delete.gif');
		
		imgDelete.setAttribute('data-funcionariosid', funcionarios.id);
		imgDelete.setAttribute('data-funcionariosname', funcionarios.nome);
		
		imgDelete.addEventListener('click', function() {
			GuestController.deleteGuest(this);
		});
		
		return imgDelete;
	}



};

GuestController.init();
