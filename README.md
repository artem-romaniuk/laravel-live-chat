ma## Инструкция по запуску чата.

Для запуска на машине должны быть установленны следующие компоненты:
- Docker
- docker-compose
- Makefile

1. Клонировать данный репозиторий:
    - git clone https://github.com/artem-romaniuk/laravel-live-chat.git .
2. В каталоге с проектом запустить по очереди следующие команды:
    - make build
    - make start
    - make migrate
    - make queue (будет запущен воркер очередей, процес "висячий", все остальные команды необходимо запускать в новом окне терминала)
    - make server (запуск laravel-echo-server)
    
Если в процессе никаких ошибок не возникло, можно переходить к проверке чата.
