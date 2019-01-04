FROM ubuntu:16.04

ARG UID=1000
ARG GID=1000

ENV LANG=en_US.utf8 \
    LC_ALL=C.UTF-8 \
    TERM=xterm \
    DEBIAN_FRONTEND=noninteractive

RUN groupadd --gid $GID application \
  && useradd --uid $UID --gid application --shell /bin/bash --create-home application

RUN apt-get update -y \
    && apt-get install -y \
        software-properties-common \
        curl \
        wget \
        unzip

RUN add-apt-repository -y ppa:ondrej/php \
    && apt-get update -y \
    && apt-get install -y \
        php7.1-cli \
        php7.1-gd \
        php7.1-json \
        php7.1-mbstring \
        php7.1-dom \
        php7.1-curl \
        php7.1-mysql \
        php7.1-zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && ln -s /composer.phar /usr/bin/composer
