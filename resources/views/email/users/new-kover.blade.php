<x-mail::message>
# Introduction

Salut {{ $user->name }}, nous sommes content de vous avoir à bord.
Nous avons créé le compte de votre entreprise {{ $company->company_name }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
