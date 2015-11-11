<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 08/08/15
 * Time: 18:57
 * To change this template use File | Settings | File Templates.
 */

class OffreanciasController extends Controller{

  /*  function view($nom){
        $this->set(array('phrase'=>"ceci est un message de la vue",'var'=>"pourquoi pas une valeur"));//là on accede à la variable vars du controlleur principal pour envoyer des variables à la vue
        $this->render('index');
    }*/


    public function admin_index(){
        $this->loadModel('Offreancia');

        $d['offreancia']= $this->Offreancia->find(array());
        $this->set($d);
    }

    function admin_view($id){
        $this->loadModel('Offreancia');
          $this->Offreancia->addTable();
        $d['page']= $this->Offreancia->findOne(array(//ici on fait appel à la méthode 'find' et on lui passe un tableau de contidion
            'conditions'=> array('ID_OFFRE_ANCIA'=>$id,'offreancias.ID_UTILISATEUR'=>'utilisateurs.ID_UTILISATEUR')//on recupere une seule page
        ));
        //debug($d['page']);

        if(empty($d['page'])){
            $this->e404('Page introuvable');
        } $this->set($d);
      /*  $d['pages']=$this->Post->find(array(//ici on fait appel à la méthode 'find' et on lui passe un tableau de contidion
            'conditions'=> array('type'=>'post')//on recupere toutes les pages pour construire le menu
        ));
*/
    }

    public function admin_delete($id){

        $this->loadModel('Offreancia');
        $this->Offreancia->changeID();

        $this->Offreancia->delete($id);
        $this->Session->setFlash('le contenu a bien été supprimé');
        $this->redirect('admin/posts/index');

    }

    public function admin_ajax(){

        if(isset($_GET['ID_CLIENT'])){
            $this->loadModel('Client');
            $this->Client->changeID();
            $id_client=$_GET['ID_CLIENT'];
            $d['client']= $this->Client->findOne(array(//ici on fait appel à la méthode 'find' et on lui passe un tableau de contidion
                'conditions'=> array('id_client'=>$id_client)//on recupere une seule page
            ));
            echo json_encode($d['client']);
        }

    }

    /**
     * @param null $id
     * Cette méthode permet d'editer et d'enregistrer, selon qu'on ait le ID ou pas
     */
    public function admin_edit($id=null){
        $this->loadModel('Offreancia');//on charge le controller qu'on veut éditer
        $this->Offreancia->changeID();
        $d['id']='';

        if($this->request->data){
//debug($_FILES['IMAGE']['name']);

            if(!empty($_FILES['IMAGE']['name'])){
                $imageValid= uploadImage('IMAGE');
                if($imageValid['ok'])
                {
                    $this->request->data->IMAGE=$imageValid['chemin'];
                   // debug($this->request->data);
                    // die();

                }
                else
                    echo '<script>alert("'.$imageValid['msg'].'")</script>';
            }

            if($this->Offreancia->validates($this->request->data))
            {

                if($this->Offreancia->save($this->request->data)){

                    $this->Session->setFlash('le contenu a bien été modifié','success');

                }

                //  die($id=$this->Post->id);
//echo("ajouté ou modifié");

            }else{
                $this->Offreancia->save($this->request->data);
                $this->Session->setFlash('Merci de corriger vos informations','danger');

            }



        }
        if($id){
            $id=intval($id);
            $this->request->data=$this->Offreancia->findOne(array('conditions'=>array('ID_OFFRE_ANCIA'=>$id)));
            $d['id']=$id;
        }

        $this->loadModel('Utilisateur');
        $this->Utilisateur->changeID();
        $d['utilisateurs']= $this->Utilisateur->find(array());
        $this->loadModel('Client');
        $this->Client->changeID();
        $d['clients']= $this->Client->find(array());

        $this->set($d);

    }

}

/**
 * Peut importe ce que j'envoie, on recupere toujours la clé au niveau de la vue, pas le tableau, puis on fait $cle->valeur
 */