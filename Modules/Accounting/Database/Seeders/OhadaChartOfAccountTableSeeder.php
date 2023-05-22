<?php

namespace Modules\Accounting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Modules\Accounting\Entities\Account;
use Modules\Accounting\Entities\AccountingClass;
use Modules\Accounting\Entities\ChartOfAccount;

class OhadaChartOfAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        // $this->call("OthersTableSeeder");
        // Création du plan comptable OHADA

        $ohadaChart = ChartOfAccount::create([
            'code' => 'OHADA',
            'entitled' => 'Plan comptable OHADA',
            'type' => 'Général',
            'class' => 'Générale',
            // 'company_id' => Auth::user()->currentCompany->id,
            'company_id' => 1,
        ]);

        // Classes comptables

            // Classe 1 : Comptes de ressources durables
            $class1 = AccountingClass::create([
                'chart_of_account_id' => $ohadaChart->id,
                'code' => '1',
                'name' => 'Comptes de ressources durables',
                'is_active' => true,
            ]);

            // Classe 2 : Comptes d’actif immobilisé
            $class2 = AccountingClass::create([
                'chart_of_account_id' => $ohadaChart->id,
                'code' => '2',
                'name' => 'Comptes d’actif immobilisé',
                'is_active' => true,
            ]);

            // Classe 3 : Comptes de stocks
            $class3 = AccountingClass::create([
                'chart_of_account_id' => $ohadaChart->id,
                'code' => '3',
                'name' => 'Comptes de stocks',
                'is_active' => true,
            ]);

            // Classe 4 : Comptes de tiers
            $class4 = AccountingClass::create([
                'chart_of_account_id' => $ohadaChart->id,
                'code' => '4',
                'name' => 'Comptes de tiers ',
                'is_active' => true,
            ]);

            // Classe 5 : Comptes de trésorerie
            $class5 = AccountingClass::create([
                'chart_of_account_id' => $ohadaChart->id,
                'code' => '5',
                'name' => 'Comptes de trésorerie  ',
                'is_active' => true,
            ]);

            // Classe 6 : Comptes de charges des activités ordinaires
            $class6 = AccountingClass::create([
                'chart_of_account_id' => $ohadaChart->id,
                'code' => '6',
                'name' => 'Comptes de charges des activités ordinaires ',
                'is_active' => true,
            ]);

            // Classe 7 : Comptes de produits des activités ordinaires
            $class7 = AccountingClass::create([
                'chart_of_account_id' => $ohadaChart->id,
                'code' => '7',
                'name' => 'Comptes de produits des activités ordinaires  ',
                'is_active' => true,
            ]);

            // Classe 8 : Comptes des autres charges et des autres produits
            $class8 = AccountingClass::create([
                'chart_of_account_id' => $ohadaChart->id,
                'code' => '8',
                'name' => 'Comptes des autres charges et des autres produits ',
                'is_active' => true,
            ]);

            // Classe 9 : Comptes des engagements hors bilan et comptes de la comptabilité analytique de gestion
            $class9 = AccountingClass::create([
                'chart_of_account_id' => $ohadaChart->id,
                'code' => '9',
                'name' => 'Comptes des engagements hors bilan et comptes de la comptabilité analytique de gestion ',
                'is_active' => true,
            ]);

                    // Comptes comptables

                        // Classe 1
                            $accounts = [
                                    // Compte 10 : Capital
                                    [
                                        'account_class_id' => $class1->id,
                                        'code' => $class1->code.'0',
                                        'entitled' => 'Capital',
                                        'initial_balance' => 0,
                                        'short_name' => null,
                                        'parent_account_code' => null,
                                        'parent_account_id' => null,
                                        'vta_rate' => null,
                                        'counterparty_account' => null,
                                        'planned_budget' => null,
                                        'budget_real' => null,
                                        'remaining_budget' => null,
                                        'status' => 'Actif',
                                        'notes' => null,
                                    ],
                                            // Compte 101 : Capital social
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'0'.'1',
                                                'entitled' => 'Capital social',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '10',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],
                                                    // Compte 1011 : Capital souscrit, non appelé
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'1'.'1',
                                                        'entitled' => 'Capital souscrit, non appelé',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '101',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1012 : Capital souscrit, appelé, non versé
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'1'.'2',
                                                        'entitled' => 'Capital souscrit, appelé, non versé',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '101',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1013 : Capital souscrit, appelé, versé, non amorti
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'1'.'3',
                                                        'entitled' => 'Capital souscrit, appelé, versé, non amorti',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '101',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1014 : Capital souscrit, appelé, versé, amorti
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'1'.'4',
                                                        'entitled' => 'Capital souscrit, appelé, versé, amorti ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '101',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1018 : Capital souscrit soumis à des conditions particulières
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'1'.'8',
                                                        'entitled' => 'Capital souscrit soumis à des conditions particulières ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '101',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                            // Compte 102 : Capital par dotation
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'0'.'2',
                                                'entitled' => 'Capital par dotation',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '10',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1021 : Dotation initiale
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'2'.'1',
                                                        'entitled' => 'Dotation initiale ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '102',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1022 :  Dotations complémentaires
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'2'.'2',
                                                        'entitled' => ' Dotations complémentaires ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '102',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1028 :   Autres dotations
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'2'.'8',
                                                        'entitled' => 'Autres dotations  ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '102',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],


                                            // Compte 103 :  Capital personnel
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'0'.'3',
                                                'entitled' => ' Capital personnel ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '10',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 104 : Compte de l’exploitant
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'0'.'4',
                                                'entitled' => 'Compte de l’exploitant ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '10',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1041 :   Apports temporaires
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'4'.'1',
                                                        'entitled' => 'Apports temporaires   ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '104',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1042 :   Opérations courantes
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'4'.'2',
                                                        'entitled' => 'Opérations courantes   ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '104',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1043 :   Rémunérations, impôts et autres charges personnelles
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'4'.'3',
                                                        'entitled' => 'Rémunérations, impôts et autres charges personnelles   ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '104',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1047 :   Prélèvements d’autoconsommation
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'4'.'7',
                                                        'entitled' => 'Prélèvements d’autoconsommation   ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '104',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1048 :   Autres prélèvements
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'4'.'8',
                                                        'entitled' => 'Autres prélèvements ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '104',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],


                                            // Compte 105 : Primes liées aux capitaux propres
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'0'.'5',
                                                'entitled' => 'Primes liées aux capitaux propres ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '10',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1051 :   Primes d’émission
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'5'.'1',
                                                        'entitled' => 'Primes d’émission ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '105',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1052 :   Primes d’apport
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'5'.'2',
                                                        'entitled' => 'Primes d’apport ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '105',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1053 :    Primes de fusion
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'5'.'3',
                                                        'entitled' => 'Primes de fusion  ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '105',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1054 :   Primes de conversion
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'5'.'4',
                                                        'entitled' => 'Primes de conversion ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '105',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1058 :   Autres primes
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'5'.'8',
                                                        'entitled' => 'Autres primes ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '105',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],


                                            // Compte 106 : Écarts de réévaluation
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'0'.'6',
                                                'entitled' => 'Écarts de réévaluation ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '10',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1061 :   Écarts de réévaluation légale
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'6'.'1',
                                                        'entitled' => 'Écarts de réévaluation légale ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '106',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1062 :   Écarts de réévaluation libre
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'0'.'6'.'2',
                                                        'entitled' => 'Écarts de réévaluation libre ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '106',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],


                                            // Compte 109 : Actionnaires, capital souscrit, non appelé
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'0'.'9',
                                                'entitled' => 'Actionnaires, capital souscrit, non appelé  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '10',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                    // Compte 11 : Réserves
                                    [
                                        'account_class_id' => $class1->id,
                                        'code' => $class1->code.'1',
                                        'entitled' => 'Réserves',
                                        'initial_balance' => 0,
                                        'short_name' => null,
                                        'parent_account_code' => null,
                                        'parent_account_id' => null,
                                        'vta_rate' => null,
                                        'counterparty_account' => null,
                                        'planned_budget' => null,
                                        'budget_real' => null,
                                        'remaining_budget' => null,
                                        'status' => 'Actif',
                                        'notes' => null,
                                    ],


                                            // Compte 111 : Réserve légale
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'1'.'1',
                                                'entitled' => 'Réserve légale ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '11',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 112 : Réserves statutaires ou contractuelles
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'1'.'2',
                                                'entitled' => 'Réserves statutaires ou contractuelles ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '11',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 113 : Réserves réglementées
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'1'.'3',
                                                'entitled' => 'Réserves réglementées ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '11',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1131 :   Réserves de plus-values nettes à long terme
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'1'.'3'.'1',
                                                        'entitled' => 'Réserves de plus-values nettes à long terme ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '113',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1133 :   Réserves consécutives à l’octroi de subventions d’investissement
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'1'.'3'.'3',
                                                        'entitled' => 'Réserves consécutives à l’octroi de subventions d’investissement ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '113',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1138 :    Autres réserves réglementées
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'1'.'3'.'8',
                                                        'entitled' => ' Autres réserves réglementées ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '113',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                            // Compte 118 : Autres réserves
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'1'.'8',
                                                'entitled' => 'Autres réserves  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '11',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1181 : Réserves facultatives
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'1'.'8'.'1',
                                                        'entitled' => 'Réserves facultatives  ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '118',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1182 :  Réserves diverses
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'1'.'8'.'2',
                                                        'entitled' => 'Réserves diverses  ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '118',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],


                                    // Compte 12 : Report à nouveau
                                    [
                                        'account_class_id' => $class1->id,
                                        'code' => $class1->code.'2',
                                        'entitled' => 'Report à nouveau',
                                        'initial_balance' => 0,
                                        'short_name' => null,
                                        'parent_account_code' => null,
                                        'parent_account_id' => null,
                                        'vta_rate' => null,
                                        'counterparty_account' => null,
                                        'planned_budget' => null,
                                        'budget_real' => null,
                                        'remaining_budget' => null,
                                        'status' => 'Actif',
                                        'notes' => null,
                                    ],

                                            // Compte 121 : Report à nouveau créditeur
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'2'.'1',
                                                'entitled' => 'Report à nouveau créditeur  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '12',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 129 : Report à nouveau débiteur
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'2'.'9',
                                                'entitled' => 'Report à nouveau débiteur  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '12',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1291 :  Perte nette à reporter
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'2'.'9'.'1',
                                                        'entitled' => 'Perte nette à reporter  ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '129',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1292 :  Perte - Amortissements réputés différés
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'2'.'9'.'2',
                                                        'entitled' => 'Perte - Amortissements réputés différés',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '129',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],



                                    // Compte 13 : Résultat net de l’exercice
                                    [
                                        'account_class_id' => $class1->id,
                                        'code' => $class1->code.'3',
                                        'entitled' => 'Résultat net de l’exercice ',
                                        'initial_balance' => 0,
                                        'short_name' => null,
                                        'parent_account_code' => null,
                                        'parent_account_id' => null,
                                        'vta_rate' => null,
                                        'counterparty_account' => null,
                                        'planned_budget' => null,
                                        'budget_real' => null,
                                        'remaining_budget' => null,
                                        'status' => 'Actif',
                                        'notes' => null,
                                    ],

                                            // Compte 130 : Résultat en instance d’affectation
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'3'.'0',
                                                'entitled' => 'Résultat en instance d’affectation  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '13',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1301 :  Résultat en instance d’affectation : bénéfice
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'3'.'0'.'1',
                                                        'entitled' => 'Résultat en instance d’affectation : bénéfice',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '130',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1309 :  Résultat en instance d’affectation : perte
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'3'.'0'.'9',
                                                        'entitled' => 'Résultat en instance d’affectation : perte',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '130',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                            // Compte 131 : Résultat net : bénéfice
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'3'.'1',
                                                'entitled' => 'Résultat net : bénéfice  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '13',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 132 : Marge brute (MB)
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'3'.'2',
                                                'entitled' => 'Marge brute (MB)',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '13',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1321 :  Marge brute sur marchandises
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'3'.'2'.'1',
                                                        'entitled' => 'Marge brute sur marchandises',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '132',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1322 :  Marge brute sur matières
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'3'.'2'.'2',
                                                        'entitled' => 'Marge brute sur matières',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '132',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                            // Compte 133 : Valeur ajoutée (VA)
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'3'.'3',
                                                'entitled' => 'Valeur ajoutée (VA)  ',
                                                'initial_balance' => 0,
                                                'short_name' => 'VA',
                                                'parent_account_id' => null,
                                                'parent_account_code' => '13',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 134 : Excédent brut d’exploitation (EBE)
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'3'.'4',
                                                'entitled' => 'Excédent brut d’exploitation (EBE)  ',
                                                'initial_balance' => 0,
                                                'short_name' => 'EBE',
                                                'parent_account_id' => null,
                                                'parent_account_code' => '13',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 135 : Résultat d’exploitation (RE)
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'3'.'5',
                                                'entitled' => 'Résultat d’exploitation (RE)  ',
                                                'initial_balance' => 0,
                                                'short_name' => 'RE',
                                                'parent_account_id' => null,
                                                'parent_account_code' => '13',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 136 : Résultat financier (RF)
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'3'.'6',
                                                'entitled' => 'Résultat financier (RF)  ',
                                                'initial_balance' => 0,
                                                'short_name' => 'RF',
                                                'parent_account_id' => null,
                                                'parent_account_code' => '13',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 137 : Résultat des activités ordinaires (RAO)
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'3'.'7',
                                                'entitled' => 'Résultat des activités ordinaires (RAO)  ',
                                                'initial_balance' => 0,
                                                'short_name' => 'RAO',
                                                'parent_account_id' => null,
                                                'parent_account_code' => '13',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 138 : Résultat hors activités ordinaires (RHAO)
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'3'.'8',
                                                'entitled' => 'Résultat hors activités ordinaires (RHAO)  ',
                                                'initial_balance' => 0,
                                                'short_name' => 'RHAO',
                                                'parent_account_id' => null,
                                                'parent_account_code' => '13',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 139 : Résultat net : perte
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'3'.'9',
                                                'entitled' => 'Résultat net : perte  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '13',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                    // Compte 14 : Subventions d’investissement
                                    [
                                        'account_class_id' => $class1->id,
                                        'code' => $class1->code.'4',
                                        'entitled' => 'Subventions d’investissement ',
                                        'initial_balance' => 0,
                                        'short_name' => null,
                                        'parent_account_code' => null,
                                        'parent_account_id' => null,
                                        'vta_rate' => null,
                                        'counterparty_account' => null,
                                        'planned_budget' => null,
                                        'budget_real' => null,
                                        'remaining_budget' => null,
                                        'status' => 'Actif',
                                        'notes' => null,
                                    ],

                                            // Compte 141 : Subventions d’équipement A
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'4'.'1',
                                                'entitled' => 'Subventions d’équipement A  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '14',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1411 :  État
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'4'.'1'.'1',
                                                        'entitled' => 'État',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '141',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1412 :  Régions
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'4'.'1'.'2',
                                                        'entitled' => 'Régions',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '141',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1413 :  Départements
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'4'.'1'.'3',
                                                        'entitled' => 'Départements',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '141',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1414 :  Communes et collectivités publiques décentralisées
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'4'.'1'.'4',
                                                        'entitled' => 'Communes et collectivités publiques décentralisées',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '141',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1415 :  Entreprises publiques ou mixtes
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'4'.'1'.'5',
                                                        'entitled' => 'Entreprises publiques ou mixtes ',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '141',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1416 :  Entreprises et organismes privés
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'4'.'1'.'6',
                                                        'entitled' => 'Entreprises et organismes privés',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '141',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1417 :  Organismes internationaux
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'4'.'1'.'7',
                                                        'entitled' => 'Organismes internationaux',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '141',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1418 :  Autres
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'4'.'1'.'8',
                                                        'entitled' => 'Autres',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '141',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                            // Compte 142 : Subventions d’équipement B
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'4'.'2',
                                                'entitled' => 'Subventions d’équipement B  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '14',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 148 : Autres subventions d’investissement
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'4'.'8',
                                                'entitled' => 'Autres subventions d’investissement  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '14',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],


                                    // Compte 15 : Provisions réglementées et fonds assimilés
                                    [
                                        'account_class_id' => $class1->id,
                                        'code' => $class1->code.'5',
                                        'entitled' => 'Provisions réglementées et fonds assimilés ',
                                        'initial_balance' => 0,
                                        'short_name' => null,
                                        'parent_account_code' => null,
                                        'parent_account_id' => null,
                                        'vta_rate' => null,
                                        'counterparty_account' => null,
                                        'planned_budget' => null,
                                        'budget_real' => null,
                                        'remaining_budget' => null,
                                        'status' => 'Actif',
                                        'notes' => null,
                                    ],

                                            // Compte 151 : Amortissements dérogatoires
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'5'.'1',
                                                'entitled' => 'Amortissements dérogatoires  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '15',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 152 : Plus-values de cession à réinvestir
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'5'.'2',
                                                'entitled' => 'Plus-values de cession à réinvestir  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '15',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 153 : Fonds réglementés
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'5'.'3',
                                                'entitled' => 'Fonds réglementés  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '15',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1531 :  Fonds National
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'5'.'3'.'1',
                                                        'entitled' => 'Fonds National',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '153',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1532 :  Prélèvement pour le Budget
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'5'.'3'.'2',
                                                        'entitled' => 'Prélèvement pour le Budget',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '153',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                            // Compte 154 : Provision spéciale de réévaluation
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'5'.'4',
                                                'entitled' => 'Provision spéciale de réévaluation',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '15',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 155 : Provisions réglementées relatives aux immobilisations
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'5'.'5',
                                                'entitled' => 'Provisions réglementées relatives aux immobilisations  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '15',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1551 :  Reconstitution des gisements miniers et pétroliers
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'5'.'5'.'1',
                                                        'entitled' => 'Reconstitution des gisements miniers et pétroliers',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '155',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                            // Compte 156 : Provisions réglementées relatives aux stocks
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'5'.'6',
                                                'entitled' => 'Provisions réglementées relatives aux stocks   ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '15',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                                    // Compte 1561 :  Hausse de prix
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'5'.'6'.'1',
                                                        'entitled' => 'Hausse de prix',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '156',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                                    // Compte 1562 :  Fluctuation des cours
                                                    [
                                                        'account_class_id' => $class1->id,
                                                        'code' => $class1->code.'5'.'6'.'2',
                                                        'entitled' => 'Fluctuation des cours',
                                                        'initial_balance' => 0,
                                                        'short_name' => null,
                                                        'parent_account_id' => null,
                                                        'parent_account_code' => '156',
                                                        'vta_rate' => null,
                                                        'counterparty_account' => null,
                                                        'planned_budget' => null,
                                                        'budget_real' => null,
                                                        'remaining_budget' => null,
                                                        'status' => 'Actif',
                                                        'notes' => null,
                                                    ],

                                            // Compte 157 : Provisions pour investissement
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'5'.'7',
                                                'entitled' => 'Provisions pour investissement  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '15',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                            // Compte 158 : Autres provisions et fonds réglementes
                                            [
                                                'account_class_id' => $class1->id,
                                                'code' => $class1->code.'5'.'8',
                                                'entitled' => 'Autres provisions et fonds réglementes  ',
                                                'initial_balance' => 0,
                                                'short_name' => null,
                                                'parent_account_id' => null,
                                                'parent_account_code' => '15',
                                                'vta_rate' => null,
                                                'counterparty_account' => null,
                                                'planned_budget' => null,
                                                'budget_real' => null,
                                                'remaining_budget' => null,
                                                'status' => 'Actif',
                                                'notes' => null,
                                            ],

                                ];



                            // Création des comptes
                            foreach ($accounts as $account) {
                                $account['chart_of_account_id'] = $ohadaChart->id;

                                // Recherche du compte parent s'il existe
                                if ($account['parent_account_code']) {
                                    $parentCompte = Account::where('code', $account['parent_account_code'])->first();

                                    if ($parentCompte) {
                                        $account['parent_account_id'] = $parentCompte->id;
                                    }
                                }

                                Account::create($account);
                            }

    }
}
