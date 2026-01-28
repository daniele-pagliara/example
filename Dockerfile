FROM rockylinux:9

# 1. Aggiornamento sistema e repository EPEL e REMI
RUN dnf -y update && \
    dnf -y install https://dl.fedoraproject.org/pub/epel/epel-release-latest-9.noarch.rpm \
    https://rpms.remirepo.net/enterprise/remi-release-9.rpm && \
    dnf clean all

# 2. Installazione strumenti essenziali
RUN dnf -y install --setopt=tsflags=nodocs \
    dnf-plugins-core wget nano dialog mysql zlib libzip libicu git curl openssl zip make \
    gcc gcc-c++ autoconf automake vim mod_fcgid tar bzip perl psmisc cronie crontabs \
    libpng libjpeg ghostscript --skip-broken && \
    dnf clean all

# Setup TimeZone
RUN ln -sf /usr/share/zoneinfo/Europe/Rome /etc/localtime

# 3. Installazione PHP 8.2 e OPcache
RUN dnf -y module reset php && \
    dnf -y module enable php:remi-8.2 -y && \
    dnf -y install --setopt=tsflags=nodocs \
    httpd httpd-tools \
    php php-cli php-common php-fpm php-mysqlnd php-pdo php-mbstring php-xml php-gd php-curl php-intl php-zip php-bcmath php-pear php-devel php-soap php-opcache \
    --allowerasing && \
    dnf clean all

# 4. Configurazione OPcache (Fondamentale per la velocità)
RUN { \
    echo 'opcache.enable=1'; \
    echo 'opcache.memory_consumption=256'; \
    echo 'opcache.interned_strings_buffer=16'; \
    echo 'opcache.max_accelerated_files=20000'; \
    echo 'opcache.revalidate_freq=2'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'opcache.enable_cli=1'; \
    } > /etc/php.d/10-opcache.ini

# 5. Node.js 22
RUN curl -sL https://rpm.nodesource.com/setup_22.x | bash - && \
    dnf -y install nodejs && \
    dnf clean all

# 6. Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# 7. Ottimizzazione Layer Composer
# Copiamo solo i file di configurazione prima del codice per cachare le dipendenze
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# 8. Copia del codice sorgente
COPY . .
RUN rm -rf node_modules

# 9. Generazione Autoloader ottimizzato
RUN composer dump-autoload --optimize --no-dev

# 10. Configurazione PHP-FPM
RUN mkdir -p /run/php-fpm && chown apache:apache /run/php-fpm && \
    sed -i 's/^listen =.*/listen = \/run\/php-fpm\/www.sock/' /etc/php-fpm.d/www.conf && \
    sed -i 's/^;listen.owner =.*/listen.owner = apache/' /etc/php-fpm.d/www.conf && \
    sed -i 's/^;listen.group =.*/listen.group = apache/' /etc/php-fpm.d/www.conf && \
    sed -i 's/^;listen.mode =.*/listen.mode = 0666/' /etc/php-fpm.d/www.conf

# 11. Caricamento Moduli Apache
RUN echo "LoadModule rewrite_module modules/mod_rewrite.so" > /etc/httpd/conf.modules.d/00-laravel.conf

# 12. Permessi corretti
RUN chown -R apache:apache /var/www/html && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

# 13. Script di avvio migliorato (pulisce le cache all'avvio)
CMD php-fpm -D && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    exec /usr/sbin/httpd -D FOREGROUND