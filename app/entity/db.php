<?php
/*
 * classe de Banco de Dados (db)
 */
class DB{

    private $dbHost     = "localhost";
    private $dbUser     = "misael";
    private $dbPassword = "12345";
    private $dbName     = "ban_co";

    public function __construct(){
        if(!isset($this->db)){
            // conecta ao banco de dados usando os parametro das variaveis acima
            try{
                $conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUser, $this->dbPassword);
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $conn;
            }catch(PDOException $e){
                die("Falha ao conectar ao Banco de Dados: " . $e->getMessage());
            }
        }
    }

    /*
     * busca com a query SELECT no tabela indicada, as rows e caso encontre a condição "order by" na array $conditions adiciona o comando "ORDER BY" na query
     */
    public function getRows($table,$conditions = array()){
        $sql = 'SELECT ';
        $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
        $sql .= ' FROM '.$table;
        if(array_key_exists("where",$conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions['where'] as $key => $value){
                $pre = ($i > 0)?' AND ':''; // ternário
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }

        if(array_key_exists("order_by",$conditions)){
            $sql .= ' ORDER BY '.$conditions['order_by'];
        }

                    /* if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
                        $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];
                    }elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
                        $sql .= ' LIMIT '.$conditions['limit'];
                    }
                    */
        $query = $this->db->prepare($sql);
        $query->execute();

                            /*  if(array_key_exists("return_type",$conditions) && $conditions   ['return_type'] != 'all'){
                                switch($conditions['return_type']){
                                    case 'count':
                                        $data = $query->rowCount();
                                        break;
                                    case 'single':
                                        $data = $query->fetch(PDO::FETCH_ASSOC);
                                        break;
                                    default:
                                        $data = '';
                                }
                            }else{
                                if($query->rowCount() > 0){
                                    $data = $query->fetchAll();
                                }} */
        if($query->rowCount() > 0)
        {
            $data = $query->fetchAll();
        }            
        return !empty($data)?$data:false;
    }

    /*
     * Cria e popula nova cidade
     */

    public function insert($table,$data){
        if(!empty($data) && is_array($data)){
            $columns = '';
            $values  = '';
            $i = 0;

            /* define a data de criação e modificação... não implementado ainda
            *    
            *
            if(!array_key_exists('created',$data)){
                $data['created'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists('modified',$data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            */


            // monnta a string que será a query SQL com os parametros passados pelo if de action_type=add na action.php... onde $userData aqui é $data

            $columnString = implode(',', array_keys($data));
            $valueString = ":".implode(',:', array_keys($data));
            $sql = "INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";

            // prepara a query e armazena em $query
            $query = $this->db->prepare($sql);


            foreach($data as $key=>$val){
                 $query->bindValue(':'.$key, $val);
            }

            $insert = $query->execute();
            return $insert?$this->db->lastInsertId():false;
        }else{
            return false;
        }
    }

    /*
     * Atualiza cidade já existente
     */

    public function update($table,$data,$conditions){
        if(!empty($data) && is_array($data)){
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
            
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':''; //ternario
                $colvalSet .= $pre.$key."='".$val."'";
                $i++;
            }
            if(!empty($conditions)&& is_array($conditions)){
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value){
                    $pre = ($i > 0)?' AND ':''; //ternário
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
            }
            $sql = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
            $query = $this->db->prepare($sql);
            $update = $query->execute();
            return $update?$query->rowCount():false;
        }else{
            return false;
        }
    }

    /*
     * Exclui cidade
     */
    public function delete($table,$conditions){
        $whereSql = '';
        if(!empty($conditions)&& is_array($conditions)){
            $whereSql .= ' WHERE ';
            $i = 0;
                foreach($conditions as $key => $value){
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
        }
        $sql = "DELETE FROM ".$table.$whereSql;
        $delete = $this->db->exec($sql);
        return $delete?$delete:false;
    }
}

/* DELETE FROM tabela WHERE key = "value"  */