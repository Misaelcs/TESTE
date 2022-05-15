<div class="main-container cadastro">
      <!-- Titulo --> 
      <div class="title-cadastro">
        <h1>Cadastre, atualize <br />ou exclua localidades</h1>
        <p>Por favor preencha os campos ao lado</p>
      </div>
      <div class="form-cadastro">

      <!-- formulario -->
        <div class="card form">
        <form method="post" action="../app/entity/action.php">

            <div class="input-container att">
              <input id="id_cidade" type="text" name="id_cidade" required="" />
              <label for="id_cidade">ID da Localidade</label>
            </div>


            <div class="input-container att">
              <input id="hab" type="text" name="hab" required="" />
              <label for="hab">Habitantes</label>
            </div>
            <div class="input-container att">
              <input
                id="qtdClientes"
                type="text"
                name="qtdClientes"
                required=""
              />
              <label for="qtdClientes">Clientes</label>
            </div>
            <div class="input-container att">
              <textarea
                name="informacoes"
                type="text"
                id="informacoes"
                rows="10"
                required=""
              ></textarea>
              <label for="informacoes"
                >Informações sobre o progresso da operação na localidade.</label
              >
            </div>
            <div class="input-container att" id="disabled">
              <input
                id="auth_id"
                type="text"
                name="auth_id"
                required=""
                maxlength="5"
                minlength="4"
                disabled
              />
              <label for="">ID autenticador</label>
            </div>

            <button class="att" type="submit">Salvar</button>
            <input type="hidden" name="action_type" value="edit"/>
          </form>
        </div>
      </div>
    </div>