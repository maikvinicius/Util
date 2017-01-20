<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Teste formulário</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<script type="text/javascript">
    /* M�scaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

//Mascara para Telefone
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que n�o � d�gito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca par�nteses em volta dos dois primeiros d�gitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca h�fen entre o quarto e o quinto d�gitos
    return v;
}

//Mascara para Celular
function mcel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que n�o � d�gito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca par�nteses em volta dos dois primeiros d�gitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca h�fen entre o quinto e o sexto d�gitos
    return v;
}

//Mascara para CPF
function mcpf(v){
	v=v.replace(/\D/g,"")                 //Remove tudo o que n�o � d�gito
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto d�gitos
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava d�gitos
	v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo d�gitos
	return v
}

//Mascara para CEP
function mcep(v){
	v=v.replace(/\D/g,"")                 //Remove tudo o que n�o � d�gito
	v=v.replace(/(\d{5})(\d)/,"$1-$2")   //Coloca ponto entre o antepenultimo digito
	return v
}

function mrg(v){
	v=v.replace(/\D/g,"")                 //Remove tudo o que n�o � d�gito
	v=v.replace(/(\d{2})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto d�gitos
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava d�gitos
	v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo d�gitos
	return v
}

function mdata(v){
v=v.replace(/\D/g,"");                 //Remove tudo o que não é dígito
v=v.replace(/(\d{2})(\d)/,"$1-$2");    //Coloca ponto entre o terceiro e o quarto dígitos
v=v.replace(/(\d{2})(\d)/,"$1-$2");    //Coloca ponto entre o setimo e o oitava dígitos
return v;
}

function id( el ){
    return document.getElementById( el );
}

window.onload = function(){

  // id('input-postcode').onkeyup = function(){
  //   mascara( this, mcep );
  // }

}

</script>

<body>

  <div class="container">

    <div class="row">

      <div class="form-group">
        <label for="cep">Cep:</label>
        <input type="text" name="cep" class="form-control" onkeyup="buscaCep(),mascara( this, mcep )" maxlength="9">
      </div>

      <div class="form-group">
        <label for="endereco">Endereco:</label>
        <input type="text" name="endereco" class="form-control">
      </div>

      <div class="form-group">
        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" class="form-control">
      </div>

      <div class="form-group">
        <label for="complemento">Complemento:</label>
        <input type="text" name="complemento" class="form-control">
      </div>

      <div class="form-group">
        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" class="form-control">
      </div>

      <div class="form-group">
        <label for="estado">Estado:</label>
        <input type="text" name="estado" class="form-control">
      </div>

    </div>

  </div>

  <script type="text/javascript">

  function preencheCampos(json) {
    document.querySelector('input[name=endereco]').value = json.logradouro;
    document.querySelector('input[name=bairro]').value = json.bairro;
    document.querySelector('input[name=complemento]').value = json.complemento;
    document.querySelector('input[name=cidade]').value = json.localidade;
    document.querySelector('input[name=estado]').value = json.uf;
  }

  function buscaCep() {
    let inputCep = document.querySelector('input[name=cep]');
    let cep = inputCep.value.replace('-', '');
    let url = 'http://viacep.com.br/ws/' + cep + '/json';
    let xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4) {
        if (xhr.status = 200)
        console.log(xhr.responseText);
        preencheCampos(JSON.parse(xhr.responseText));
      }
    }
    xhr.send();
  }

  </script>

</body>
</html>
