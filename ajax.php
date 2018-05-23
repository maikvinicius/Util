
<input type="text" name="teste" id="teste">

<script type="text/javascript" teste>

  function salvar(id_foto){

    var teste = $("#teste").val();

    var request = $.ajax({//post
      url: "index.php?route=salvar",
      type: "POST",
      data: {"teste": teste},
      dataType: "json"
    });

    request.done(function(data) {//verifica o resultado
      console.log(data);
      alert('Atualizada com sucesso!');
    });

    request.fail(function(jqXHR, textStatus) {//caso haja erro
      alert( "Falha: " + textStatus );
    });

  }
  </script>

  <?php

  public function salvar(){

		$data = array();

		$data['teste'] = $this->request->post['teste'];

		$json = array(
			'sucesso' => 'ok'
		);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));

	}

  ?>
