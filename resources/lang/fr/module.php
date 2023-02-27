<?php

return [

    'inventory' => [
        'page_title'    => 'Gestion de l\'inventaire',
        'title'     => 'Inventaire',
        'dashboard'       => 'Tableau de bord',
        'categories'    => [
            'title' => 'Toutes les catégories',
            'add'   => 'Ajouter une catégorie',
            'note'   => 'Ajouter une catégorie',
            'form' => [
                'code' => 'Code de la Catégorie',
                'name' => 'Nom de la Catégorie',
                'submit' => 'Ajouter',
                'edit'  => 'Modifier'

            ]
        ],
        'products'    => [
            'title' => 'Listes des Produits',
            'all'   =>  'Toutes les produits',
            'add'   =>  'Ajouter un produit',

            'form' => [
                'product_name' => 'Nom du Produit',
                'product_code' => 'Code du Produit',
                'category' => 'Catégorie du Produit',
                'product_barcode_symbology' => 'Modèle Code-barre',
                'product_unit' => 'Unité',
                'product_quantity' => 'Quantité',
                'product_cost' => 'Prix d\'achat / production',
                'product_price' => 'Prix de vente',
                'product_stock_alert' => 'Quantité d\'alerte',
                'product_order_tax' => 'Taxe(%)',
                'product_tax_type' => 'Type de taxe',
                'product_note' => 'Note',

            ]
        ],
        'barcode'   => 'Code Barre',
        'ajustment'    => [
            'title' => 'Ajustements',
            'all'   =>  'Tous les ajustements',
            'add'   =>  'Ajuster l\'inventaire'
        ],
        'documentation'   => 'Documentation',
    ],

    'crm' => [
        'page_title'    => 'Gestion de la relation Clients',
        'title'     => 'CRM',
        'dashboard'       => 'Tableau de bord',
        'customers'    => [
            'title' => 'Clients',
            'all'   =>  'Tous les Clients',
            'add'   =>  'Ajouter un client'
        ],
        'suppliers'    => [
            'title' => 'Fournisseurs',
            'all'   =>  'Tous les fournisseurs',
            'add'   =>  'Ajouter un fournisseur'
        ],
        'documentation'   => 'Documentation',
    ],

    'hr' => [
        'page_title'    => 'Gestion des Ressources Humaines',
        'title'     => 'Ressource Humaine',
        'dashboard'       => 'Tableau de bord',
        'employees'    => [
            'title' => 'Employés',
            'all'   =>  'Tous les Employés',
            'add'   =>  'Ajouter un Employé'
        ],
        'roles'    => [
            'title' => 'Rôles',
            'all'   =>  'Tous les rôles',
            'add'   =>  'Ajouter un rôle'
        ],
        'documentation'   => 'Documentation',
    ],

    'pos' => [
        'page_title'    => 'Gestion de Points de vente',
        'title'     => 'Points de Ventes',
        'dashboard'       => 'Tableau de bord',
        'employees'    => [
            'title' => 'Employés',
            'all'   =>  'Tous les Employés',
            'add'   =>  'Ajouter un Employé'
        ],
        'roles'    => [
            'title' => 'Rôles',
            'all'   =>  'Tous les rôles',
            'add'   =>  'Ajouter un rôle'
        ],
        'documentation'   => 'Documentation',
    ],
];
