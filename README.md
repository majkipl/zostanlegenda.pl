# Zostań Legendą (zostanlegenda.pl)

Dedykowany serwis landing page z modułem promocyjno-konkursowym, stworzony przy użyciu frameworka **Laravel 5.8** i w pełni skonteneryzowany za pomocą **Dockera**.

Aplikacja umożliwia rejestrację zgłoszeń promocyjnych i konkursowych przez dedykowane formularze, prezentację zgłoszeń tygodnia, nagród oraz katalogu produktów, a także zarządzanie danymi z poziomu panelu administracyjnego.

---

## Spis treści

- [Stos technologiczny](#stos-technologiczny)
- [Architektura usług Docker](#architektura-usług-docker)
- [Wymagania wstępne](#wymagania-wstępne)
- [Szybki start (Instalacja)](#szybki-start-instalacja)
- [Dostępne usługi i porty](#dostępne-usługi-i-porty)
- [Kompilacja assetów (Frontend)](#kompilacja-assetów-frontend)
- [Przydatne polecenia](#przydatne-polecenia)
- [Struktura projektu](#struktura-projektu)
- [Rozwiązywanie problemów](#rozwiązywanie-problemów)

---

## Stos technologiczny

### Backend & Baza danych
- **PHP**: 7.2 (obraz `php:7.2.5-apache`)
- **Framework**: Laravel 5.8
- **Menadżer zależności**: Composer 1.5.2
- **Baza danych**: MySQL 5.7.20
- **Serwer deweloperski poczty**: MailCatcher

### Frontend
- **Szablony**: Blade
- **Style & Skrypty**: Bootstrap 4, jQuery 3.2, Sass
- **Bundler**: Laravel Mix 4 / Webpack

### Środowisko uruchomieniowe
- **Konteneryzacja**: Docker & Docker Compose

---

## Architektura usług Docker

Projekt opiera się na 4 współpracujących kontenerach zdefiniowanych w pliku `docker-compose.yaml`:

1. **`httpd`** (`zostan-legenda-pl-httpd`): Serwer Apache z modułem PHP 7.2, obsługujący aplikację, kompilację zależności i zadania Artisan.
2. **`db_mysql`** (`zostan-legenda-pl-mysql`): Baza danych MySQL 5.7 z trwałym wolumenem danych (`mysql_db_data`).
3. **`phpmyadmin`** (`zostan-legenda-pl-phpmyadmin`): Graficzny interfejs webowy do administracji bazą MySQL.
4. **`mailcatcher`** (`zostan-legenda-pl-mailcatcher`): Serwer SMTP przechwytujący wszystkie wysyłane z aplikacji wiadomości e-mail oraz oferujący webowy podgląd skrzynek odbiorczych.

---

## Wymagania wstępne

Przed uruchomieniem projektu upewnij się, że na Twoim komputerze zainstalowane są:

- [Docker](https://docs.docker.com/get-docker/) (w wersji co najmniej 20.10)
- [Docker Compose](https://docs.docker.com/compose/) (w wersji v2)
- *(Opcjonalnie)* [Node.js](https://nodejs.org/) (wersja 10–12 zalecana do lokalnej pracy z Laravel Mix poza kontenerem)

---

## Szybki start (Instalacja)

### 1. Klonowanie repozytorium

```bash
git clone <adres-repozytorium> zostanlegenda.pl
cd zostanlegenda.pl
```

### 2. Konfiguracja zmiennych środowiskowych

Skopiuj szablon zmiennych środowiskowych `.env.example` do pliku `.env`:

```bash
cp .env.example .env
```

W pliku `.env` możesz dostosować konfigurację portów oraz poświadczenia do bazy danych (domyślne wartości są w pełni skonfigurowane do pracy lokalnej).

### 3. Zbudowanie i uruchomienie kontenerów

Uruchom kontenery w tle z automatycznym procesem budowania:

```bash
docker compose up -d --build
```

#### Co dzieje się automatycznie podczas startu kontenera?
Skrypt startowy [docker/php/entrypoint.sh](docker/php/entrypoint.sh) automatycznie wykonuje następujące czynności:
1. Pobiera i instaluje zależności PHP przez `composer install`.
2. Oczekuje na pełną gotowość i akceptację połączeń przez bazę MySQL.
3. Generuje unikalny klucz aplikacji (`php artisan key:generate`).
4. Wykonuje migracje bazy danych wraz z seedami (`php artisan migrate:fresh --seed`).
5. Czyści pamięć podręczną aplikacji, konfiguracji i routingu.
6. Tworzy dowiązanie symboliczne dla plików publicznych (`public/storage`).
7. Ustawia optymalne uprawnienia zapisu dla serwera WWW (`www-data`) do katalogów `storage/`, `bootstrap/cache/` oraz `public/`.

---

## Dostępne usługi i porty

Po poprawnym uruchomieniu środowiska usługi dostępne są pod następującymi adresami (zgodnie z domyślnymi wartościami w `.env`):

| Usługa | Rola | Adres URL / Port | Poświadczenia domyślne |
| :--- | :--- | :--- | :--- |
| **Aplikacja Web** | Główna strona aplikacji | [http://localhost:8210](http://localhost:8210) | — |
| **phpMyAdmin** | Narzędzie bazy danych | [http://localhost:8212](http://localhost:8212) | Użytkownik: `rem_zl`<br>Hasło: `rem_zl` |
| **MailCatcher (Web)** | Podgląd e-maili w przeglądarce | [http://localhost:8218](http://localhost:8218) | Brak |
| **MailCatcher (SMTP)** | Port SMTP dla aplikacji | `localhost:8217` | Brak |
| **MySQL** | Bezpośredni dostęp do bazy | `localhost:8211` | Użytkownik: `rem_zl` / `root`<br>Baza: `rem_zl` |

---

## Kompilacja assetów (Frontend)

Jeśli wprowadzasz zmiany w plikach SCSS (`resources/sass`) lub JavaScript (`resources/js`), możesz je skompilować za pomocą narzędzia Laravel Mix.

### Na maszynie lokalnej (zalecany Node.js 10.x / 12.x):

```bash
# Instalacja zależności NPM
npm install

# Kompilacja jednorazowa w trybie deweloperskim
npm run dev

# Ciągłe śledzenie zmian w plikach (tryb watch)
npm run watch

# Kompilacja produkcyjna (minifikacja stylów i skryptów)
npm run prod
```

---

## Przydatne polecenia

### Zarządzanie kontenerami

```bash
# Podgląd statusu kontenerów
docker compose ps

# Podgląd logów aplikacji w czasie rzeczywistym
docker compose logs -f httpd

# Restart usług
docker compose restart

# Zatrzymanie kontenerów bez usuwania danych
docker compose stop

# Całkowite wyłączenie środowiska
docker compose down
```

### Wykonywanie poleceń wewnątrz kontenera aplikacji

```bash
# Wejście do powłoki bash kontenera HTTPD
docker compose exec httpd bash

# Uruchamianie komend Artisan
docker compose exec httpd php artisan route:list
docker compose exec httpd php artisan tinker
docker compose exec httpd php artisan cache:clear

# Ponowne wykonanie migracji i seedów
docker compose exec httpd php artisan migrate:fresh --seed
```

---

## Struktura projektu

```text
├── app/                  # Logika aplikacji Laravel
│   ├── Http/Controllers # Kontrolery HTTP (Front, Formularze, Panel)
│   ├── Mails/           # Szablony powiadomień mailowych
│   ├── Models/          # Modele Eloquent ORM
│   └── Services/        # Usługi pomocnicze
├── config/               # Pliki konfiguracyjne frameworka
├── database/             # Migracje, seedy i fabryki danych
├── docker/               # Konfiguracja środowiska kontenerowego
│   ├── apt/             # Konfiguracja repozytoriów archiwalnych Debian Buster
│   └── php/             # Konfiguracja Apache, php.ini oraz entrypoint.sh
├── public/               # Publiczny katalog serwera HTTP (asset docelowy)
├── resources/            # Źródła widoków (Blade), SCSS oraz JS
├── routes/               # Definicje tras (web.php, api.php)
├── storage/              # Przechowywanie plików, logów i pamięci podręcznej
├── .env.example          # Wzorzec konfiguracji środowiskowej
├── docker-compose.yaml   # Definicja kontenerów i powiązań sieciowych
└── Dockerfile_Httpd      # Receptura budowy obrazu aplikacji PHP/Apache
```

---

## Rozwiązywanie problemów

### 1. Błąd pobierania pakietów Debian (`404 Not Found`)
Wydanie Debian 10 Buster osiągnęło status EOL (End of Life). Repozytoria w pliku `docker/apt/sources.list` są skonfigurowane tak, aby korzystać z oficjalnych serwerów archiwalnych (`archive.debian.org`), co zapobiega problemom podczas budowania obrazu.

### 2. Błąd uprawnień do plików logów (`Permission denied`)
Jeśli pliki w katalogu `storage/logs/` zostaną wygenerowane przez użytkownika `root`, a serwer Apache działa jako `www-data`, może wystąpić błąd zapisu do pliku logu. Skrypt `entrypoint.sh` automatycznie koryguje uprawnienia przed uruchomieniem serwera Apache. W razie potrzeby można je ręcznie przywrócić poleceniem:

```bash
docker compose exec httpd chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
docker compose exec httpd chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache
```
