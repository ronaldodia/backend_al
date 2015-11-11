<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 08/08/15
 * Time: 18:57
 * To change this template use File | Settings | File Templates.
 */

class PostsController extends Controller{

  /*  function view($nom){
        $this->set(array('phrase'=>"ceci est un message de la vue",'var'=>"pourquoi pas une valeur"));//là on accede à la variable vars du controlleur principal pour envoyer des variables à la vue
        $this->render('index');
    }*/
    function view($id){
        $this->loadModel('Post');

        $d['page']= $this->Post->findOne(array(//ici on fait appel à la méthode 'find' et on lui passe un tableau de contidion
            'conditions'=> array('id'=>$id)//on recupere une seule page
        ));
        if(empty($d['page'])){
            $this->e404('Page introuvable');
        } $this->set($d);
      /*  $d['pages']=$this->Post->find(array(//ici on fait appel à la méthode 'find' et on lui passe un tableau de contidion
            'conditions'=> array('type'=>'post')//on recupere toutes les pages pour construire le menu
        ));
*/
    }

   /* public function getMenu(){
        $this->loadModel('Utilisateur');
        $this->Post->addTable();
        return $this->Post->find(array());
    }
*/


    /**
     * ADMINISTRATION
     */
public function admin_index(){

    $this->loadModel('Offrelf');

    //$this->Utilisateur->changeID();
    $this->Offrelf->addTable();
    $this->loadModel('Offreancia');
    $this->Offreancia->addTable();
    $d['posteslf']= $this->Offrelf->find(array('conditions'=>'utilisateurs.id_utilisateur=offrelfs.id_utilisateur and clients.id_client=offrelfs.id_client'));
    $d['postesancia']= $this->Offreancia->find(array('conditions'=>'utilisateurs.id_utilisateur=offreancias.id_utilisateur and clients.id_client=offreancias.id_client'));
//debug($d);
    //die();
    $this->set($d);
}
    public function admin_delete($id){

    $this->loadModel('Post');
$this->Post->changeID();



   $this->Post->delete($id);
        $this->Session->setFlash('le contenu a bien été supprimé');
   $this->redirect('admin/pages/index');
}

    /**
     * @param null $id
     * Cette méthode permet d'editer et d'enregistrer, selon qu'on ait le ID ou pas
     */
    public function admin_edit(){
        $this->loadModel('Post');//on charge le model qu'on veut éditer
        //$this->Post->changeID();
       // $d['id']='';
        if($this->request->data){


           if($this->Post->validates($this->request->data))
           {


               $app = new iSDK;
               if ($app->cfgCon("connectionName")) {






                   if(isset($this->request->data->PREVENANCE)&&$this->request->data->PREVENANCE==1)
                   {$tags=array();
                       $tags=explode(',',$this->request->data->TAGS);

                       $newTagData = array('GroupName' => $tags[0],
                           'GroupCategoryId' => 51
                       );for($i=1;$i<count($tags);$i++){
                       $tn=array('GroupName' => $tags[$i],
                           'GroupCategoryId' => 51
                       );
                      $app->dsAdd('ContactGroup',$tn);
                   }

                       $tagId = $app->dsAdd('ContactGroup',$newTagData);
                       $this->request->data->TAGS=$tagId;




                       $this->loadModel('Offreancia');//on charge le controller qu'on veut éditer
                       $this->Offreancia->changeID();
                       $this->redirect('admin/offreancias/edit/'.$this->Offreancia->save($this->request->data));
                   }
                   elseif(isset($this->request->data->PREVENANCE)&&$this->request->data->PREVENANCE==2)
                   {$tags=explode(',',$this->request->data->TAGS);


                       $newTagData = array('GroupName' => $tags[0],
                           'GroupCategoryId' => 49
                       );
                       $tagId = $app->dsAdd('ContactGroup',$newTagData);
                       $this->request->data->TAGS=$tagId;

                       for($i=1;$i<count($tags);$i++){
                           $tn = array('GroupName' => $tags[$i],
                               'GroupCategoryId' => 49
                           );
                           $tagId = $app->dsAdd('ContactGroup',$tn);
                       }



                       $this->loadModel('Offrelf');//on charge le controller qu'on veut éditer
                       $this->Offrelf->changeID();

                       $this->redirect('admin/offrelfs/edit/'.$this->Offrelf->save($this->request->data));
                   }
               }else{ die("vous n'êtes pas connecté à infusionsoft");}


               //  die($id=$this->Post->id);
//echo("ajouté ou modifié");
                $this->Session->setFlash('le contenu a bien été modifié');
           }else{
               $this->Session->setFlash('Merci de corriger vos informations<ul><li>'.implode('<li>',$this->Post->errors).'</ul>','danger');

           }



        }
        /*if($id){
            $id=intval($id);
            $this->request->data=$this->Post->findOne(array('conditions'=>array('id'=>$id)));
            $d['id']=$id;
        }$this->set($d);*/
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

/**
 * $seminartag = $_SESSION['seminarsku'];
$returnFields = array('Id');
$query = array('GroupName' => $seminartag);
$tagExists = $app->dsQuery("ContactGroup",1,0,$query,$returnFields);
if($tagExists){
//check if participant is already in group
$returnFields = array('GroupId');
$query = array('ContactId' => $_SESSION['participantid']);
$participanttags = $app->dsQuery("ContactGroupAssign",1000,0,$query,$returnFields);
if(in_array($tagExists[0]['Id'],$participanttags[0])){
//participant is already tagged
echo "You're already in the group";
}
else{
//add participant to group
$addtogroup = $app->grpAssign($_SESSION['participantid'], $tagExists[0]['Id']);
}
}
else{
//create new tag and add to ContactGroup database table
$newTagData = array('GroupName' => $seminartag,
'GroupCategoryId' => '16'
);
$tagId = $app->dsAdd('ContactGroup',$newTagData);
$tagContact = $app->grpAssign($_SESSION['participantid'], $tagId);
}  Post LF 51, post ancia 49
 *
 * #########################form#################
 *     <div class="row">
<div class="col-xs-6 form-group">
<label>Label1</label>
<input class="form-control" type="text"/>
</div>
<div class="col-xs-6 form-group">
<label>Label2</label>
<input class="form-control" type="text"/>
</div>
<div class="col-xs-6">
<div class="row">
<label class="col-xs-12">Label3</label>
</div>
<div class="row">
<div class="col-xs-12 col-sm-6">
<input class="form-control" type="text"/>
</div>
<div class="col-xs-12 col-sm-6">
<input class="form-control" type="text"/>
</div>
</div>
</div>
<div class="col-xs-6 form-group">
<label>Label4</label>
<input class="form-control" type="text"/>
</div>
</div>


 */