<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 27/08/15
 * Time: 12:33
 * To change this template use File | Settings | File Templates.
 */

class Form{
    public $controller;
    public $errors;
    public function __construct($controller){
        $this->controller=$controller;


}

public function input($name,$label,$options=array()){
    $error=false;
    $classError='';
    if(isset($this->errors[$name]))
    {
        $error=$this->errors[$name];
        $classError=' alert-danger';
    }


   if(!isset($this->controller->request->data->$name))
    {
        $value='';
    }else{
        $value=$this->controller->request->data->$name;
    }
   $field= '<div class=\'form-group\'> <div class="col-md-8"><div class="clearFix '.$classError.'">
   <label class="control-label col-md-4 col-md-offset-2" for="input"'.$name.'">'.$label.'</label><p><div class="col-md-6">
        <div class="form-group">
            <div class="col-md-11"><div class="input">';
    $attr=' ';
$users=array();
    foreach($options as $k=>$v){
        if($k!='type'&&$k!='data'&&!is_numeric($k))
        $attr.="$k=\"$v\"";
        if($k=='data')
        {foreach($v as $w=>$z)
        {
            $users[$w]=$z;}
        }
    }



    if(!isset($options['type'])){
        $field.='<input type="text" id="input'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
    }
    elseif($options['type']=="textarea"){
        $field.='<textarea id="input'.$name.'" name="'.$name.'"'.$attr.'>'.$value.'</textarea/>';

    } elseif($options['type']=="file"){
        $field.='<input id="input'.$name.'" type="file" name="'.$name.'"'.$attr.'>';
        if($value)$field.='<img src="'.Router::url("webroot/uploads/".$value).'"width=120 height=100>';

    }elseif($options['type']=="text"){
        $field.='<div '.$attr.'>'.$name.'</div>';
    }
  elseif($options['type']=="radio"){
      $selected='';
      foreach($options as $k=>$v){
      if($k!='type')
      {
          if($k==$value)
              $selected='checked';
          $field.='<br> <input type="radio" id="input'.$name.'" name="'.$name.'" value="'.$k.'"'.$attr.''.$selected.'> '.$v;
          $selected='';

      }

      }



    }
    elseif($options['type']=="password"){
        $field.='<input type="password" id="input'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';

    }
    elseif($options['type']=="checkbox"){
        $field.='<input type="hidden" value="0" name="'.$name.'"><input type="checkbox" value="1" name="'.$name.'"'.(empty($value)?'':'checked').'>';

    }
    elseif($options['type']=="checkbox"){



        $field.='<input type="hidden" value="0" name="'.$name.'"><input type="checkbox" value="1" name="'.$name.'"'.(empty($value)?'':'checked').'>';

    }
    elseif($options['type']=='users_list'){
        $selected='';
        $field.='<select name="'.$name.'" >';
        foreach($users as $k=>$v){
            if($v->ID_UTILISATEUR==$value)
                $selected='selected';
            $field.='<option value="'.$v->ID_UTILISATEUR.'" '.$selected.'>'.$v->NOM_UTILISATEUR.'</option>';
            $selected='';

        }$field.='</select>';

    }   elseif($options['type']=='clients_list'){
        $selected='';
        $field.='<select name="'.$name.'" onchange="showUser(this.value)">';
        foreach($users as $k=>$v){
            if($v->ID_CLIENT==$value)
                $selected='selected';
            $field.='<option value="'.$v->ID_CLIENT.'" '.$selected.'>'.$v->NOM_CLIENT.'</option>';
            $selected='';

        }$field.='</select>';

    }
    elseif($options['type']=="select"){
        $select_admin='';
        $select_utilisateur='';
        if($value==1)
        {

            $select_admin='selected';
        }
        elseif($value==2)
        {

            $select_utilisateur='selected';

        }


       $field.='<select name="'.$name.'" ><option value=1 '.$select_admin.'>ADMIN</option><option value=2 '.$select_utilisateur.'>UTILISATEUR</option></select>';

    }
    elseif($options['type']=="hidden"){
        $field.='<input type="hidden" name="'.$name.'"value="'.$value.'">';

    }
    if($error){
        $field.='<span class="help-inline"> '.$error.'</span>';
    }

 return $field.='</div></div></div></div></div></div></div>';
}

}
?>