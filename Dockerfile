FROM laravelsail/php80-composer

RUN docker-php-ext-install pdo pdo_mysql
