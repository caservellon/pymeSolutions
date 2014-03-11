# -*- mode: ruby -*-
# vi: set ft=ruby :


VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.vm.box = "pymeSolutions-Dev"
    config.vm.box_url = "http://dl.dropbox.com/sh/0kf4zpq6nqk4d6h/zLu6Bv9prL/pymeSolutions-Dev.box"
    config.vm.network :forwarded_port, host: 4567, guest: 80
    config.vm.network :forwarded_port, host: 3307, guest: 3306
    config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777", "fmode=777"]
end
