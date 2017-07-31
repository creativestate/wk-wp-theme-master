Wolters Kluwer Wordpress Theme
==================================
Welcome to the Wolters Kluwer Brand Compliant Wordpress Theme.

This document contains information on how to install and start developing on this project.


1. Requirements
----------------------------------
The minimum requirements you need on your operating system are:

1. Apache 2.x
2. PHP 5.x.x
3. MySQL 5.x.x
4. [Wordpress](https://wordpress.org/download/)
5. NPM as a package manager. If you do not have npm installed, go to [NodeJS download page](https://nodejs.org/en/download/)
6. Gulp. If you do not have gulp installed locally, run the following commands:
```
npm install --global gulp-cli
npm install --save-dev gulp
```


2. Clone Repository
----------------------------------
Clone the repository to your local machine into the wordpress theme directory. Make sure to name the repository "wolterskluwer"


3. Install node modules
----------------------------------
1. navigate with commandline to the root of the project
2. Run `npm install`


4. Build assets with Gulp
----------------------------------
1. Build the assets for the first time: `gulp`
2. After running the build, the watch command will automatically continue to watch for changes. To stop watching enter CTRL+C.
2. You can also run a watch command directly that will only build assets that are changed: `gulp watch`
3. Gulp will build:

- Sass to minified, reordered CSS
- JS to included, combined and minified javascript
- Images to optimized quality and size
- Icon file to favicon and all app icon formats


5. Create wordpress theme bundle
----------------------------------
After gulp has build the assets, create a zip file of the theme folder "wolterskluwer" and make sure not to include the "node_modules" directory.
Now you can upload and configure the wordpress theme into any wordpress installation.