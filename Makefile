start-local:
	symfony serve --dir=apps/mooc/backend/public --port=8031 -d --no-tls

stop-local:
	symfony server:stop --dir=apps/mooc/backend/public

a-tests:
	 php ./vendor/bin/behat -p mooc_backend

u-test:
	php ./vendor/bin/phpunit
