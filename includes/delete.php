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

          <h2 class="input-container del">Toda exclusão é permanente e irreversivel, prossiga com cautela.</h2>

          <div class="input-container del">
              <input id="id_cidade" type="text" name="id_cidade" required="" />
              <label for="id_cidade">ID da Localidade</label>
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

            <button class="del" type="submit">Excluir</button>
            <input type="hidden" name="action_type" value="delete"/>
          </form>
        </div>
      </div>
    </div>