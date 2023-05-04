@component('mail::message')

# Invitation à rejoindre le compte d'entreprise {{ $company }}

<p>Vous avez été invité à rejoindre l'entreprise <b>{{ $company }}</b> sur <strong>Koverae</strong>.
    Veuillez cliquer sur le bouton ci-dessous pour enregistrer votre compte :
</p>

@component('mail::button', ['url' => $url])
    <p>Rejoindre</p>
@endcomponent

<p>Cette invitation expirera dans 7 jours.</p>
<p>Si vous ne faites pas parti de cette entreprise, aucune action supplémentaire n'est requise.</p>

Merci,<br>
{{ config('app.name') }}
@endcomponent
