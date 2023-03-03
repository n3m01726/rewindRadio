# -*- mode: ruby -*-
# vi: set ft=ruby :

## Essentials informations
dev_space = "noordotda"

## Web projects you want to create
project_name = "rewindradio"
project_url = "rewind.radio"
ip_address = "10.0.0.103"


Vagrant.configure("2") do |noor|
  noor.vm.box = "debian/bullseye64"
  noor.vm.network "public_network", ip: ip_address
  
  # Configure a specific port to forward to the guest machine
  noor.vm.network "forwarded_port", guest: 80, host: 8081

  noor.vm.hostname = dev_space + "-vm"

  # Remove the default sync folder
  noor.vm.synced_folder ".", "/vagrant", disabled: true
  
  # Synced folders
  noor.vm.synced_folder "./#{project_name}", "/var/www/html/#{project_name}", create:true
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
  touch /etc/apache2/sites-available/#{project_name}.conf

 echo "Create directories and virtual hosts for the projects..."
 sudo su 

 echo "<VirtualHost *:80>
 ServerName #{project_url}
 DocumentRoot /var/www/html/#{project_name}/public
 <Directory /var/www/html/#{project_name}>
   AllowOverride All
   Order allow,deny
   Allow from all
 </Directory>
</VirtualHost>
" > /etc/apache2/sites-available/#{project_name}.conf
sudo a2ensite #{project_name_01}.conf
sudo service apache2 reload

echo "Update and upgrade packages again..."
sudo apt update && sudo apt upgrade -y

echo "Install PHP 8.1 ..."
sudo apt install -y curl lsb-release ca-certificates apt-transport-https software-properties-common gnupg2 -y
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/sury-php.list
sudo wget -qO - https://packages.sury.org/php/apt.gpg | sudo gpg --no-default-keyring --keyring gnupg-ring:/etc/apt/trusted.gpg.d/debian-php-8.gpg --import
sudo chmod 644 /etc/apt/trusted.gpg.d/debian-php-8.gpg
sudo apt update && sudo apt upgrade -y
sudo apt install php8.1 -y
sudo apt install php8.1-cli php8.1-zip php8.1-mbstring php8.1-xml php8.1-common php8.1-curl php8.1-mysql -y

echo "Install Git, nodejs, npm and composer..."
sudo apt-get install git composer -y

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
          Il ne reste juste à faire <mysql_secure_installation> dans l'invite de commande 
          pour configurer MariaDB correctement.
          
          Optionnellement, vous pouvez ajouter dans votre fichier hosts la <project_url> ainsi 
          que l'<adress_ip> de votre VM.


*******************************************************************************************************

"
git clone

SHELL
end