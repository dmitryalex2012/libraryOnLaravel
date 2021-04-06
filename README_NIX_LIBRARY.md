Loading project algorithm.

1. Make project cloning from GIT.
2. Load libraries to project using command "composer install" in terminal.
3. Create the "libraryonlaravel" DB. Make sure the "DB_USERNAME" and "DB_PASSWORD" in ".env" are match yours.
4. Make migration using command "php artisan migrate" in terminal.
5. Make seeding using command "php artisan db:seed" in terminal.
6. Configure the local web server (domain name and folder, nginx, php from 7.2.5, mysql etc).
7. Configure the local web server and ".env" file for mail sanding through "smtp" server.
8. Install "Laratrust" according to https://laratrust.santigarcor.me/docs/6.x/installation.html.

P. S.
1. (For item 7) Setting for mail sending (set "tls" instead of "ssl"):
\vendor\swiftmailer\swiftmailer\lib\classes\Swift\Transport\StreamBuffer.php
   
   inside method private function establishSocketConnection()
   
   after this code
   
   $options = array();
           if (!empty($this->params['sourceIp'])) {
               $options['socket']['bindto'] = $this->params['sourceIp'].':0';
           }
   then add this two lines
   
   $options['ssl']['verify_peer'] = FALSE;
   $options['ssl']['verify_peer_name'] = FALSE;