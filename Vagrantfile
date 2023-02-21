Vagrant.configure("2") do |config|
  config.vm.box = "debian/bullseye64"

  config.vm.network "private_network", ip: "192.168.33.25"
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.synced_folder "./shared_code/rewindradio/", "/var/www/html/rewindradio/"

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "1024"
  end

  config.vm.provision "shell", inline: <<-SHELL
  sudo su  
    sudo apt-get update
    sudo apt-get install -y apache2 curl
    sudo a2enmod rewrite
    sudo service apache2 restart

    echo"  <VirtualHost *:80>
    ServerAdmin webmaster@localhost
    ServerName rewind.radio
    DocumentRoot /var/www/html/rewindradio
  </VirtualHost>" >> /etc/apache2/sites-available/rewindradio.conf
  sudo a2ensite rewindradio.conf
  sudo service apache2 reload

    sudo apt update && sudo apt upgrade -y 
    sudo apt install -y lsb-release ca-certificates apt-transport-https software-properties-common gnupg2
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | sudo tee /etc/apt/sources.list.d/sury-php.list
    sudo wget -qO - https://packages.sury.org/php/apt.gpg | sudo gpg --no-default-keyring --keyring gnupg-ring:/etc/apt/trusted.gpg.d/debian-php-8.gpg --import
    sudo chmod 644 /etc/apt/trusted.gpg.d/debian-php-8.gpg
    sudo apt update && sudo apt upgrade -y
    sudo apt install php8.1
    sudo apt install php8.1-cli php8.1-mbstring php8.1-xml php8.1-common php8.1-curl php8.1-mysql 

    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
    
    sudo apt-get install git nodejs npm 
SHELL 
end
