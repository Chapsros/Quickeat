# Projet-Web QuickEat (Symfony 4.4)

**Fichier d'instruction (MacOS):**

- Pré-requis (PHP, Composer, MAMP, Symfony)

- Version PHP 7.4.12
- Version MAMP 6.0.1
- Version Composer 2.0.6
- Version Symfony 4.4

-- Installation de composer (Terminal) :

	curl -sS https://getcomposer.org/installer | php

-- Déplacer le fichier .phar et lui accorder les droits :

	mv composer.phar /usr/local/bin/composer
	chmod +x /usr/local/bin/composer
		
      
-- Mise à jour de composer :
      
	sudo composer self-update
      

-- Installation du package SwiftMailer (Symfony) :

      composer require symfony/swiftmailer-bundle

   
-- Installation de MailDev :

      npm install -g maildev

-- Paramétrage SwfitMailer :

    
- .env --> MAILER_URL=null://localhost


- Dans le fichier php.ini indiquer le port smtp pour recevoir les mails :

      SMTP = localhost
      smtp_port = 2525

-- Utilisation de MAMP :

- Lancer MAMP --> Start 

-- Lancement du site depuis votre IDE :

     php bin/console s:r
      
     
**Fichier d'instruction (Windows) :**




