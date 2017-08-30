FROM composer/composer:1.2
MAINTAINER Kenzo Tanaka <kenzo0107>

RUN apt-get update \
 && apt-get install -y libpq-dev \
                       freetds-bin \
                       freetds-dev \
                       freetds-common \
                       libct4 \
                       libsybdb5 \
                       tdsodbc \
                       libfreetype6-dev \
                       libjpeg62-turbo-dev \
                       libmcrypt-dev \
                       libpng12-dev \
                       libldap2-dev \
                       zlib1g-dev \
                       libc-client-dev \
 && ln -s /usr/lib/x86_64-linux-gnu/libsybdb.a /usr/lib/ \
 && docker-php-ext-install pdo \
                           pdo_mysql \
                           pdo_pgsql \
                           pdo_dblib

RUN composer global require 'robmorgan/phinx:0.8.1'
RUN composer global require 'fzaninotto/faker:v1.6.0'

ENTRYPOINT ["phinx"]
CMD ["--help"]
