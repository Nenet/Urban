<?php
require_once 'functions.php';

// librairie de fonction de rendu

function renduHtmlSelect($liste, $colValue, $name) {
	$html = '<select name="'.$name.'">';
	
	foreach ($liste as $k => $v) {
		$chaineHtml = '';
		foreach ($v as $cle => $val) {
			if ($cle == $colValue) {
				$chaineHtml .= '<option value="'.$val.'">';
			} else {
				$chaineHtml .= $val." ";
			}
		}
		$html .= $chaineHtml.'</option>';
	}
	$html .= '</select>';
	
	return $html;
}

/**
 * Fonction de rendu qui retourne une chaine CSS formattée
 * @param tablea de style array[requis] <p>
 * Fonction de rendu qui retourne une chaine CSS formattée
 * </p>
 * @return string chaine CSS formattée
 */
function renduCSS($value) {
	// Initialisation de la valeur de retour temporaire "style"
	$style = '';
	// Démarrage de la boucle pour tous les couples de style
	foreach ($value as $k => $v) {
		// Remplissage de la variable temporaire avec ex.: color: red;
		$style .= $k.': ' . $v . '; ';
	}
	// Une fois style complètement remplie on l'ajoute comme valeur ex.: style="color: red; font-weight: bold;"
	return  'style="' . $style . '" ';
}

/**
 * Fonction de rendu qui retourne une chaine d'attribut formattée
 * @param tablea d'attribut array[requis] <p>
 * Fonction de rendu qui retourne une chaine d'attribut formattée
 * </p>
 * @return string chaine d'attribut formattée
 */
function renduAttr($value) {
	// Initialisation de la valeur de retour temporaire "style"
	$attr = '';
	// Démarrage de la boucle pour tous les couples de style
	foreach ($value as $key => $value) {
		// Remplissage de la variable temporaire avec ex.: color: red
		// Dans le cas ou l'attribut est 'style'
		if ($key == 'style') {
			// Appel de la fonction de rendu CSS
			$attr .= renduCSS($value);						
		} else {
			// S'il ne s'agit pas de l'attribut style on ajoute directement la valeur ex.: href="http://www.google.com"
			$attr .= $key.'="' . $value . '" ';
		}
	}
	// Une fois style complètement remplie on l'ajoute comme valeur ex.: style="color: red; font-weight: bold;"
	return $attr;
}

/**
 * Fonction de rendu qui retourne une chaine HTML formattée
 * @param tableau de paramètre array[optional] <p>
 * Fonction de rendu qui retourne une chaine HTML formattée
 * le tableau passé en paramètre peux contenir un sous tableau
 * pour la gestion de l'attribut style
 * </p>
 * @return string chaine HTML formattée
 */
function renduHtml($balise, $chaine='', $tableauAttr='') {
	$rl 		= "\n"; // Caractère de retour à la ligne
	$sortieHtml = '';	// Initialisation de la valeur de retour
	
	// Si la vairable chaine est un tableau (ex.: <ul><li></li></ul>)
	if (is_array($chaine)) { // si oui
		// Ouverture de la balise et écriture de l'entité ex.: "<ul "
		$sortieHtml .= '<' . $balise . ' ' . renduAttr($tableauAttr) . '>' . $rl;
		
		// Si $balise est <ul> ou <ol>
		if ($balise == 'ul' || $balise == 'ol') {
			// Boucle sur les balises filles
			foreach ($chaine as $value) {
				$sortieHtml .= renduHtml('li', $value) . $rl;
			}
		}
		
		// Fermeture de la balise englobante
		$sortieHtml .= '</' . $balise . '>' . $rl;
	} else {
		// Si la variable "chaine" est non vide alors on traite comme par exemple <p>chaine</p>
		if ($chaine != '') {
			// Ouverture de la balise et écriture de l'entité ex.: "<p "
			$sortieHtml .= '<' . $balise . ' ';
			
			// Si le tableau d'attribut n'est pas '' alors...
			if ($tableauAttr != '') {
				// Démarrage de la fonction pour tous les attributs fournis
				$sortieHtml .= renduAttr($tableauAttr);
			}
			// clôture de la balise ouvrante, ajout du contenu et fermeture de la balise
			$sortieHtml .= '>' . $chaine . '</' . $balise . '>' . $rl;
		} else {
			// variante pour une balise autonome (ex.: <br/>)
			$sortieHtml = '<' . $balise . '/>' . $rl;
		}
	}
	
	// retourne la chaine de sortie
	return $sortieHtml;
}

/**
 * Fonction de découpage de chaine
 * @param string chaine à couper
 * @param max    longueur à couper
 * @param end    caractère(s) de suite
 */
 
function coupeChaine($string, $max = 60, $end = '...') {
    if (strlen($string) > $max) {
        $string = substr($string, 0, $max - strlen($end)).$end;
    }
    return $string;
}

/**
 * Fonction de rendu qui retourne un tableau HTML formattée
 * @param tableau de paramètre array[requis] <p>
 * Fonction de rendu qui retourne un tableau HTML formattée
 * </p>
 * @return string chaine HTML formattée
 */
