<?php

session_start();

include 'db.php';

$db = new DB();

$tblName = 'cidadecadastrada';

/*** verifica se há 'action_type' e se o mesmo não está vazio */

if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])){

  /**
   *  captura e determina parametros para criação de nova cidade (caso action_type deja 'add')
   */
    if($_REQUEST['action_type'] == 'add'){
        $userData = array(
            'NomeCidade'        => $_POST['cidade'],
            'PopulacaoCidade'   => $_POST['hab'],
            'ClientelaCidade'   => $_POST['qtdClientes'],
            'CidadeInformacao'  => $_POST['informacoes']
          );

        /** aciona a função insert dentro da classe db passando as infos atribuidas a $userData */
        if(is_string($userData['NomeCidade']) && is_numeric($userData['PopulacaoCidade']) && is_numeric($userData['ClientelaCidade']) && is_string($userData['CidadeInformacao']))
        {
          $insert = $db->insert($tblName,$userData);
        }
        else
        {
          $insert = false;
        } 

        /** retorna mensagem de sucesso caso o $insert retorne true
         * insere a mensagem no statusMsg
         */
        $statusMsg = $insert?'Cidade cadastrada com sucesso!':'Algum erro ocorreu, tente novamente.';
        $_SESSION['statusMsg'] = $statusMsg;
        /** retorna o usuário para o index.php */
        echo "<script type='text/javascript'>window.top.location='http://localhost/TESTE/';</script>"; exit;


    }elseif($_REQUEST['action_type'] == 'edit'){
      /**
   *  captura e determina parametros para criação de nova cidade (caso action_type deja 'edit')
   */
        if(!empty($_POST['id_cidade'])){
            $userData = array(
              'PopulacaoCidade'   => $_POST['hab'],
              'ClientelaCidade'   => $_POST['qtdClientes'],
              'CidadeInformacao'  => $_POST['informacoes']
            );
            $condition = array('CidadeID' => $_POST['id_cidade']);

            if(is_numeric($userData['PopulacaoCidade']) && is_numeric($userData['ClientelaCidade']) && is_string($userData['CidadeInformacao']))
            {
            $update = $db->update($tblName,$userData,$condition);
            }
            else
            {
              $update = false;
            }
            $statusMsg = $update?'Cidade atualizada com sucesso!':'Algum erro ocorreu, tente novamente.';
            $_SESSION['statusMsg'] = $statusMsg;
            echo "<script type='text/javascript'>window.top.location='http://localhost/TESTE/';</script>"; exit;
        }
    }elseif($_REQUEST['action_type'] == 'delete'){
        if(!empty($_POST['id_cidade'])){

            $condition = array('CidadeID' => $_POST['id_cidade']);

            if(is_numeric($_POST['id_cidade']))
            {
              $delete = $db->delete($tblName,$condition);
            }
            else{
              $delete = false;
            }
            $statusMsg = $delete?'Cidade excluida com sucesso!':'Algum erro ocorreu, tente novamente.';
            $_SESSION['statusMsg'] = $statusMsg;
            echo "<script type='text/javascript'>window.top.location='http://localhost/TESTE/';</script>";
            exit;
        }
    }
}