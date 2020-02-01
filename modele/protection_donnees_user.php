<?php
  require('gestion_arborescence.php');
  require('utilisateur.php');

  function canAccess($id, $accessedNode) {
    $user = initializeUser();
    $profession = $user.getProfession();
    $node = $user.getIDNoeud();

    $professions_full = array("Medecin", "Technicien de laboratoire");
    $professions_part = array("Secretaire", "Infirmier");
    if (in_array($profession, $professions_full) && isParent($node, $accessedNode)) {
        return 0;
    } else if (in_array($profession, $professions_part) && isParent($node, $accessedNode)) {
        return 1;
    }
    return -1;
  }
 ?>
