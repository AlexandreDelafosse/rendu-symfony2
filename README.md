# rendu-symfony2 Alexandre Delafosse

### Initialization 

- Clone the project
- run composer install

Wait for the installation

Copy the .env and paste it

Change the name by " env.local "

Link your Database on line 27 and comment line 28

You must hydrate your dabase with users so you need to run 

- php bin/console doctrine:fixtures:load

Now we have the users but we need to hydrate the rest of the data 

So run php bin/console app:importapidata


Then if you want too see the api 

- run symfony serve 

Ctrl + click on the link showed by the IDE 

go to "yoururlshowed/api"

You see the api platform interface 


If you want to connect as an admin go to 

"yourlinkshowed/admin"

Enter your informations that are in your database

On the url "yourlinkshowed/admin" you are now connected and create new data in admin interface, modify and delete datas.
