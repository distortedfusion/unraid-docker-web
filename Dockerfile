FROM ubuntu:21.04

LABEL maintainer="Kevin Dierkx <kevin@distortedfusion.com>"

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update \
    && apt-get install -y gnupg curl ca-certificates zip unzip supervisor sqlite3 libcap2-bin \
    && mkdir -p ~/.gnupg \
    && chmod 600 ~/.gnupg \
    && echo "disable-ipv6" >> ~/.gnupg/dirmngr.conf \
    && apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys E5267A6C \
    && apt-key adv --homedir ~/.gnupg --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys C300EE8C \
    && echo "deb http://ppa.launchpad.net/ondrej/php/ubuntu hirsute main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && apt-get install -y php8.1-cli \
       php8.1-sqlite3 php8.1-gd \
       php8.1-curl \
       php8.1-mbstring \
       php8.1-xml php8.1-bcmath \
       php8.1-intl php8.1-readline \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN setcap "cap_net_bind_service=+ep" /usr/bin/php8.1

RUN groupadd --force -g 1000 unraid
RUN useradd -ms /bin/bash --no-user-group -g 1000 -u 1337 unraid

COPY ./docker/8.1/start-container.dist /usr/local/bin/start-container
COPY ./docker/8.1/supervisord.dist.conf /etc/supervisor/conf.d/supervisord.conf
COPY ./docker/8.1/php.ini /etc/php/8.1/cli/conf.d/99-unraid-docker-web.ini

COPY --chown=unraid:unraid . /var/www/html

RUN chmod +x /usr/local/bin/start-container

EXPOSE 8000

ENTRYPOINT ["start-container"]