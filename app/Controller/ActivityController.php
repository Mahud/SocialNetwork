<?php

namespace Controller;

use \W\Controller\Controller;

class ActivityController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function all()
	{
  	$activity_manager = new \Model\ActivityModel();
		// O9n récupère toutes les activités
		$activities = $activity_manager->findAll();
		// On apsse la variable $activities dans la vue
		$this->show('/activity/all', ['activities' => $activities]);
	}

	/**
	 * Page de contact
	 */
	public function create()
	{
    // Traitement du formulaire
    if (!empty($_POST)) {
			 	// On instancie lre modèle pour communiquer
        $activity_manager = new \Model\ActivityModel();
				// On insère l'activités et on la stocke dans la variable
				var_dump($_POST);

        $activity = $activity_manager->insert($_POST);
				// Quand on ajoute une cativités, On redirige vars la liste des activités
				$this->redirectToRoute('activity_all');


    }
    // Affichage du formulaire
		$this->show('/activity/create');
	}


/**
 * Page qui permet de supprimer une activité
 */
public function delete($id)
{
	$activity_manager = new \Model\ActivityModel();
	if ($activity_manager->delete($id)){
			$this->flash('L\'activité a bien été supprimée.' , 'success');
	}
	$this->redirectToRoute('activity_all');

	}
}
