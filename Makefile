up:
	docker-compose build && docker-compose up
shell:
	docker-compose exec app sh
test:
	docker-compose exec app php vendor/bin/phpunit --colors=always --testdox Test \
	# --filter testBasicEditReplyMarkup Makhnanov\Telegram81\Test\EditMessageReplyMarkupTest
	# --filter testBasicEditCaption Makhnanov\Telegram81\Test\EditMessageCaptionTest
	# --filter testViaId Makhnanov\Telegram81\Test\EditMessageMediaTest
	# --filter testUnchangedMessage Makhnanov\Telegram81\Test\UnchangedMessageExceptionTest
	# --filter testSimplePrivateToUser Makhnanov\Telegram81\Test\SendMessageTest
	# --filter testBasicEditPrivate Makhnanov\Telegram81\Test\EditMessage
