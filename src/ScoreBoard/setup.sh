rm -r /var/www/html/*

cp -r Problems/ /var/www/html/Problems
cp ./*.php /var/www/html/
chown -R apache:apache /var/www/html
mysql -u root -pgoodyear123!@# <setupDb.sql

cd /var/www/html/Problems/
for i in *
do
    tar czf $i.tar $i
done