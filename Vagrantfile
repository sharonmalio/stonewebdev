# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = '2'

@script = <<SCRIPT
DOCUMENT_ROOT_ZEND="/var/www/html/stonewebdev"
apt-get install software-properties-common
add-apt-repository ppa:ondrej/php5-5.6
apt-get update
apt-get upgrade
apt-get install -y apache2 git curl php5-cli php5 php5-intl libapache2-mod-php5 php5-mysql php5-mysql php5-sqlite
echo "
<VirtualHost *:80>
    ServerName stonewebdev.localhost
    
    ServerAdmin kaninimalio@gmail.com
    DocumentRoot $DOCUMENT_ROOT_ZEND

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
    
</VirtualHost>
" > /etc/apache2/sites-available/stonewebdev.conf
DIRECTORIES_CONF_FILE="/etc/apache2/conf-available/directories.conf"
if [ ! -f $DIRECTORIES_CONF_FILE ]
 then
 echo "

<Directory />
        Options FollowSymLinks
        AllowOverride All
        Require all denied
</Directory>

<Directory /usr/share>
        AllowOverride All
        Require all granted
</Directory>

<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>
" > $DIRECTORIES_CONF_FILE
 a2enconf directories
fi
php5enmod mysqli
a2enmod rewrite
a2dissite 000-default
a2ensite stonewebdev
service apache2 restart
STONEWEBDEV_WWW_DIR="/var/www/html/stonewebdev"
STONEWEBDEV_PUBLIC_DIR="/vagrant/Sites/stonewebdev/public"
rm -R $STONEWEBDEV_WWW_DIR
mkdir -p $STONEWEBDEV_WWW_DIR
for f in $( ls $STONEWEBDEV_PUBLIC_DIR );
 do sudo ln -s $STONEWEBDEV_PUBLIC_DIR/$f $STONEWEBDEV_WWW_DIR  
done;
ln -s $STONEWEBDEV_PUBLIC_DIR/.htaccess $STONEWEBDEV_WWW_DIR 
cd "$HOME"
wget https://phar.phpunit.de/phpunit.phar
chmod +x phpunit.phar
sudo mv phpunit.phar /usr/local/bin/phpunit

echo "** [ZEND] Visit http://localhost:8085 in your browser for to view the application **"
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = 'ubuntu/trusty64'
  config.vm.network "forwarded_port", guest: 80, host: 8085
  config.vm.hostname = "stonewebdev.localhost"
  config.vm.synced_folder '.', '/vagrant/Sites/stonewebdev'
  config.vm.provision 'shell', inline: @script

  config.vm.provider "virtualbox" do |vb|
    vb.customize ["modifyvm", :id, "--memory", "1024"]
  end

end
