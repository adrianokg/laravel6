$('document').ready(function (element) {
	$(".mask-data").mask("99/99/9999");
	$(".mask-cep").mask("99999-999");

	$("#cep").on('blur', function () {
		var cep = $(this).val();
		if (cep != "") {
			$.getJSON("https://viacep.com.br/ws/" + cep + "/json", function (dados) {
				$("#endereco").val(dados.logradouro);
				$("#bairro").val(dados.bairro);
				$("#complemento").val(dados.complemento);
				$("#cidade").val(dados.localidade);
				$("#estado").val(dados.uf);
			});
		}
	});
});
