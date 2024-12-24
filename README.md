
# Juicer App

Application for simulating juicer




## Setup and configuration for Linux OS local environment

- Clone the following repository to the /var/www/html path:

        git clone git@github.com:vladaj81/juicer-app.git

- In /etc/apache2/apache2.conf file add following virtual host:

        <VirtualHost *:80>
            ServerName juicer-app.localhost
            ServerAlias www.juicer-app.localhost

            DocumentRoot /var/www/html/juicer-app
            <Directory /var/www/html/juicer-app>
                AllowOverride All
                Require all granted
                Allow from All
                <IfModule mod_rewrite.c>
                    Options -MultiViews
                    RewriteEngine On
                </IfModule>
                FallbackResource /index.php
            </Directory>

            ErrorLog /var/log/apache2/project_error.log
            CustomLog /var/log/apache2/project_access.log combined
        </VirtualHost>

- In /etc/hosts file add the host:

        127.0.0.1 juicer-app.localhost

- Restart the apache server with following command:

        sudo service apache2 restart

- Go to /var/www/html/juicer-app path and run the following command to generate autoload files:

        composer install

- After this steps, you can access the application in the browser, at the following url:

        http://juicer-app.localhost/