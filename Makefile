run:
	docker-compose build && docker-compose up
entrance:
	docker-compose exec app sh
test:
	docker-compose exec app php vendor/bin/phpunit --colors=always --testdox Test \
	--filter testUnchangedMessage Makhnanov\Telegram81\Test\UnchangedMessageExceptionTest
	# --filter testBasicEditPrivate Makhnanov\Telegram81\Test\EditMessage
	# --filter testSimplePrivateToUser Makhnanov\Telegram81\Test\SendMessageTest
