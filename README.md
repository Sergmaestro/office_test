## Eventornado local environment setup

Project is built on Laravel 7.6.2

- Make sure you have installed [composer](https://getcomposer.org/).
- Follow these steps to install Homestead on your local [Homestead](https://laravel.com/docs/7.x/homestead):
    - Before launching your Homestead environment, you must install [VirtualBox 6.x](https://www.virtualbox.org/wiki/Downloads) as well as [Vagrant v.2.2.7](https://www.vagrantup.com/downloads.html).
    - Once VirtualBox and Vagrant have been installed, you should add the `laravel/homestead` (version 9.4.0) box to your Vagrant installation using the following command in your terminal. It will take a few minutes to download the box, depending on your Internet connection speed:
    ```
    vagrant box add laravel/homestead
    ```

    - You may install Homestead by cloning the repository onto your host machine. Consider cloning the repository into a Homestead folder within your "home" directory, as the Homestead box will serve as the host to all of your Laravel projects:
    ```
    git clone https://github.com/laravel/homestead.git ~/Homestead
    ```
    - You should check out a tagged version of Homestead since the master branch may not always be stable. You can find the latest stable version on the GitHub Release Page. Alternatively, you may checkout the release branch which always contains the latest stable release:
    ```
    cd ~/Homestead
    git checkout release
    ```

    - Once you have cloned the Homestead repository, run the bash init.sh command from the Homestead directory to create the Homestead.yaml configuration file. The Homestead.yaml file will be placed in the Homestead directory:
    ```
    // Mac / Linux...
    bash init.sh

    // Windows...
    init.bat
    ```
- Run commands from project root directory:
    ```
    vagrant up
    vagrant ssh
    cd code
    ```
- Run command `composer install` to load php packages
- Run command `npm install` to load js packages
- Run command `npm run dev` or `npm run prod` to compile js/css assets
- If you didn't add app url to the host file, please run `php artisan serve`. Otherwise, you could skip this step.
- Finally, run `php artisan migrate` to run migrations
