# Location-php-symfony

​		Version de Symfony: 4.4  

​		Boostrap 4.6: https://getbootstrap.com/docs/4.6/getting-started/introduction/ 

## A. Local

1. ### Install Composer

   https://getcomposer.org/download/ : [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe)  

   Quand on utilise composer, le cœur de tout son fonctionnement est un fichier JSON appelé composer.json. C'est dans ce fichier nous allons mentionner nos dépendances et leur version.  

   <p align="center">
      <img src='https://user-images.githubusercontent.com/57065970/112849382-4cf61300-90a9-11eb-98d1-76f786b97f08.png' alt="" width="500"/>
   </p>


   Reverify: *composer –V  

   <p align="center">
      <img src='https://user-images.githubusercontent.com/57065970/112849732-9f373400-90a9-11eb-8cd3-fcb3b526956d.png' alt="" width="900"/>
   </p>


   !!! Attention: extention Xdebug va embêter l’installation de Composer. Il faut la désactiver en mettant en commentaire la partie de configuration Xdebug dans le fichier php.ini

   <p align="center">
       <img src='https://user-images.githubusercontent.com/57065970/112845899-af4d1480-90a5-11eb-9ae2-930e18ed91d1.png' alt="" width="500"/>
      <img src='https://user-images.githubusercontent.com/57065970/112835837-19f85300-909a-11eb-9f25-1617905948d0.png' alt="" width="900"/>
   </p>


   and  Décocher Xdebug extension

   <p align="center">
      <img src='https://imgur.com/0vNUiHJ.png' alt="" width="900"/>
   </p>


2. ### Install symfony project => local repository

   - #### Init symfony project 

     in laragon terninal, run: *composer create-project symfony/website-skeleton symfony4-project "^4.4"*
     with api: *composer create-project symfony/skeleton my_project_name*
   
     <p align="center">
     <img src='https://imgur.com/AvAxDSb.png' alt="" width="900"/>
     </p>

     Result: init symfony project
   
     <p align="center">
     <img src='https://imgur.com/7D2z370.png' alt="" width="500"/>
     </p>

   - #### Install symfony server
   
     vao trong project & run: *composer require server --dev*  -> on va pas utiliser le server Apache
   
     <p align="center">
        <img src='https://imgur.com/rYY72qF.png' alt="" width="500"/>
     </p>
   
     - run: *composer require symfony/apache-pack*
   
   
     Pour que la toolbar de débug s'affiche, il faut installer la dépendance apache-pack: create .**htaccess** file 

- #### Slugify

  *composer require cocur/slugify* 

- #### Fixture 

  *composer require orm-fixtures --dev*


## B. Start Work
