@component('mail::message')


# Invitation à rejoindre notre compte d'entreprise {{ $company }}

Vous avez été invité à rejoindre notre compte d'entreprise. Veuillez cliquer sur le bouton ci-dessous pour enregistrer votre compte :

@component('mail::button', ['url' => $url])
Rejoindre Maintenant
@endcomponent

Cette invitation expirera dans 7 jours.

Merci,<br>
{{ config('app.name') }}
@endcomponent
