run:
	docker-compose build && docker-compose up
entrance:
	docker-compose exec app sh
test:
	docker-compose exec app php vendor/bin/phpunit --colors=always --testdox Test --filter testBasicEditPrivate Makhnanov\Telegram81\Test\EditMessage # testSimplePrivateToUser Makhnanov\Telegram81\Test\SendMessageTest
