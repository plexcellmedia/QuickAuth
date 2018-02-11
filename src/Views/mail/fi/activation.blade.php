# Vahvista käyttäjätili
<br>
Jotta voit kirjautua käyttäjätilillesi, sinun tulee aktivoida se.
<br>
Klikkaa alla olevaa linkkiä aktivoidaksesi käyttäjäsi!
<a href="{{ route('masterauth.activate.do', [$userId, $code]) }}">{{ route('masterauth.activate.do', [$userId, $code]) }}</a>
<br>

Kiitos,<br>
{{ config('app.name') }}