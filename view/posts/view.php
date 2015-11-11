<?php
/**
 * Created by JetBrains PhpStorm.
 * User: AlassaneOusmane
 * Date: 08/08/15
 * Time: 19:19
 * To change this template use File | Settings | File Templates.
 */

$title_for_layout=$page->TITLE;
echo "<h1>affichage depuis la vu pages</h1>";



?>
<br>titre du poste <H2><?php echo $page->TITLE;?></H2>
<br>Contenu du poste <H2><?php echo $page->CONTENT;?></H2>
<br>Date de création <H2><?php echo $page->CREATED;?></H2>