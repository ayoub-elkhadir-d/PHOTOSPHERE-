<?php

// declaration :


interface Name {
   public function function1();
}


// implement multiple  :

interface InterfaceA {
   public function methodA();
}
interface InterfaceB {
   public function methodB();
}
class MyClass implements InterfaceA, InterfaceB {
   public function methodA() {
       echo "Method from InterfaceA\n";
   }
   public function methodB() {
       echo "Method from InterfaceB\n";
   }
}
    
// Interface vs Classe abstraite :

Héritage:

Une classe peut hériter d'une seule classe abstraite (héritage simple). 

Une classe peut implémenter plusieurs interfaces (héritage multiple). 

Modificateurs d'accès:

abstract class : accept multiple acces modifires

interface : accept public et protected




traits :

   declaration :

   <?php
trait TraitName {
  // some code...
}
?>

use in class :

    <?php
    class MyClass {
    use TraitName;
    }
    ?>


    usage :
    pour ehiritage multiple




?>