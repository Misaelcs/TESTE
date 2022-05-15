
    <div class="main-container">
      <div class="content">
        
      <?php
            include __DIR__.'\..\app\entity\db.php';
            $db = new DB();

            $cidades = $db->getRows('cidadecadastrada',array('order_by'=>'CidadeId DESC'));


            if(!empty($cidades)){ $count = 0; 
            foreach($cidades as $cidade)
            { 
              $count++;

              echo "<article class='card cidade'><h3>".$cidade['NomeCidade']."</h3><p class='info'>".$cidade['CidadeInformacao']."</p><p class='hab'>População: <strong>".$cidade['PopulacaoCidade']."</strong></p><p class='clientes'>Clientela: <strong>".$cidade['ClientelaCidade']."</strong></p><button>Mais informações</button></article>";
            }
            };
           ?>


      </div>

      <aside>
        <ul>
          <li><a href="#">Alagoas (AL)</a></li>
          <li><a href="#">Acre (AC)</a></li>
          <li><a href="#">Amapá (AP)</a></li>
          <li><a href="#">Amazonas (AM)</a></li>
          <li><a href="#">Bahia (BA)</a></li>
          <li><a href="#">Ceará (CE)</a></li>
          <li><a href="#">Distrito Federal (DF)</a></li>
          <li><a href="#">Espírito Santo (ES)</a></li>
          <li><a href="#">Goiás (GO)</a></li>
          <li><a href="#">Maranhão (MA)</a></li>
          <li><a href="#">Mato Grosso (MT)</a></li>
          <li><a href="#">Mato Grosso do Sul (MS)</a></li>
          <li><a href="#">Minas Gerais (MG)</a></li>
          <li><a href="#">Pará (PA)</a></li>
          <li><a href="#">Paraíba (PB)</a></li>
          <li><a href="#">Paraná (PR)</a></li>
          <li><a href="#">Pernambuco (PE)</a></li>
          <li><a href="#">Piauí (PI)</a></li>
          <li><a href="#">Rio de Janeiro (RJ)</a></li>
          <li><a href="#">Rio Grande do Norte (RN)</a></li>
          <li><a href="#">Rio Grande do Sul (RS)</a></li>
          <li><a href="#">Rondônia (RO)</a></li>
          <li><a href="#">Roraima (RR)</a></li>
          <li><a href="#">Santa Catarina (SC)</a></li>
          <li><a href="#">São Paulo (SP)</a></li>
          <li><a href="#">Sergipe (SE)</a></li>
          <li><a href="#">Tocantins (TO)</a></li>
        </ul>
      </aside>
    </div>