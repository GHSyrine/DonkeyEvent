<?php

require_once '../Model/Repository/EntityRepository.php';

class Controller {

    protected EntityRepository $entityRepository;

    public function __construct(EntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    public function view($view, $data = []) {
        require_once '../Template/' . $view . '.html.php';
    }

    /**
     * @return array exemple : [0 => Cinema, 1 => Cinema, 2 => Cinema]
     */

    public function getAll() {
        $data = $this->entityRepository->getAll();
        $this->view('', $data);
    }

    /**
     * @param int $id exemple : 1
     * @return object exemple : Cinema {id: 1, name: "Cinema 1", address: "1 rue de Paris"}
     */

    public function getById(int $id) {
        $data = $this->entityRepository->getById($id);
        $this->view('', $data);
    }

    /**
     * @param string $columns exemple : "name = 'Cinema 1', address = '1 rue de Paris'"
     * @param string $filtre exemple : "id = 1"
     * @return void
     */

    public function updateTable(string $columns, string $filtre) {
        $this->entityRepository->updateTable($columns, $filtre);
    }

    /**
     * @param string $filtre exemple : "id = 1"
     * @return void
     */

    public function deleteFromTable(string $filtre) {
        $this->entityRepository->deleteFromTable($filtre);
    }

    /**
     * @param string $columns exemple : "name, address"
     * @param string $values exemple : "'Cinema 1', '1 rue de Paris'"
     * @return void
     */

    public function insertIntoTable(string $columns, string $values) {
        $this->entityRepository->insertIntoTable($columns, $values);
    }

    

}
