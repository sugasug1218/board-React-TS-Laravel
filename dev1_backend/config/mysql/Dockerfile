FROM mysql:5.7.37

#####################################
# Set Timezone
#####################################
ARG TZ=UTC
ENV TZ ${TZ}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone && chown -R mysql:root /var/lib/mysql/

# Dockerのコンテナ内のmysqlプロンプトで、日本語入力を可能にする
RUN apt-get update
RUN apt-get install -y locales 
RUN locale-gen ja_JP.UTF-8
RUN echo "export LANG=ja_JP.UTF-8" >> ~/.bashrc

COPY my.cnf /etc/mysql/conf.d/my.cnf

CMD ["mysqld"]

EXPOSE 3306