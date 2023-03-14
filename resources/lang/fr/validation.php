<?php

return [

/*
     |--------------------------------------------------------------- -------------------------
     | Lignes de langage de validation
     |--------------------------------------------------------------- -------------------------
     |
     | Les lignes de langage suivantes contiennent les messages d'erreur par défaut utilisés par
     | la classe validateur. Certaines de ces règles ont plusieurs versions telles que
     | comme les règles de taille. N'hésitez pas à modifier chacun de ces messages ici.
     |
*/

    'accepted' => ':attribute doit être accepté.',
    'active_url' => ':attribute n\'est pas une URL valable.',
    'after' => ':attribute doit être une date après :date.',
    'after_or_equal' => ':attribute doit être une date après ou égale à :date.',
    'alpha' => ':attribute doit uniquement contenir des lettres.',
    'alpha_dash' => ':attribute ne doit contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => ':attribute doit only contain letters and numbers.',
    'array' => ':attribute doit être an array.',
    'before' => ':attribute doit être a date before :date.',
    'before_or_equal' => ':attribute doit être a date before or equal to :date.',
    'between' => [
        'numeric' => ':attribute doit être between :min and :max.',
        'file' => ':attribute doit être between :min and :max kilobytes.',
        'string' => ':attribute doit être between :min and :max characters.',
        'array' => ':attribute doit entre :min et :max éléments.',
    ],
    'boolean' => 'Le champ :attribute doit être Vrai ou Faux.',
    'confirmed' => ':attribute confirmation ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => ':attribute n\'est pas une date valide.',
    'date_equals' => ':attribute doit être une date égale à :date.',
    'date_format' => ':attribute ne correspond pas au format :format.',
    'different' => ':attribute et :other doivent être differents.',
    'digits' => ':attribute doit être de :digits chiffres.',
    'digits_between' => ':attribute doit être entre :min et :max chiffres.',
    'dimensions' => ':attribute has invalid image dimensions.',
    'distinct' => ':attribute field has a duplicate value.',
    'email' => ':attribute doit être a valid email address.',
    'ends_with' => ':attribute doit end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => ':attribute doit être a file.',
    'filled' => ':attribute field must have a value.',
    'gt' => [
        'numeric' => ':attribute doit être greater than :value.',
        'file' => ':attribute doit être greater than :value kilobytes.',
        'string' => ':attribute doit être greater than :value characters.',
        'array' => ':attribute doit have more than :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute doit être greater than or equal :value.',
        'file' => ':attribute doit être greater than or equal :value kilobytes.',
        'string' => ':attribute doit être greater than or equal :value characters.',
        'array' => ':attribute doit have :value items or more.',
    ],
    'image' => ':attribute doit être an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => ':attribute field does not exist in :other.',
    'integer' => ':attribute doit être an integer.',
    'ip' => ':attribute doit être a valid IP address.',
    'ipv4' => ':attribute doit être a valid IPv4 address.',
    'ipv6' => ':attribute doit être a valid IPv6 address.',
    'json' => ':attribute doit être a valid JSON string.',
    'lt' => [
        'numeric' => ':attribute doit être less than :value.',
        'file' => ':attribute doit être less than :value kilobytes.',
        'string' => ':attribute doit être less than :value characters.',
        'array' => ':attribute doit have less than :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute doit être less than or equal :value.',
        'file' => ':attribute doit être less than or equal :value kilobytes.',
        'string' => ':attribute doit être less than or equal :value characters.',
        'array' => ':attribute doit not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute doit not be greater than :max.',
        'file' => ':attribute doit not be greater than :max kilobytes.',
        'string' => ':attribute doit not be greater than :max characters.',
        'array' => ':attribute doit not have more than :max items.',
    ],
    'mimes' => ':attribute doit être a file of type: :values.',
    'mimetypes' => ':attribute doit être a file of type: :values.',
    'min' => [
        'numeric' => ':attribute doit être at least :min.',
        'file' => ':attribute doit être at least :min kilobytes.',
        'string' => ':attribute doit être at least :min characters.',
        'array' => ':attribute doit have at least :min items.',
    ],
    'multiple_of' => ':attribute doit être a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => ':attribute format is invalid.',
    'numeric' => ':attribute doit être a number.',
    'password' => 'Le mot de passe est incorrect.',
    'present' => 'Le champ :attribute doit être présent.',
    'regex' => 'Le format :attribute est invalide.',
    'required' => 'Le champ :attribute est requis.',
    'required_if' => 'Le champ :attribute est requis lorsque :other est :value.',
    'required_unless' => 'Le champ :attribute est requis  sans :other est dans :values.',
    'required_with' => 'Le champ :attribute est requis  lorsque :values est présent.',
    'required_with_all' => 'Le champ :attribute est requis  lorsque :values sont présents.',
    'required_without' => 'Le champ :attribute est requis  lorsque :values est absent.',
    'required_without_all' => 'Le champ :attribute est requis  lorsque acun des :values ne sont présents.',
    'prohibited' => 'Le champ :attribute est interdit.',
    'prohibited_if' => 'Le champ :attribute est interdit lorsque :other est :value.',
    'prohibited_unless' => 'Le champ :attribute est interdit sauf si :other est dans :values.',
    'same' => ':attribute et :other doivent correspondre.',
    'size' => [
        'numeric' => ':attribute doit être :size.',
        'file' => ':attribute doit être de :size kilobytes.',
        'string' => ':attribute doit être de :size caractères.',
        'array' => ':attribute doit contenir :size éléments.',
    ],
    'starts_with' => ':attribute doit commencer avec l\'une des following: :values.',
    'string' => ':attribute doit être une chaîne de caractères.',
    'timezone' => ':attribute doit être un fuseau horaire valide.',
    'unique' => ':attribute a déjà été pris.',
    'uploaded' => ':attribute n\'a pas réussi à télécharger.',
    'url' => ':attribute doit être une URL valideL.',
    'uuid' => ':attribute doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
