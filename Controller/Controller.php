<?php

require_once '../DonkeyEvent/Model/Repository/EntityRepository.php';

class Controller {

    public $ALLOWED_METHODS = ["all", "one", "login", "reserve", "find"];

    protected EntityRepository|null $entityRepository;

    public function __construct(EntityRepository|null $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    public function getView($view, $data = []) {
        if ($view == "userlogin"){
            $view = "userall";
        }
        require_once "../DonkeyEvent/Template/".$view.".html.php";
    }

    /**
     * @return array exemple : [0 => Cinema, 1 => Cinema, 2 => Cinema]
     */

    public function all() {
        $data = $this->entityRepository->getAll();
        return $data;
    }

    /**
     * @param int $id exemple : 1
     * @return object exemple : Cinema {id: 1, name: "Cinema 1", address: "1 rue de Paris"}
     */

    public function one(int $id) {
        $data = $this->entityRepository->getById($id);
        return $data;
    }

    /**
     * @param string $columns exemple : "name = 'Cinema 1', address = '1 rue de Paris'"
     * @param string $filtre exemple : "id = 1"
     * @return void
     */

    public function update(string $columns, string $filtre) {
        $this->entityRepository->updateTable($columns, $filtre);
    }

    /**
     * @param string $filtre exemple : "id = 1"
     * @return void
     */

    public function delete(string $filtre) {
        $this->entityRepository->deleteFromTable($filtre);
    }

    /**
     * @param string $columns exemple : "name, address"
     * @param string $values exemple : "'Cinema 1', '1 rue de Paris'"
     * @return void
     */

    public function insert(string $columns, string $values) {
        $this->entityRepository->insertIntoTable($columns, $values);
    }

    /**
     * @param string $name exemple : "Cinema 1"
     * @return array exemple : [0 => Cinema, 1 => Cinema, 2 => Cinema]
     */
    public function findEntity(string $attribut)
    {  
        $valueAttribut = $_POST['search'];
        $data = $this->entityRepository->findEntityByAttribut($attribut, $valueAttribut);
        return $data;
    }

}