function renduHtmlTable($id, $array, $tri = 'id', $sens = 'asc', $cleanHtml = true) {
	$rl 		= "\n"; // Caractère de retour à la ligne
	
	// Ouverture de la balise <table>
	$sortieHtml = '<table class="table table-responsive">' . $rl;
	
	// boucle sur les lignes (indexées) du tableau
	for ($i = 0; $i < count($array) ; $i++) {
	
		// écriture des entêtes de colonnes
		if ($i == 0) {
			
			// ouverture de la rangée d'entête
			$sortieHtml .= '<thead>';
			$sortieHtml .= '<tr>';
			
			foreach ($array[$i] as $key => $value) {
				// écriture des entêtes de chaque colonne
				
			    // Cas 1: colonne 'id' 
			    if ($key == $id && count($array) > 1) {
				    $sortieHtml .= '<th>actions</th>';
				    
				// Cas 2: colonne 'image' -> ne pas mettre de tri possible
			    } else if ($key == 'image') {
			        $sortieHtml .= '<th>image</th>';
			        
			    // Cas 3: les autres types de colonnes triables
			    } else {
			        $sortieHtml .= '<th>';
			        
			        // Si tri existe et que la liste est complète
			        if (isset($tri) && count($array) > 1) {
			            
			            // Gestion du tri
			            if ($tri == $key) {
			                
			                // Gestion du sens de tri ascendant
			                if ($sens == 'asc') {
			                    $sortieHtml .= '<a href="?tri='.$key.'&sens=desc" class="';
			                    if ($tri ==$key) {
			                        $sortieHtml .= ' active';
			                    }
			                    $sortieHtml .= '">'.$key.' <span class="glyphicon glyphicon-arrow-down';
			                    if ($tri == $key) {
			                        $sortieHtml .= ' active';
			                    }
			                    $sortieHtml .= '"></span></a>';
			                    
			                // Gestion du sens de tri descendant
			                } else if ($sens == 'desc') {
			                    $sortieHtml .= '<a href="?tri='.$key.'&sens=asc" class="';
			                    if ($tri ==$key) {
			                        $sortieHtml .= ' active';
			                    }
			                    $sortieHtml .= '">'.$key.' <span class="glyphicon glyphicon-arrow-up';
			                    if ($tri == $key) {
			                        $sortieHtml .= ' active';
			                    }
			                    $sortieHtml .= '"></span></a>';
			                }
			                
			            // Valeur sans tri passé en paramètre GET
			            } else {
			                $sortieHtml .= '<a href="?tri='.$key.'&sens=desc">'.$key.' <span class="glyphicon glyphicon-arrow-down"></span></a>';
			            }
			        
			        // Cas standard...
			        } else {
			            $sortieHtml .= $key;
			        }
			        $sortieHtml .= '</th>';
			    }
			}
			
			// fermeture de la rangée d'entête
			$sortieHtml .= '</tr>';
			$sortieHtml .= '</thead>';
			$sortieHtml .= '<tbody>';
		}
	
		// ouverture des rangées de valeur
		$sortieHtml .= '<tr>';
		
		foreach ($array[$i] as $key => $value) {
			// écriture des cellule et des valeur de chaque colonne
			
		    // Gestion de l'id
		    if ($key == $id && count($array) > 1) {
				$sortieHtml .= '<th><a class="btn" href="detail.php?id=' . $value . '">détail</a></th>';
		    
		    // Gestion des images
		    } else if ($key == 'image') {
		        $sortieHtml .= '<td>';
		        if (isset($value)) {
		             $sortieHtml .= '<a class="example-image-link" href="upload/'.$value.'" data-lightbox="example-1"><img class="example-image" src="upload/thumbnail/'.$value.'" alt="image"></a>';
		        }
		        $sortieHtml .= '</td>';
		    
		    // Gestion des email avec boutons
		    } else if ($key == 'email') {
		        $sortieHtml .= '<td>';
		        if ($value != '') {
		             $sortieHtml .= '<a class="btn" href="email_form.php?id='.$value.'">'.$value.'</a>';
		        }
		        $sortieHtml .= '</td>';
		    
		    // Gestion des commentaires
		    } else if ($key == 'commentaires') {
		        if (count($array) > 1) {
		             $sortieHtml .= '<td style="text-align: left;">'.coupeChaine(strip_tags($value), 50).'</td>';
		        } else {
		             $sortieHtml .= '<td style="text-align: left;">'.$value.'</td>';
		        }
		        
		    // Gestion par défaut
			} else {
				// Syntaxe avec opérateur ternaire
				($cleanHtml) ? $maValeur = strip_tags($value) : $maValeur = $value;
				
				$sortieHtml .= '<td>' . $maValeur . '</td>';
			}
		}
		
		// fermeture des rangées de valeur
		$sortieHtml .= '</tr>';
	}
	
	// fermeture du tableau
	$sortieHtml .= '</tbody>';
	$sortieHtml .= '</table>';
	
	return $sortieHtml;
}
















