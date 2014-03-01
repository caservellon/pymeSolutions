pymeSolutions Dev-Env
=====================


Usage
-----

**Requirements**

- Vagrant 1.2.7 or higher
- VirtualBox 4.2.16 or higher

**Installation**

```bash
git clone git@github.com:jorgeacaballero/pymeSolutions.git
cd pymeSolutions
vagrant up 
```
Wait for the download to finish. Once the VM is running, connect to the machine via ssh and install dependencies:

```bash
cd pymeSolutions
vagrant ssh

...

vagrant@precise32:~$ cd /vagrant/pymeSolutionsDev/
vagrant@precise32:/vagrant/pymeSolutions$ composer install

```

Once done go to `http://localhost:4567` and you should recive the "You have arrived." message from Laravel.

**Database script**

Inside the vagrant machine, go to the `scripts` folder and add the +x permission:

```bash

vagrant@precise32:~$ cd /vagrant/pymeSolutions/scripts
vagrant@precise32:/vagrant/pymeSolutions/scripts$ chmod +x ./run.sh

```

Run the bash script:

```bash

vagrant@precise32:/vagrant/pymeSolutions/scripts$ ./run.sh

```

Check the log inside the logs folder.

**Troubleshoot**

If you run into a white page when loading `http://localhost:4567`, on your host computer change the access permissions to the pymeERP folder:

```bash
cd pymeSolutions
sudo chmod -R 777 pymeERP
```

**Useful tips**


MySQL root password: `root` :O


**Box Info**

- Ubuntu 12.04 LTS (GNU/Linux 3.2.0-23-generic-pae i686)
- MySql 5.5.35-0ubuntu0.12.04.2
- Laravel 4.1
- Composer bac8b81d416133bdc5d468c71e49685bab786af4
- Apache 2.2.22
- PHP 5.3.10-1ubuntu3.9 with Suhosin-Patch
- Zend Engine v2.3.0

