dockerfile
FROM php:8.2-apache

# Включаем mod_rewrite
RUN a2enmod rewrite

# Копируем сайт
COPY . /var/www/html/

# Права на файлы
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Порт Render
EXPOSE 80

# Запуск Apache
CMD ["apache2-foreground"]
