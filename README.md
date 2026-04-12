### 1. Установка PHP
Для начала установите интерпретатор PHP-FPM:
```bash
sudo apt update
sudo apt install php-fpm
```

### 2. Загрузка проекта
Подготовьте директорию `/var/www/html` и склонируйте репозиторий:
```bash
# Удаляем стандартную страницу Nginx
rm -r /var/www/html

# Создаем папку с нужными правами
mkdir -m 755 /var/www/html
cd /var/www/html

# Клонируем проект
git clone https://github.com/Dan1mir/PhpLogin.git .
```

---

## Настройка Nginx

Откройте файл конфигурации вашего сайта:
```bash
sudo nano /etc/nginx/sites-available/[ВАШ_ДОМЕН]
```

### Внесите следующие изменения:

1.  **Настройте индексные файлы**:
    Найдите строку `index` и приведите её к такому виду:
    ```nginx
    index login.html index.php;
    ```

2.  **Добавьте правила обработки PHP и редирект**:
    Вставьте этот блок в секцию `server` (например, под комментарием `#X-UI Admin Panel`):
    ```nginx
    location = /index.html {
        return 302 https://$host/login.html;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        # Замените [ВЕРСИЯ] на вашу версию PHP (например, 8.1 или 8.3)
        fastcgi_pass unix:/run/php/php[ВЕРСИЯ]-fpm.sock;
    }
    ```

---

## Завершение
После сохранения файла проверьте конфигурацию на ошибки и перезапустите Nginx:

```bash
sudo nginx -t
sudo systemctl reload nginx
```

> **Важно:** Не забудьте убедиться, что версия PHP в конфиге Nginx совпадает с той, что была установлена на первом шаге. Проверить версию можно командой `php -v`.
