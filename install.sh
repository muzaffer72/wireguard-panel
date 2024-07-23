#!/bin/bash

# Function to prompt for MySQL details
prompt_mysql_details() {
    read -p "Enter MySQL database name: " DBNAME
    read -p "Enter MySQL username: " DBUSER
    read -p "Enter MySQL password: " DBPASS
    echo
}

# Function to prompt for APP_URL
prompt_app_url() {
    read -p "Enter the application URL (e.g., http://your_domain_or_ip): " APP_URL
}

# Prompt for MySQL details
prompt_mysql_details

# Prompt for APP_URL
prompt_app_url

# Get the server's public IPv4 address
PUBLIC_IP=$(curl -4 -s ifconfig.me)

# Update the package list and upgrade all packages
echo "Updating package list and upgrading packages..."
sudo apt update && sudo apt upgrade -y

# Install necessary packages
echo "Installing necessary packages..."
sudo apt install -y nginx mysql-server php-fpm php-mysql php-cli php-mbstring php-xml php-curl php-bcmath php-gmp unzip curl git sshpass supervisor ufw

# Allow 'Nginx Full' in UFW
echo "Allowing 'Nginx Full' in UFW..."
sudo ufw allow 'Nginx Full'

# Enable UFW
echo "Enabling UFW..."
sudo ufw --force enable

# Start and enable Nginx
echo "Starting and enabling Nginx..."
sudo systemctl start nginx
sudo systemctl enable nginx

# Secure MySQL installation
echo "Securing MySQL installation..."
sudo mysql_secure_installation

# Create a MySQL user and database for WireGuard Panel
echo "Creating MySQL user and database..."
# DB_CONNECTION=mysql
# DB_HOST=localhost
# DB_PORT=3306
# DB_DATABASE=app2govpn
# DB_USERNAME=app2go
# DB_PASSWORD=Q49GamVbBeFuMnP67pU4q33A
sudo mysql -e "SET GLOBAL validate_password.policy=LOW;"
sudo mysql -e "CREATE DATABASE IF NOT EXISTS app2govpn;"
sudo mysql -e "CREATE USER IF NOT EXISTS 'app2go'@'localhost' IDENTIFIED BY 'Q49GamVbBeFuMnP67pU4q33A';"
sudo mysql -e "GRANT ALL PRIVILEGES ON app2govpn.* TO 'app2go'@'localhost';"
sudo mysql -e "FLUSH PRIVILEGES;"

# Install Composer (Dependency Manager for PHP)
echo "Installing Composer..."
cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
rm composer-setup.php

# Clone the WireGuard Panel repository
echo "Cloning WireGuard Panel repository..."
cd /var/www
sudo git clone https://github.com/Caqil/wireguard-panel.git wireguard-panel

# Set permissions for the WireGuard Panel directory
echo "Setting permissions for WireGuard Panel directory..."
sudo chown -R www-data:www-data /var/www/wireguard-panel
sudo chmod -R 755 /var/www/wireguard-panel

# Install project dependencies with --no-interaction flag
echo "Installing project dependencies..."
cd /var/www/wireguard-panel
sudo composer update

# Configure Nginx for WireGuard Panel
echo "Configuring Nginx for WireGuard Panel..."
sudo tee /etc/nginx/sites-available/wireguard-panel <<EOL
server {
    listen 80;
    server_name ${PUBLIC_IP};
    root /var/www/wireguard-panel/public;

    index index.php index.html index.htm;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;  # Adjust the PHP version if necessary
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
EOL

# Enable the new site and test Nginx configuration
echo "Enabling new site and testing Nginx configuration..."
sudo ln -s /etc/nginx/sites-available/wireguard-panel /etc/nginx/sites-enabled/
sudo nginx -t

# Restart Nginx to apply changes
echo "Restarting Nginx to apply changes..."
sudo systemctl restart nginx

# Set up the environment
echo "Setting up environment variables..."
cd /var/www/wireguard-panel
cp .env.example .env

# Update .env file with database and APP_URL settings
echo "Updating .env file with database and APP_URL settings..."
sudo sed -i "s/DB_HOST=127.0.0.1/DB_HOST=localhost/" .env
sudo sed -i "s/DB_PORT=3306/DB_PORT=3306/" .env
sudo sed -i "s/DB_DATABASE=homestead/DB_DATABASE=${DBNAME}/" .env
sudo sed -i "s/DB_USERNAME=homestead/DB_USERNAME=${DBUSER}/" .env
sudo sed -i "s/DB_PASSWORD=secret/DB_PASSWORD=${DBPASS}/" .env
sudo sed -i "s|APP_URL=|APP_URL=${APP_URL}|" .env

# Debugging: Output .env file content
echo "DEBUG: .env file content:"
cat .env

# Generate application key
echo "Generating application key..."
php artisan key:generate

# Set directory permissions
echo "Setting directory permissions..."
sudo chown -R www-data:www-data /var/www/wireguard-panel/storage /var/www/wireguard-panel/bootstrap/cache
sudo chmod -R 777 /var/www/wireguard-panel/storage /var/www/wireguard-panel/bootstrap/cache
sudo chmod -R 777 /var/www/wireguard-panel/

# Run migrations and seed the database
echo "Running migrations and seeding the database..."
php artisan migrate:fresh --seed

# Configure Laravel worker with Supervisor
echo "Configuring Laravel worker with Supervisor..."
sudo curl -o /etc/supervisor/conf.d/laravel-worker.conf https://raw.githubusercontent.com/Caqil/wireguard-panel/master/laravel-worker.conf
sudo chmod 644 /etc/supervisor/conf.d/laravel-worker.conf

# Check contents of laravel-worker.conf
if ! grep -q "\[program:laravel-worker\]" /etc/supervisor/conf.d/laravel-worker.conf; then
    echo "Error: /etc/supervisor/conf.d/laravel-worker.conf is not formatted correctly."
    exit 1
fi

sudo supervisorctl reread
sudo supervisorctl update

echo "WireGuard Panel installation completed. Please navigate to ${APP_URL} to verify the installation."
