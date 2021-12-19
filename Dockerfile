# Mengambil sistem operasi untuk digunakan
FROM centos:7

# Memasang paket httpd dan php versi 7.4 beserta modul mysqli
RUN yum install -y httpd \
 && yum install -y https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
 && yum install -y https://rpms.remirepo.net/enterprise/remi-release-7.rpm \
 && yum-config-manager --enable remi-php74 \
 && yum install -y php php-mysqlnd \
 && php -v \
 && php --modules | grep mysql

# Salin kode ke document root httpd dan atur hak akses
COPY . /var/www/html/
RUN ["chown", ":apache", "/var/www/html/konfigurasi/"]

# Menjalankan layanan httpd
EXPOSE 80
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
