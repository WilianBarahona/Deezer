<?php
	
      switch ($_GET["evento"]) {
        case 'cargar_index':
            $r=include("../templates/index.html");
            echo $r;
        break;
         case 'cargar_recomendaciones':
            $r=include("../templates/feed.html");
            echo $r;
        break;
         case 'cargar_musica':
            $r=include("../templates/favorites.html");
            echo $r;
        break;
         case 'cargar_favoritas':
            $r=include("../templates/favorites.html");
            echo $r;
        break;
          case'cargar_buscador':
          $r=include("../templates/search.html");
          echo $r;
        break;
        default:
          # code...
          break;
      }
			
			 
 
 

	
?>

