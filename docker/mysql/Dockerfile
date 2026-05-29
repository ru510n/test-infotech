FROM percona/percona-server:8.0

COPY --chmod=644 docker/mysql/my.cnf /etc/my.cnf

EXPOSE 3306

CMD ["mysqld"]
