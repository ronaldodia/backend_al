<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 09/08/15
 * Time: 19:00
 * To change this template use File | Settings | File Templates.
 */

class Model {
    public $table=false;
    static $connections=array();
    public $conf='default';
    public $db;
    public $primaryKey='';
    public $id='';
    public $errors=array();
    public $Form;

    public function __construct(){
        if($this->table===false)
            $this->table=strtolower(get_class($this)).'s';


        $conf=Conf::$databases[$this->conf];
        if(isset(Model::$connections[$this->conf]))
        {$this->db=Model::$connections[$this->conf];
            return true;
        }
        try{
            $pdo=new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'].';',$conf['login'],$conf['password']
                , array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
           $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT); //ligne a rajouter dans les autres modeles pour la gestion des erreurs
            Model::$connections[$this->db]=$pdo;
            $this->db=$pdo;// stocker l'objet pdo dans une instance pdo
        } catch(PDOException $e){
            if(Conf::$debug>1)
                die($e->getMessage());
            else
                die("Impossible de se connecter à la base de données");
        }

        // die("putin je suis connecté");
    }
    public function find($req){
        $sql='SELECT * FROM  '.$this->table;


        if(isset($req['conditions']))
        {

            $sql.=' WHERE ';
            if(!is_array($req['conditions'])){//on test si la requete n'est pas un tableau, pour des requetes spéciales
                $sql.=$req['conditions'];
            }
            else{
                $cond=array();
                foreach($req['conditions']as $k=>$v){
                    if(!is_numeric($v)){
                        $v=htmlspecialchars($v);

                    }$cond[]="$k=$v";

                } /*print_r($cond[1]);
                die();*/

                $sql.=implode(' AND ',$cond);
            }

        }
//die($sql);
        $pre=$this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);
        //die($this->table);

    }
    public function findOne($req){
        return current($this->find($req)) ;

    }
    public function delete($id){

        $sql="DELETE FROM {$this->table} WHERE {$this->primaryKey} ={$id}";

        $this->db->query($sql);

        header("Location:admin/posts ");


    }
    public function save($data){
$key=$this->primaryKey;
        $fields=[];//un tableau qui va contenir des index pour la requete pdo
        $d=[];//ce tableau contiendra les valeurs de chaque index

        foreach($data as $k=>$v){
            $fields[]="$k=:$k";
            $d[":$k"]=$v;
        }
if(isset($data->$key )&&!empty($data->$key)){
   $sql='UPDATE '.$this->table.' SET '.implode(',',$fields).' WHERE '.$key.'=:'.$key;
//debug($d);
    $this->id=$data->$key;//$key designe l'index de la clé dans les données envoyé, donc on redefinit l'id dans l'url pour éviter une erreur lors de l'update
    $action='update';
    }else{
    if(isset($data->$key ))unset($data->$key);


    $sql='INSERT INTO '.$this->table.' SET '.implode(',',$fields);

$action='insert';}
        try{

            /*debug($sql);
            debug($data);
            die();*/
            $pre=$this->db->prepare($sql);
            $pre->execute($d);

          if($action=='insert')
          {return $this->id=$this->db->lastInsertId();}


        }catch (PDOException $e){
            if(Conf::$debug>1){
                die("erreur ".$e);

            }else{
                die("erreur lors de l'édition ");
            }

        }

    }

    public function validates($data){
        //debug($data);
        //debug($this->validate);
        //die();

        $r=array();
        foreach($this->validate as $k=>$v){

            if(!isset($data->$k)){
                //$r[$k]=$v['message'];//si on n'a pas de données, envoyer un msg d'erreur
            }else{
                if($v['rule']=='noEmpty'){
                    if($data->$k==""||empty($data))
                    {
                        $r[$k]=$v['message'];

                    }



                }
elseif($v['rules']='slug'){
    if(!preg_match('/^'.$v['rule'].'$/',$data->$k)){
        $r[$k]=$v['message'];
        //die("ça match pas ton slug");

    }
}


            }}$this->errors=$r;
        if(isset($this->Form)){
            $this->Form->errors=$r;

        }
        if(empty($r)){

            return true;
        }
        else{
            return false;}
    }
}