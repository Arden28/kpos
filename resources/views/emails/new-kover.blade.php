<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome HTML Email Template</title>
    <style type="text/css">
      body {
        margin: 0;
        background-color: #eceff1;
        font-family: sans-serif;
      }
      table {
        border-spacing: 0;
      }
      td {
        padding: 0;
      }
      img {
        border: 0;
      }
      .wrapper {
        width: 100%;
        table-layout: fixed;
        background-color: #eceff1;
        padding-bottom: 60px;
      }
      .main {
        background-color: #ffffff;
        margin: 0px auto;
        width: 600px;
        border-spacing: 0;
        color: #000000;
        border-radius: 10px;
        border-color: #ebebeb;
        border-width: 1px;
        border-style: solid;
        padding: 50px;
        line-height: 20px;
      }
      .button {
        background-color: #000000;
        color: #ffffff;
        text-decoration: none;
        padding: 12px 20px;
        font-weight: bold;
        border-radius: 5px;
      }
      .logo {
        width: 600px;
        margin: 0px auto;
      }
      .link {
        color: #535353;
        text-decoration-color: #535353;
      }
      .footer {
        margin-top: 20px auto;
        width: 600px;
      }
      .content {
        line-height: 25px;
      }
    </style>
  </head>
  <body>
    <center class="wrapper">
      <table class="logo" width="100%">
        <tr>
          <td style="text-align: center">
            {{-- <a href="#">
                <img
                src="{{ asset('assets/images/emails/logo.png')}}"
                width="130"
                style="max-width: 100%; padding-top: 10px; padding-bottom: 10px;"
                alt="Koverae" />
            </a> --}}
            <a href="#">
                <h3><strong>Koverae</strong></h3>
            </a>
          </td>
        </tr>
      </table>
      <table class="main" width="100%">
        <tr>
          <td style="text-align: center">
            <p style="font-size: 30px">Salut <strong>{{ $user->name }} !</strong></p>
          </td>
        </tr>
        {{-- <tr>
          <td style="text-align: center">
            <img src="{{ asset('assets/images/emails/waving-hand.png')}}" alt="Waving Hand" />
          </td>
        </tr> --}}
        <tr>
          <td
            style="
              font-size: 16px;
              text-align: center;
              width: 100%;
              padding: 30px 5px;
            "
          >
            <p class="content">
              {{__('Merci d\'avoir choisi Koverae !')}}
            </p>
          </td>
        </tr>
        <tr style="text-align: center">
          <td>
            <a target="__blank"  href="#" class="button text-white">{{ __('Commencer') }}</a>
          </td>
        </tr>
      </table>

      <!-- Footer -->
      <table class="footer">
        <tr>
          <td style="text-align: center; color: #858585">
            <p>
                © <script>document.write(new Date().getFullYear());</script> Koverae | 725 Immeuble Lemina</p>
            <a href="#" class="link">{{ __('Condition d\'utilisation') }}</a>
            <a href="#" class="link" style="padding-left: 15px"
              >{{ __('Politique de Confidentialité') }}</a
            >
          </td>
        </tr>
        <tr>
          <td style="text-align: center; padding: 15px; color: #858585">
            <p>{{__('Fait avec')}} <a href="https://www.dashboard.koverae.com/auth/login" class="link">Koverae</a></p>
          </td>
        </tr>
        {{-- <tr>
          <td style="text-align: center">
            <a href="#">
              <img
                src="{{ asset('assets/images/emails/circle-facebook.png')}}"
                alt="Logo"
                width="30"
                title="Logo"
            /></a>
            <a href="#">
              <img
                src="{{ asset('assets/images/emails/circle-twitter.png')}}"
                alt="Logo"
                width="30"
                title="Logo"
            /></a>
            <a href="#">
              <img
                src="{{ asset('assets/images/emails/circle-youtube.png')}}"
                alt="Logo"
                width="30"
                title="Logo"
            /></a>
            <a href="#">
              <img
                src="{{ asset('assets/images/emails/circle-linkedin.png')}}"
                alt="Logo"
                width="30"
                title="Logo"
            /></a>
            <a href="#">
              <img
                src="{{ asset('assets/images/emails/circle-instagram.png')}}"
                alt="Logo"
                width="30"
                title="Logo"
            /></a>
          </td>
        </tr> --}}
      </table>
    </center>
  </body>
</html>


{{--
@component('mail::message')
# Salut {{ $user->name }}

Nous sommes content de vous avoir à bord.
Nous avons créé le compte de votre entreprise {{ $company->name }}.
<br />
La prochaine étape est de vous connecter à votre compte et configurer les détails sur votre entreprise "{{ $company->name }}".
<br />
Voici vos identifiants :
    <br />
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

@endcomponent --}}
