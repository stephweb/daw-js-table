<?php

namespace Controllers;

use Models\Element;
use DawPhpPagination\Pagination;

/**
 * Exemple avec l'ORM de Laravel 5.2 (mais c'est aussi le meme principe sans utiliser l'ORM de Laravel 5.2)
 * Pour la pagination on prend comme exemple la librairie DAW PHP Pagination (mais c'est aussi le meme principe avec une autre pagination)
 */
class ExampleController
{
    /**
     * @var Pagination Object
     */
    private $pagination;

    /**
     * @var int - nombre d'éléments selon éventuels paramètres envoyés en GET
     */
    private $count;

    /**
     * Return vue - Layout + vue à insérer à l'intérieur
     *
     * @param string $view - Classe View à charger
     * @param array $data - Pour renvoyer éventuels données à la vue
     */
    private function view($view, array $data = [])
    {
        if ($data) extract($data);

        ob_start();
        require ROOT.'/views/'.$view.'.php';
        $contentInLayout = ob_get_clean();

        require ROOT.'/views/layouts/default.php';

        exit();
    }
    
    /********** Listing **********/
    /**
     * Listing des composants
     */
    public function index()
    {
        return $this->view('index');
    }

    /**
     * Récupérer la liste des éléments avec Ajax
     */
    public function indexWithAjax()
    {
        $this->pagination = new Pagination();

        // On envoi ensuite cette variable dans la vue 'tableList'
        $elements = $this->findElements();

        ob_start();
        require ROOT.'/views/tableList.php';
        $tableList = ob_get_clean();

        echo json_encode([
            'table_list' => $tableList,
            'pagination' => $this->pagination->render(),    // n'est pas obligatoire (est obligatoire seulement si 'per_page' est renseigné)
            'per_page' => $this->pagination->perPage(),    // n'est pas obligatoire
            'count' => $this->count,        // n'est pas obligatoire
            'orderby' => ['orderby'=>'name', 'order'=>'ASC'],    // n'est pas obligatoire. utilie pour le style du <th>
        ]);
    }

    /**
     * @return Element - éléments selon éventuels paramétres passés en GET
     */
    private function findElements()
    {
        $search = (isset($_GET['search']) && $_GET['search'] != '') ? $_GET['search'] : null;

        if (
            isset($_GET['orderby']) && $_GET['orderby'] != '' && in_array($_GET['orderby'], ['id', 'name', 'description'])
            && isset($_GET['order']) && $_GET['order'] != '' && in_array($_GET['order'], ['ASC', 'DESC'])
        ) {
            $orderby =  $_GET['orderby'];
            $order =  $_GET['order'];
        } else {
            $orderby = 'name';
            $order = 'ASC';
        }


        $this->count = Element::when($search != null, function ($query) use ($search) {
                return $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->count();

        $this->pagination->paginate($this->count);

        return Element::when($search != null, function ($query) use ($search) {
                return $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->orderBy($orderby, $order)
            ->offset($this->pagination->getOffset())
            ->limit($this->pagination->getLimit())
            ->get();
    }
    /********** /Listing **********/
}
