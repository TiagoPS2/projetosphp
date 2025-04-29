# Imagem base com PHP, Apache e extensões comuns
FROM php:8.2-apache

# Instala dependências do sistema e extensões do PHP necessárias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd

# Ativa o módulo rewrite do Apache (essencial para Laravel)
RUN a2enmod rewrite

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho no container
WORKDIR /var/www/html

# Copia todos os arquivos do projeto
COPY . .

# Instala as dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Corrige permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Define as variáveis de ambiente do Laravel no container
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Ajusta o VirtualHost do Apache para apontar para o diretório 'public'
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Expõe a porta padrão (Render usará a porta automaticamente com a variável $PORT)
EXPOSE 80

# Comando padrão para iniciar o Apache
CMD ["apache2-foreground"]
