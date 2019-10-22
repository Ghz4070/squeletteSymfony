## SymfonySkull

- Create .env and copy .env.dist on .env 
- docker-compose up --build -d
- docker-compose exec web composer install
- docker-compose exec web bin/console doctrine:schema:update --force
- http://localhost:81
