<?php include('connexion.php') ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="utf-8">
    <title>Revision SQL</title>
    </head>
</html>
<body>
    
    <h1>Sélection de données</h1>
    
    <h4>Numéro 1: Affichage de la table étudiants</h4>
    
    <?php
    
    $reponse = getResult('SELECT * FROM etudiants');
    
    foreach($reponse as $data){
        ?>
    <p>Nom : <?php echo ($data->nom_etu);?></p>
    <p>Date de naissance : <?php echo ($data->date_naiss);?></p>
    <p>Sexe: <?php echo ($data->sexe);?></p>
        <?php
    }
  
     ?>
    
    <h4>Numéro 2: Affichage de seulement Nom, numéro et date de naissance des étudiants.</h4>
    
    <?php
    
    $reponse = getResult('SELECT num_etu, nom_etu, date_naiss FROM etudiants');
    
    foreach ($reponse as $data) {
        ?>
    <p>Numero : <?php echo ($data->num_etu);?></p>
    <p>Nom : <?php echo ($data->nom_etu);?></p>
    <p>Date de naissance : <?php echo ($data->date_naiss);?></p>
    <?php
    }
  ?>
    
    <h4>Numéro 3: Liste des étudiantes</h4>
    
    <?php 
    $reponse = getResult('SELECT nom_etu FROM etudiants WHERE sexe = "F"');
    
        foreach ($reponse as $data) {
        ?>
    <p>Nom : <?php echo ($data->nom_etu);?></p>
    <?php
    }
  ?>
    
    <h4>Numéro 4 : Liste des enseignants par ordre alphabétique :</h4>
    
    <?php 
    
    $reponse = getResult('SELECT nom_ens FROM enseignants ORDER BY nom_ens ASC ');
    
          foreach ($reponse as $data) {
        ?>
    <p>Nom : <?php echo ($data->nom_ens);?></p>
    <?php
    }
  ?>
    
    <h4>Numéro 5: Liste des enseignants par grade et par ordre alphabétique décroissant des noms.</h4>
    
       <?php 
    
    $reponse = getResult('SELECT nom_ens, grade FROM enseignants ORDER BY nom_ens DESC ');
    
          foreach ($reponse as $data) {
        ?>
    <p>Grade : <?php echo ($data->grade);?></p>
    <p>Nom : <?php echo ($data->nom_ens);?></p>
    <?php
    }
  ?>
    
    <h4>Numéro 6: Nom, grade et ancienneté des enseignants qui ont strictement plus de 2 ans d'ancienneté</h4>
    
    <?php
    
     $reponse = getResult('SELECT nom_ens, grade, anciennete  FROM enseignants WHERE anciennete IN (2)');
    
          foreach ($reponse as $data) {
        ?>
    <p>Grade : <?php echo ($data->grade);?></p>
    <p>Nom : <?php echo ($data->nom_ens);?></p>
    <?php
    }
  ?>
    
    <h4>Numéro 7: Nom, grade et ancienneté des maîtres de conférences(MCF) qui ont 3 ans d'ancienneté ou plus.</h4>
    
    <?php
    
     $reponse = getResult('SELECT nom_ens, grade, anciennete  FROM enseignants WHERE grade = "MCF" AND anciennete >= 3');
    
          foreach ($reponse as $data) {
        ?>
    <p>Grade : <?php echo ($data->grade);?></p>
    <p>Nom : <?php echo ($data->nom_ens);?></p>
    <?php
    }
    ?>
    
    <h4>Numéro 8: Nom et date de naissance des étudiants masculins nés après 1990:</h4>
    
       <?php
    
     $reponse = getResult('SELECT nom_etu, date_naiss FROM etudiants WHERE sexe = "M" AND date_naiss > 1990');
    
          foreach ($reponse as $data) {
        ?>
    <p>Grade : <?php echo ($data->nom_etu);?></p>
    <p>Date de naissance : <?php echo ($data->date_naiss);?></p>
    <?php
    }
    ?>
    
    <h4>Numéro 9: Lignes de la table notes correspondant à une note inconnue:</h4>
    
         <?php
    
     $reponse = getResult('SELECT * FROM notes WHERE note IS NULL');
    
          foreach ($reponse as $data) {
        ?>
    <p>Note NULL : 
        Numéro étudiants:
        <?php echo ($data->_num_etu);?>
        Numéro matière:
        <?php echo ($data->_num_mat);?>
           </p>
   
    <?php
    }
    ?>
    
      <h4>Numéro 10: Nom des enseignants professeurs(PR) ou associés(ASS), en utilisant l'opérateur IN :</h4>
      
      <?php
         $reponse = getResult('SELECT nom_ens, grade FROM enseignants WHERE grade IN ("PR","ASS")');
    
          foreach ($reponse as $data) {
        ?>
    <p>Nom des enseignants:
        <?php echo ($data->nom_ens);?>
        Grade :
        <?php echo ($data->grade);?>
           </p>
   
    <?php
    }
    ?>
           
           <h4>Numéro 11: Nom des enseignants dont le nom ou le prénom contiennent un J:</h4>
           
           <?php
         $reponse = getResult('SELECT nom_ens FROM enseignants WHERE nom_ens LIKE "%J%"');
    
          foreach ($reponse as $data) {
        ?>
    <p>Nom des enseignants contenant la lettre J:
        <?php echo ($data->nom_ens);?>
           </p>
   
    <?php
    }
    ?>
           
           <h4>Numéro 12: Nom et date de naissance des étudiants nés en 1990:</h4>
           
           <?php
         $reponse = getResult('SELECT nom_etu, date_naiss FROM etudiants WHERE YEAR(date_naiss) = 1990');
    
          foreach ($reponse as $data) {
        ?>
    <p>Nom de l'étudiant:
        <?php echo ($data->nom_etu);?>
        Date de naissance :
        <?php echo ($data->date_naiss);?>
           </p>
   
    <?php
    }
    ?>
           
           <h4>Numéro 13: Nom et âge(en années)des étudiants de 23 ans ou plus:</h4>
           
               <?php
         $reponse = getResult('SELECT nom_etu, YEAR(date_naiss) AS annee FROM etudiants WHERE (YEAR(CURRENT_DATE) - YEAR(date_naiss)) >= 23');
    
        
          foreach ($reponse as $data) {
              $age = date("Y")-($data->annee);
        ?>
    <p>Nom de l'étudiant de plus de 23 ans:
        <?php echo ($data->nom_etu);?>
        Age: 
        <?php echo ($age);?>
           </p>
   
    <?php
    }
    ?>
           
           <h1> JOINTURES</h1>
           
           <h4>Numéro 1: Notes obtenues par l'étudiant Dupont, Charles</h4>
           
           <?php
           
           $reponse = getResult('SELECT * from notes INNER JOIN etudiants ON _num_etu = num_etu WHERE num_etu = 1 ');
         
                   foreach ($reponse as $data){
               ?>
           <p>
               Nom de l'étudiant:
               <?php echo ($data->nom_etu);?>
               Note:
               <?php echo ($data->note);?>
           </p>
           <?php
                   }
      ?>
           
           <h4>Numéro 2: Note obtenue par l'étudiant Dupont, Charles en G.P.A.O</h4>
           
           <?php
           
           $reponse = getResult('SELECT * from notes INNER JOIN etudiants ON _num_etu = num_etu '
                   . 'INNER JOIN matieres ON _num_mat = num_mat WHERE num_etu = 1 AND num_mat = 3');
           
           foreach ($reponse as $data){
               ?>
           <p>
               Nom de l'étudiant:
               <?php echo ($data->nom_etu);?>
               Note en G.P.A.O:
               <?php echo ($data->note);?>
           </p>
           <?php
           }
           ?>
           
           <h4>Numéro 3: Nom et date de naissance des étudiants plus jeunes(en années) que l'étudiant Dupont, Charles</h4>
           
           <?php 
           
           $reponse = getResult('SELECT nom_etu, date_naiss from etudiants WHERE (YEAR(date_naiss) >'
                   . '(SELECT YEAR(date_naiss) FROM etudiants WHERE num_etu = 1))');
           
           foreach ($reponse as $data){
               ?>
           <p>
               Nom des étudiants plus jeunes:<?php echo ($data->nom_etu);?>
           </p>
           <?php
           }
           ?>
           
           <h4>Numéro 4: Nom des étudiants ayant eu la moyenne dans une des matières enseignées par Simon, Etienne.</h4>
           
           <?php 
           
           $reponse = getResult('SELECT nom_etu, note FROM etudiants
                   INNER JOIN
                   notes ON num_etu = _num_etu 
                   INNER JOIN
                   matieres ON _num_mat = num_mat
                   INNER JOIN
                   enseignants ON _num_ens = num_ens
                   WHERE
                   num_ens = 15 AND note >= 10');
           
           foreach ($reponse as $data){
               ?>
           <p>
               Nom des étudiants ayant la moyenne ou plus: <?php echo ($data->nom_etu);?>
               Note : <?php echo ($data->note);?>
           </p>
           <?php
           }
             ?>
           
           <h4>Numéro 5: Nom des étudiants qui ont eu une note dans "Logique" inférieure à celle de "Statistiques".</h4>
           
           <?php
               $reponse = getResult('SELECT nom_etu, n1._num_etu FROM notes n1, notes n2 INNER JOIN etudiants ON _num_etu = num_etu WHERE
                       n1._num_etu=n2._num_etu AND n1._num_mat=4 AND n2._num_mat=5 AND n1.note<n2.note');
           
           foreach ($reponse as $data){
               ?>
           <p>
               Numero des étudiants : <?php echo ($data->_num_etu);?>
               Nom des étudiants: <?php echo ($data->nom_etu);?>
               
           </p>
           <?php
           }
             ?>
           
           <h4>Numéro 6: Nom des étudiants ayant eu une plus mauvaise note en Programmation qu'en Bases de données.</h4>
           
            <?php
               $reponse = getResult('SELECT nom_etu, n1._num_etu FROM notes n1, notes n2 INNER JOIN etudiants ON _num_etu = num_etu WHERE
                       n1._num_etu=n2._num_etu AND n1._num_mat=1 AND n2._num_mat=2 AND n1.note<n2.note');
           
           foreach ($reponse as $data){
               ?>
           <p>
               Numero des étudiants : <?php echo ($data->_num_etu);?>
               Nom des étudiants: <?php echo ($data->nom_etu);?>
               
           </p>
           <?php
           }
             ?>
        
           <h4>Numéro 7: Nom et numéro des étudiants n'ayant eu aucune note:</h4>
           
           <?php 
           
           $reponse = getResult('SELECT nom_etu, num_etu FROM etudiants INNER JOIN
                                 notes ON num_etu = _num_etu
                                 WHERE note IS NULL');
           
            foreach ($reponse as $data){
               ?>
           <p>
               Nom des étudiants ayant pas eu de note: <?php echo ($data->nom_etu);?>
              
           </p>
           <?php
           }
             ?>
           
           <h1>Regroupements</h1>
           
           <h4>Numéro 1 : Grades différents existant dans la table des enseignants</h4>
           
           <?php 
           
           $reponse = getResult('SELECT grade FROM enseignants GROUP BY grade');
           
            foreach ($reponse as $data){
               ?>
           <p>
              Grade différent existant: <?php echo ($data->grade);?>
              
           </p>
           <?php
           }
             ?>
           
           <h4>Numéro 2: Par sexe, afficher les différents âges (en années) représentés parmi les étudiants.</h4>
           
            <?php 
           
           $reponse = getResult('SELECT sexe, YEAR(date_naiss) AS annee FROM etudiants GROUP BY annee, sexe ORDER BY sexe');
           
            foreach ($reponse as $data){
                $age = date("Y")-($data->annee);
                
               ?>
           <p>
              Sexe: <?php echo ($data->sexe);?>
              Age: <?php echo ($age);?>
              
           </p>
           <?php
           }
             ?>
           
           <h4>Numéro 3: Nombre total d'étudiants.</h4>
           
           <?php
           
            $reponse = getResult('SELECT COUNT(*) AS nb_etu FROM etudiants');
           
            foreach ($reponse as $data){
 
               ?>
           <p>
              Nombre: <?php echo ($data->nb_etu);?>
              
           </p>
           <?php
           }
             ?>
           
           <h4>Numéro 4: Date de naissance de l'étudiant le plus jeune et de celui le plus âgé</h4>
           
               <?php
           
            $reponse = getResult('SELECT MIN(date_naiss) AS jeune, MAX(date_naiss)
                     AS vieux FROM etudiants');
           
            foreach ($reponse as $data){
 
               ?>
           <p>
              Date naissance Etudiant le plus jeune: <?php echo ($data->jeune);?>
              Date naissance Etudiant le plus vieux: <?php echo ($data->vieux);?>
           </p>
           <?php
           }
             ?>
           
           <h4>Numéro 5: Pour chaque matière identifiée par son numéro, nombre d'étudiants qui ont une note</h4>
           
            <?php
           
            $reponse = getResult('SELECT nom_mat, COUNT(*) AS mat_note FROM notes INNER JOIN
                    matieres ON _num_mat = num_mat WHERE note IS NOT NULL GROUP BY nom_mat');
           
            foreach ($reponse as $data){
 
               ?>
           <p>
              Nom matière: <?php echo ($data->nom_mat);?>
              Nombre de note:<?php echo ($data->mat_note);?>
           </p>
           <?php
           }
             ?>
           
           <h4>Numéro 6: Pour chaque étudiant identifié par son numéro, moyenne obtenue (avec 2 décimales).</h4>
           
           <?php
           
            $reponse = getResult('SELECT nom_etu, AVG(note) AS moy_note FROM etudiants
                    INNER JOIN notes ON num_etu = _num_etu GROUP BY nom_etu');
           
            foreach ($reponse as $data){
 
               ?>
           <p>
              Nom étudiant: <?php echo ($data->nom_etu);?>
              Moyenne:<?php echo ($data->moy_note);?>
           </p>
           <?php
           }
             ?>
          
           <h4>Numéro 7: Numéro des étudiants n'ayant eu que 4 notes ou moins</h4>
           
            <?php
           
            $reponse = getResult('SELECT nom_etu, num_etu, COUNT(*) FROM etudiants
                    INNER JOIN notes ON num_etu = _num_etu GROUP BY num_etu HAVING COUNT(note) <=4');
           
            foreach ($reponse as $data){
 
               ?>
           <p>
              Numéro étudiant: <?php echo ($data->num_etu);?>
              Nom étudiant:<?php echo ($data->nom_etu);?>
           </p>
           <?php
           }
             ?>
           
           <h1>BONUS !!!!!</h1>
           
           <h4>Numéro 1: Noms des matières (et de leur enseignant) pour lesquelles la moyenne (non coefficientée) des notes est inférieure à 10.</h4>
           
           <h4>Numéro 2: Pour chaque étudiant ayant eu une note dans chacune des 5 matières, le nom (par ordre alphabétique), le numéro et la moyenne coefficientée obtenue</h4>
           
           <h4>Numéro 3: Nom des enseignants ayant le même grade que Bertrand, Pierre.</h4>
           
           <h4>Numéro 4: Pour chaque étudiant, nom et nombre d'étudiants se trouvant avant lui sur la liste alphabétique des noms.</h4>
           
            <?php
           
            $reponse = getResult('SELECT e1.nom_etu AS e1_nom_etu, COUNT(*) as nombre
                                  FROM etudiants e1, etudiants e2
                                  WHERE e1.nom_etu>e2.nom_etu
                                  GROUP BY e1.nom_etu
                                  ORDER BY e1.nom_etu');
           
            foreach ($reponse as $data){
 
               ?>
           <p>
              Nom étudiant par ordre alphabétique:<?php echo ($data->e1_nom_etu);?>
              Nombre avant lui:<?php echo ($data->nombre);?>
           </p>
           <?php
           }
             ?>
           
           
</body>



