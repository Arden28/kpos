<x-mail::message>
# Introduction

Salut {{ $user->name }}, nous sommes content de vous avoir à bord.
Nous avons créé le compte de votre entreprise {{ $company->company_name }}.
La prochaine étape est de vous connecter à votre compte et configurer les détails sur votre entreprise "{{ $company->company_name }}"
Votre mot de passe temporaire est : 12345678. Veuillez le changer au plus vite.
<x-mail::button :url="{{ route('login') }}">
    Commencer maintenant
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
