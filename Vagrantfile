# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

$ip = <<IP
ifconfig
IP

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config| 
  config.vm.box = "avenuefactory/lamp"
  config.vm.provision "shell", inline: $ip, run: "always"
  config.vm.network :private_network, type: "dhcp"
  config.vm.synced_folder "./", "/var/www/html"
end
