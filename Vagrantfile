Vagrant.configure("2") do |config|
  config.vm.box = "debian/bullseye64"

  config.vm.network "private_network", ip: "192.168.33.25"

  config.vm.synced_folder "./shared_code/rewindradio/", "/var/www/html/rewindradio/"
  config.vm.synced_folder "./shared_code/noordotda/", "/var/www/html/noordotda/"

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "1024"
  end

  config.vm.provision "shell", inline: <<-SHELL
    sudo apt-get update
    sudo apt-get install -y apache2 curl
    sudo a2enmod rewrite
    sudo service apache2 restart
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
  SHELL

  config.vm.network "forwarded_port", guest: 80, host: 8080
end
