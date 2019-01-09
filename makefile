.PHONY: all

all: vendor build

composer.lock: composer.json
	# Updating Dependencies with Composer
	composer update -o

vendor: composer.lock
	# Installing Dependencies with Composer
	composer install -o

sami.phar:
	# Get a copy of sami
	wget http://get.sensiolabs.org/sami.phar

build: sami.phar
	# Building documentation with sami.phar
	php sami.phar update .sami.php --force
