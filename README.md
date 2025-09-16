## Стек

- **Backend**: Laravel 12, PHP 8.2+
- **База данных**: SQLite (в Docker)
- **Контейнеризация**: Docker Compose
- **Веб-сервер**: Nginx
- **API документация**: Scramble (OpenAPI)
- **Модульная архитектура**: Laravel Modules

## Структура проекта

```
Secunda/
├── app/                    # Основное приложение Laravel
├── Modules/               # Модули системы
│   ├── Activity/         # Модуль управления активностями
│   ├── Building/         # Модуль управления зданиями
│   └── Organization/     # Модуль управления организациями
├── .docker/              # Docker конфигурация
├── database/             # Миграции и сидеры
└── public/               # Публичные файлы
```

## Установка

### 1. Настройка окружения
```bash
# Копирование файла окружения
cp .env.example .env

# Генерация ключа приложения
docker compose exec -it app php artisan key:generate
exit
```

### 3. Запуск проекта
```bash
make up

# Или без Make
docker compose up -d --remove-orphans --no-recreate
```

### 4. Выполнение миграций
```bash
docker compose exec -it app php artisan migrate
exit
```

## Доступные команды

### Основные команды
```bash
make up          # Запуск проекта
make down        # Остановка проекта
make sh          # Подключение к контейнеру приложения
make tinker      # Запуск Laravel Tinker
make test        # Запуск тестов
```
## Доступы

- **API документация**: http://localhost:8080/docs/api
