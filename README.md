# 3dv
**Инструкции по установке**

В файле DB.php указать параметры подключения к базе данных.

Выполнить команды:

_composer update_

_vendor/bin/doctrine.bat orm:schema-tool:create_

**Доступные команды:**

_php app.php user:get 'start'_

где _'start'_  это число обозначающее идентификатор пользователя, начиная с которого
будет производится импорт пользователей. 