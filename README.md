# PokedexApp



Pokedex is the dictionary of pokemons. All the pokemons can be accessed either through the list or by searching. Pokemon Image is displayed and few attributes of the particular pokemon.  

### Tech

Pokedex uses a number of open source projects to work properly:

* XAMPP 
* Composer
* PHP 5.4.0
* Yii Framework 2.0
* JavaScript
* Ajax



### Installation

Download XAMPP server from https://www.apachefriends.org/index.html and install it on your machine.


Install the Composer

```sh
php composer-setup.php --install-dir=bin --filename=composer
```
To install Yii framework. 
```
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic basic

```
* Download the project from Github and place it inside the HTDOCS folder.
![alt text](http://www.dwuser.com/education/content/why-you-need-a-testing-server-and-how-to-do-it/images/drupal-folder.jpg)
* After this your project will be accessible on http://localhost/JaduTest/basic/web/index.php .
* This is the landing page of the Pokedox application.
![Screenshot](https://github.com/devrushi/PokedexApp/blob/master/JaduTest/basic/landingPage.png?raw=true)

* The Pokemon details can be accessed either by clicking on their name from the list..
![Screenshot](https://github.com/devrushi/PokedexApp/blob/master/JaduTest/basic/ListSelectionResult.png?raw=true)

* Or by entering the name of the pokemon in the search box.
![Screenshot](https://github.com/devrushi/PokedexApp/blob/master/JaduTest/basic/SearchBoxResults.png?raw=true)

  * The Search functionality only accepts Uppercase(A-Z) and Lowercase(a-z) alphabets and hyphen(-) in special characters up to 30 characters only.
  * For any wrong input alert box will be displayed.
  ![Screenshot](https://github.com/devrushi/PokedexApp/blob/master/JaduTest/basic/AlertMsg.png?raw=true)
  
  

* If the selected pokemon doesnt have any image by default a Pokeball will be displayed in the image box. 
![Screenshot](https://github.com/devrushi/PokedexApp/blob/master/JaduTest/basic/NoImage.png?raw=true)