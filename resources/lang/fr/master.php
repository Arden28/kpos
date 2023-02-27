<?php

return [

    /*
        |--------------------------------------------------------------- -------------------------
         | Lignes de langue d master
         |--------------------------------------------------------------- -------------------------
         |
        |
    */

    
    'navbar' => [
        'mode' => [
            'dark' => 'Mode Sombre',
            'light' => 'Mode Clair',

        ],
        'languages' => 'Langues',
        'notifications' => [
            'title' => 'Notifications',
            'none' => 'Aucune notification disponible !',

        ],
        'companies' => [
            'my_company' => 'Mon Entreprise',
            'my_companies' => 'Mes Entreprises',
            'none' => 'Vous n\'avez encore aucune entreprise !',
        ],
        'user' => [
            'profile' => 'Mon Profile',
            'subby' => 'Mes Abonnements',
            'logout' => 'Me déconnecter',
        ],
    ],
    
    /* Navbar Menu */
    'navbar-menu' => [
        'home' => 'Acceil',
        'dashboard' => 'Tableau de bord',
        'stats' => [
            'title' => 'Statistiques',
            'profit_loss' => 'Rapport sur les profits/pertes',
            'payments' => 'Rapport sur les paiements',
            'sales' => 'Rapport sur les ventes',
            'purchases' => 'Rapport sur les commandes',
            'sale_return' => 'Rapport sur les ventes retournées',
            'purchase_return' => 'Rapport sur les commandes annulées',

        ],
        'features' => [
            'title' => 'Apps',
            'purchases' =>[
                'title' => 'Commandes',
                'add' => 'Ajouter une commande',
                'all' => 'Toutes les commandes',
            ],
            'sales' =>[
                'title' => 'Ventes',
                'add' => 'Ajouter une vente',
                'all' => 'Toutes les ventes',
            ],
            'expenses' =>[
                'title' => 'Dépenses',
                'categories' => 'Catégories',
                'add' => 'Ajouter une dépense',
                'all' => 'Toutes les dépenses',
            ],
            'quotations' =>[
                'title' => 'Devis',
                'add' => 'Créer un Devis',
                'all' => 'Tous les Devis',
            ],
            'purchase_return' =>[
                'title' => 'Commandes Annulées',
                'add' => 'Ajouter une commande annulée',
                'all' => 'Toutes les commandes annulées',
            ],
            'sale_return' =>[
                'title' => 'Ventes Annulées',
                'add' => 'Ajouter une vente annulée',
                'all' => 'Toutes les ventes annulées',
            ],

        ],

        'setting' =>[
            'title' => 'Paramètres',
            'currency' => 'Devises',
            'invoice' => 'Factures',
            'general' => 'Paramètres Généraux',
        ],
        'help' =>[
            'title' => 'Support',
            'customer_service' => 'Service Client',
            'documentation' => 'Documentation',
            'license' => 'Licence',
        ],
        
        'modules' =>[
            'inventory' => [
                'title' => 'Inventaire',
                'dashboard' => 'Tableau de bord',
                'categories' => [
                    'title' => 'Catégories',
                    'all'  => 'Toutes les catégories'
                ],
                'products' => [
                    'title' => 'Produits',
                    'all'  => 'Tous les produits',
                    'add'  => 'Ajouter un produit'
                ],
                'barcode' => 'Code Barre',
                'ajustments' => [
                    'title' => 'Ajustements',
                    'all'  => 'Tous les ajustements',
                    'add' => 'Ajuster l\'inventaire',
                ],
                'documentation' => 'Documentation',
            ],

            
            'hr' => [
                'title' => 'Inventaire',
                'dashboard' => 'Tableau de bord',
                'employees' => [
                    'title' => 'Employés',
                    'all'  => 'Tous les employés',
                    'add'  => 'Ajouter un employé'
                ],
                'roles' => [
                    'title' => 'Rôles',
                    'all'  => 'Tous les rôles',
                    'add'  => 'Ajouter un rôle'
                ],
                'documentation' => 'Documentation',
            ],
            
            'crm' => [
                'title' => 'CRM',
                'dashboard' => 'Tableau de bord',
                'dash' => [
                    'page_title' => 'Relation Client',
                    'all'  => 'Tous les clients',
                    'add'  => 'Ajouter un client'
                ],
                'customers' => [
                    'title' => 'Clients',
                    'all'  => 'Tous les clients',
                    'add'  => 'Ajouter un client',

                    'page_title_all' => 'Tous les clients - CRM',
                    'page_title_add' => 'Ajouter un client - CRM',
                ],
                'suppliers' => [
                    'title' => 'Fournisseurs',
                    'all'  => 'Tous les fournisseurs',
                    'add'  => 'Ajouter un fournisseur',
                    
                    'page_title_all' => 'Tous les fournisseurs - CRM',
                    'page_title_add' => 'Ajouter un fournisseur - CRM',
                ],
                'documentation' => 'Documentation',
            ],
            // POS
            'pos' => [
                'title' => 'POS',
                'dashboard' => 'Tableau de bord',
                'orders' => [
                    'title' => 'Commandes',
                    'session'  => 'Sessions',
                    'payment'  => 'Paiements',
                    'customer'  => 'Clients'
                ],
                'configuration' => [
                    'title' => 'Configuration',
                    'setting'  => 'Paramètre',
                    'pos'  => 'Points de vente',
                ],
                'documentation' => 'Documentation',
            ],
        ],
    ],
];