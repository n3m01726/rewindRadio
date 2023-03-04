# -*- mode: ruby -*-
# vi: set ft=ruby :

## Essentials informations
dev_space = "noordotda"

## Web projects you want to create
project_name_01 = "noordadotda"
project_url_01 = "noorda.media"

project_name_02 = "rewindradio"
project_url_02 = "rewind.radio"

project_name_03 = "radio.beats"
project_url_03 = "radio.beats"

Vagrant.configure("2") do |noor|
  noor.vm.box = "debian/bullseye64"
  noor.vm.network "public_network", ip: "10.0.0.103"

  # Configure a specific port to forward to the guest machine
  noor.vm.network "forwarded_port", guest: 80, host: 8081

  noor.vm.hostname = dev_space + "-vm"

  # Remove the default sync folder
  noor.vm.synced_folder ".", "/vagrant", disabled: true
  # Synced folders
  noor.vm.synced_folder "./clients/#{project_name_01}", "/var/www/html/#{project_name_01}", create:true
  noor.vm.synced_folder "./clients/#{project_name_02}", "/var/www/html/#{project_name_02}", create:true
  noor.vm.synced_folder "./clients/#{project_name_03}", "/var/www/html/#{project_name_03}", create:true
  
  noor.vm.provider "virtualbox" do |provision_noor|
    provision_noor.name = project_name_01 + "-vm"
    provision_noor.memory = "1024"
    provision_noor.cpus = 1
    provision_noor.customize ["modifyvm", :id, "--vram", "12"]
    provision_noor.customize ["modifyvm", :id, "--ioapic", "on"]
    provision_noor.customize ["modifyvm", :id, "--hwvirtex", "on"]
    provision_noor.customize ["modifyvm", :id, "--vtxvpid", "on"]
    provision_noor.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    provision_noor.gui = false
  end
  
  noor.vm.provision "shell", inline: <<-SHELL
  echo "Update and upgrade packages..."
  sudo apt-get update && sudo apt-get upgrade -y

  echo "Install and config apache..."
  sudo apt-get install -y apache2 curl -y
  sudo a2enmod rewrite
  sudo service apache2 restart

  echo "Create file for VirtualHost..."
  touch /etc/apache2/sites-available/#{project_name_01}.conf
  touch /etc/apache2/sites-available/#{project_name_02}.conf
  touch /etc/apache2/sites-available/#{project_name_03}.conf

 echo "Create directories and virtual hosts for the projects..."
 sudo su 

 echo "<VirtualHost *:80>
 ServerName #{project_url_01}
 DocumentRoot /var/www/html/#{project_name_01}/public
 <Directory /var/www/html/#{project_name_01}>
   AllowOverride All
   Order allow,deny
   Allow from all
 </Directory>
</VirtualHost>
" > /etc/apache2/sites-available/#{project_name_01}.conf

  echo "<VirtualHost *:80>
  ServerName #{project_url_02}
  DocumentRoot /var/www/html/#{project_name_02}/public
  <Directory /var/www/html/#{project_name_02}>
    AllowOverride All
    Order allow,deny
    Allow from all
  </Directory>
</VirtualHost>
" > /etc/apache2/sites-available/#{project_name_02}.conf

echo "<VirtualHost *:80>
ServerName #{project_url_03}
DocumentRoot /var/www/html/#{project_name_03}/public
<Directory /var/www/html/#{project_name_03}>
  AllowOverride All
  Order allow,deny
  Allow from all
</Directory>
</VirtualHost>
" > /etc/apache2/sites-available/#{project_name_03}.conf
sudo a2ensite #{project_name_01}.conf
sudo a2ensite #{project_name_02}.conf
sudo a2ensite #{project_name_03}.conf
sudo service apache2 reload

echo "Update and upgrade packages again..."
sudo apt update && sudo apt upgrade -y

echo "Install PHP 8.2 ..."
sudo apt install -y curl lsb-release ca-certificates apt-transport-https software-properties-common gnupg2 -y
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/sury-php.list
sudo wget -qO - https://packages.sury.org/php/apt.gpg | sudo gpg --no-default-keyring --keyring gnupg-ring:/etc/apt/trusted.gpg.d/debian-php-8.gpg --import
sudo chmod 644 /etc/apt/trusted.gpg.d/debian-php-8.gpg
sudo apt update && sudo apt upgrade -y
sudo apt install php8.1 -y
sudo apt install php8.1-cli php8.1-zip php8.1-mbstring php8.1-xml php8.1-common php8.1-curl php8.1-mysql php8.1-common php8.1-gd php8.1-bcmath php8.1-imap php8.1-intl  -y

echo "Install Git..."
sudo apt-get install git -y

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
chmod +x /usr/local/bin/composer

cd /var/
php composer-setup.php --install-dir=bin --filename=composer
chmod +x bin/composer
composer self-update

sudo apt update && sudo apt upgrade -y
sudo apt install build-essential -y

cd
curl -fsSL https://deb.nodesource.com/setup_current.x | sudo -E bash -
sudo apt-get update
sudo apt install nodejs -y

sudo apt update && sudo apt upgrade -y

echo "Install MariaDB..."
sudo apt-get install apt-transport-https curl -y
sudo curl -o /etc/apt/trusted.gpg.d/mariadb_release_signing_key.asc 'https://mariadb.org/mariadb_release_signing_key.asc'
sudo sh -c "echo 'deb https://ftp.osuosl.org/pub/mariadb/repo/10.6/debian bullseye main' >>/etc/apt/sources.list"

echo "Update and upgrade packages again..."
sudo apt update && sudo apt upgrade -y

sudo apt-get install mariadb-server -y

echo "
*******************************************************************************************************

          Votre LAMP Stack de développement est maintenant installée!
          Il ne reste juste qu'à vous loguer sur votre box en SSH avec vagrant ssh 
          faire <mysql_secure_installation> dans l'invite de commande 
          pour configurer MariaDB correctement.

*******************************************************************************************************

"
SHELL
end
