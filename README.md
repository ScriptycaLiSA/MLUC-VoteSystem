# MLUC-VoteSystem

About a voting system which uses Laravel 8 + Vuejs + Tailwindcss developed for Don Mariano Marcos Memorial State
University - Mid La Union Campus with the team spearheaded by ScriptycaLiSA (Montizon, Jake G.), CRULCOUNT (Abuan,
Alflorence), and Steven Sevilla with others.

### Steps in setting up this repository in your local environment:

- Step 1:
    - Check if php is installed in the local machine. If it's not installed yet, kindly refer
      to [PHP Website](https://www.php.net/downloads.php) and set-up PHP in environment variables (PATH).
- Step 2:
    - Make sure you have installed Composer. If it's not installed, run this code in your command shell (preferred to
      use PowerShell):

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

- Step 3:
    - Run `composer install` in the root directory of this repository in order to install Laravel dependencies indicated
      in composer.phar.
- Step 4:
    - Make sure that Node.js is installed in the local machine in order to make working Laravel and Vue.js dependencies,
      which is indicated in package.json. After that, run `node -v` and `npm -v` in command shell to check if it's
      installed.
- Step 5:
    - To install dependencies from package.json (which contains node_modules), run `npm install && npm run dev` 2 times
      in root folder using PowerShell and run the same code in vue folder (`rootfolder/vue`).
- Step 6:
    - Import db_export.sql in local database server (HeidiSQL, SQLYog, etc).
- Step 7:
    - Run `php artisan serve` using PowerShell in root folder (Laravel) to make the backend work and `npm run dev` in
      vue folder (`rootfolder/vue`) to make Vue.js frontend work.
- Step 8:
    - Check the URL displayed in Vue.js shell to show it to the browser. Enjoy :))
