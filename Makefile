start-local:
	symfony serve --dir=apps/mooc/backend/public --port=8030 -d --no-tls

stop-local:
	symfony server:stop --dir=apps/mooc/backend/public