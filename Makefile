
default:
	@composer

composer: composer.json
	@if [ ! -f "composer.phar" ]; then make composer_install; else make composer_update; fi

composer_install: composer.json
	@echo "Installing composer"
	@curl -s http://getcomposer.org/installer | php
	@php composer.phar install --dev

composer_update: composer.phar
	@php composer.phar update --dev

deploy:
	@make composer
	vendor/bin/phpmd app/ xml rulesets/codesize.xml > build/logs/pmd.xml || true
	vendor/bin/phpcpd --progress --log-pmd build/logs/cpd.xml ./app/
	vendor/bin/phploc --progress --count-tests  --log-xml build/logs/phploc.xml  ./app/
	vendor/bin/phpunit --coverage-html build/coverage/html --coverage-clover build/logs/clover.xml --log-junit build/logs/junit.xml
	vendor/bin/phpdox

web:
	php artisan serve --host=0.0.0.0 --port=8000

web_coverage:
	php -S 0.0.0.0:8000 -t build/coverage/html

web_docs:
	php -S 0.0.0.0:8000 -t build/api/docs/html