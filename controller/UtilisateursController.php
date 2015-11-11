<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 08/08/15
 * Time: 18:57
 * To change this template use File | Settings | File Templates.
 */

class UtilisateursController extends Controller{

  /*  function view($nom){
        $this->set(array('phrase'=>"ceci est un message de la vue",'var'=>"pourquoi pas une valeur"));//là on accede à la variable vars du controlleur principal pour envoyer des variables à la vue
        $this->render('index');
    }*/




    function admin_view($id){



        $this->loadModel('Utilisateur');

        $d['utilisateurs']= $this->Utilisateur->findOne(array(//ici on fait appel à la méthode 'find' et on lui passe un tableau de contidion
            'conditions'=> array('id_utilisateur'=>$id)//on recupere une seule page
        ));
        if(empty($d['utilisateurs'])){
            $this->e404('Page introuvable');
        } $this->set($d);
      /*  $d['pages']=$this->Post->find(array(//ici on fait appel à la méthode 'find' et on lui passe un tableau de contidion
            'conditions'=> array('type'=>'post')//on recupere toutes les pages pour construire le menu
        ));
*/
    }



    public function admin_index(){

        $this->loadModel('Utilisateur');
        $this->Utilisateur->changeID();
        $d['utilisateurs']= $this->Utilisateur->find(array());
        $this->set($d);
    }
    public function admin_delete($id){

        $this->loadModel('Utilisateur');
        $this->Utilisateur->changeID();

        $this->Utilisateur->delete($id);
        $this->Session->setFlash('le contenu a bien été supprimé');
        $this->redirect('admin/utilisateurs/index');

    }

    /**
     * @param null $id
     * Cette méthode permet d'editer et d'enregistrer, selon qu'on ait le ID ou pas
     */
    public function admin_edit($id=null){
        $this->loadModel('Utilisateur');//on charge le controller qu'on veut éditer
        $this->Utilisateur->changeID();
        $d['id']='';

        if($this->request->data){

            if($this->Utilisateur->validates($this->request->data))
            {

                if($this->Utilisateur->save($this->request->data)){

                    $this->Session->setFlash('le contenu a bien été modifié','success');

                }

             //  die($id=$this->Post->id);
//echo("ajouté ou modifié");

            }else{
               $this->Session->setFlash('Merci de corriger vos informations','danger');

           }



        }
            if($id){
                $id=intval($id);
                $this->request->data=$this->Utilisateur->findOne(array('conditions'=>array('ID_UTILISATEUR'=>$id)));
                $d['id']=$id;
            }



        $this->set($d);

    }


}

/**
 * Peut importe ce que j'envoie, on recupere toujours la clé au niveau de la vue, pas le tableau, puis on fait $cle->valeur
 */