# Dockerfile para PHP 5.4
FROM ubuntu:14.04

# Evitar preguntas durante la instalación
ENV DEBIAN_FRONTEND noninteractive

# Actualizar e instalar PHP 5.4 y extensiones comunes
RUN apt-get update && \
    apt-get install -y \
    php5 \
    php5-cli \
    php5-common \
    php5-mysql \
    php5-gd \
    php5-curl \
    php5-mcrypt \
    apache2 \
    libapache2-mod-php5 && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Habilitar mod_rewrite y mcrypt
RUN php5enmod mcrypt
RUN a2enmod rewrite

# Configurar Apache
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# Usar nuestro VirtualHost como sitio por defecto
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Copiar archivos de la aplicación (en desarrollo se sobreescribe con el volumen de docker-compose)
RUN rm -f /var/www/html/index.html
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80

# Comando para iniciar Apache (se borra el PID viejo para que arranque tras un "docker compose restart")
CMD ["/bin/sh", "-c", "rm -f /var/run/apache2/apache2.pid /var/run/apache2.pid && exec /usr/sbin/apache2ctl -D FOREGROUND"]