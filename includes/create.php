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

            <div class="input-container">
              <input id="cidade" type="text" name="cidade" required="" />
              <label for="cidade">Localidade</label>
            </div>

            <div class="input-container" id="disabled">
              <input
                id="uf"
                type="text"
                name="uf"
                required=""
                maxlength="2"
                minlength="1"
                disabled
                />
              <label for="">UF</label>
            </div>

            <div class="input-container">
              <input id="hab" type="text" name="hab" required="" />
              <label for="">Habitantes</label>
            </div>
            <div class="input-container">
              <input
                id="qtdClientes"
                type="text"
                name="qtdClientes"
                required=""
              />
              <label for="">Clientes</label>
            </div>
            <div class="input-container">
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
            <div class="input-container" id="disabled">
              <input
                id="auth_id"
                type="text"
                name="auth_id"
                required=""
                maxlength="5"
                minlength="4"
                disabled
              />
              <label for="auth_id">ID autenticador</label>
            </div>

            <button type="submit">Salvar</button>
            <input type="hidden" name="action_type" value="add"/>
          </form>
        </div>
      </div>
    </div>