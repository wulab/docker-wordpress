#!/bin/bash

if [ ! -f /var/lib/mysql/ibdata1 ]; then
    echo "=> initializing mysql tables"
    mysql_install_db > /dev/null
fi

/usr/bin/mysqld_safe > /dev/null 2>&1 &

RET=1
while [[ RET -ne 0 ]]; do
    sleep 1;
    mysql -e 'exit' > /dev/null 2>&1; RET=$?
done;

DATABASE_NAME="wordpress"

echo "=> checking database $DATABASE_NAME"

if ! mysql -e "use $DATABASE_NAME" > /dev/null 2>&1; then
    echo "=> creating database $DATABASE_NAME"
    mysqladmin create $DATABASE_NAME
fi

mysqladmin shutdown

exec /usr/bin/svscan /etc/service