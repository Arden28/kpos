<?php

namespace Modules\User\Interfaces;

interface EmployeeInterface{

    // Récupérer tous les employés par leurs Company
    public function getAllEmployees($model);

    // Créer un employé
    public function createEmployee($request);

    public function editEmployee($request, $employee);
}
