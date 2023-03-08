@component('mail::message')
# Salut {{ $user->name }}

Nous sommes content de vous avoir à bord.
Nous avons créé le compte de votre entreprise {{ $company->name }}.
<br />
La prochaine étape est de vous connecter à votre compte et configurer les détails sur votre entreprise "{{ $company->name }}".
<br />
Voici vos identifiants : 
    <br />
    Nom d'utilisateur: {{ $user->email }}
    <br />
    Mot de passe : {{ $request->password }}
<br />

@component('mail::button', ['url' => 'https://www.dashboard.koverae.com/auth/login'])
    Me Connecter
@endcomponent

En aucun cas nous vous demanderons vos identifiants, sauf en page de connection. Veuillez à les garder secrets.

Merci,<br>
{{ config('app.name') }}

@endcomponent
