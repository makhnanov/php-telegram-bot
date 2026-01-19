up:
	docker-compose build && docker-compose up -d
shell:
	docker-compose exec app sh
test:
	docker-compose exec app php vendor/bin/phpunit --colors=always --testdox Test \
	# --filter testErrorTooLate Makhnanov\TelegramBot\Test\DeleteMessageTest
	# --filter testBasicEditReplyMarkup Makhnanov\TelegramBot\Test\EditMessageReplyMarkupTest
	# --filter testBasicEditCaption Makhnanov\TelegramBot\Test\EditMessageCaptionTest
	# --filter testViaId Makhnanov\TelegramBot\Test\EditMessageMediaTest
	# --filter testUnchangedMessage Makhnanov\TelegramBot\Test\UnchangedMessageExceptionTest
	# --filter testSimplePrivateToUser Makhnanov\TelegramBot\Test\SendMessageTest
	# --filter testBasicEditPrivate Makhnanov\TelegramBot\Test\EditMessage
