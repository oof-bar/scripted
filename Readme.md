# ScriptEd

> ScriptEd equips students in under-resourced schools with the fundamental coding skills and professional experiences that together create access to careers in technology.

This repo contains a Wordpress theme designed and developed especially for ScriptEd in the Summer of 2013. It has since been updated, extended and refactored on a number of occasions as the organization grows.

The project is maintained by [oof. Studio](http://oof.studio), but the ScriptEd team and community of volunteers, students and donors has always been deeply committed to its success.

## Technology

You can always refer to the official Wordpress [requirements](https://wordpress.org/about/requirements/), but for maintainability and security, we recommend running the site with a more modern set of tools:

- Unix-based operating system (like a recent distribution of Ubuntu, or OS X for development)
- Apache 2.4+
- PHP 5.6 (Only cursory testing has been done in 7.0)
- MariaDB 10.0+

### Setup

To begin developing locally, it's a good idea to get set up with [Brew](http://brew.sh). If you're unfamiliar, take a moment to read about its benefits, and be aware that [it can take some time to configure](https://coolestguidesontheplanet.com/installing-homebrew-on-os-x-el-capitan-10-11-package-manager-for-unix-apps/) under OS X El Capitan.

#### Code

Clone the repo and its submodules with:

```sh
git clone https://github.com/AugustMiller/scripted.git --recursive /Users/your-username/Sites/scripted
```

We include Wordpress as a submodule to simplify updates and keep this repository nice and lean. The [Kirby Toolkit](https://github.com/getkirby/toolkit) is also used— it's allowed us to maintain a readable codebase, and informed the design of some of our own custom static classes (more on the project structure, later).

#### Local Server

Add a `VirtualHost` to your Apache configuration (it's best to put it in `/etc/apache2/users/your-username.conf`):

```apache
<VirtualHost *:80>
  ServerName scripted.dev
  DocumentRoot "/Users/your-username/Sites/scripted"

  ErrorLog "/private/var/log/apache2/scripted.error.log"
  CustomLog "/private/var/log/apache2/scripted.access.log" common

  SetEnv DB_NAME "db_name"
  SetEnv DB_USER "db_user"
  SetEnv DB_PASSWORD "db_password"
  SetEnv DB_HOST "127.0.0.1"

  SetEnv STRIPE_KEY "{{ Stripe secret key }}"
  SetEnv STRIPE_PUBLISHABLE "{{ Stripe publishable key }}"

  SetEnv MAILCHIMP_API_KEY "{{ Mailchimp API Key }}"
  SetEnv MANDRILL_API_KEY "{{ Mandrill API Key }}"

  <Directory "/Users/your-username/Sites/scripted">
    AllowOverride all
    Require all granted
  </Directory>
</VirtualHost>
```

Replace `DB_*` environment variables with the proper credentials for your database, add any keys that you need for testing, and save. It's important that they're set (event to an empty string), because the theme checks for them when bootstrapping.

Your `/etc/hosts` file also needs a new line, matching the `ServerName` you declared, above:

```
127.0.0.1 scripted.dev
```

In your `php.ini` file, make sure `short_open_tag` is `On`.

Restart Apache (`sudo apachectl restart` on OS X or `sudo service apache2 restart` on other Unix distributions) when you are finished with the above.

#### Front-End

We use [Gulp](http://gulpjs.com) to preprocess and bundle Sass and Coffeescript.

For that, you'll need to have a modern Node installation (`$ brew install node`).

Step into the project's root and run `$ npm install` to install dependencies and tools from `package.json`.

A quick `$ gulp watch` will compile and watch for changes to styles and scripts.

#### Database

A recent database backup from a production or staging machine can be provided by oof. Import it into a database matching the name you provided in your `VirtualHost` environment variable.

## The Theme

### Special Considerations

At first glance, many of the templates and other files in the theme directory may not look like a normal Wordpress theme— we've taken the liberty of extracting common functionality, custom helpers, configuration, hooks, actions, etc. into more bite-size, namespaced static classes. This was initially an effort to make the code feel more like a [Kirby](https://getkirby.com) project than a Wordpress theme.

### Architecture

The `config` folder contains all our custom PHP code— no HTML should go in here (except in rare cases where Kirby's `html` class is used to generate HTML snippets).

#### Hooks + Actions

At the bottom of `functions.php`, you'll notice a funny line:

```php
add_action('all', '\ScriptEd\Actions::respond', 1);
```

This "magic event" forwards _all_ Wordpress hooks to our own responder— just add a static method to the `ScriptEd\Actions` class with the hook name, and it'll run.

#### Configuration + "Convention"

You can follow the theme's initialization by starting at `ScriptEd\Actions::init`.

The `ScriptEd\Helpers` class is apt to contain most of the things you see in standard templates.

As for conventions— the project is in flux, so there remain plenty of things in need of organization, decrufting, sanity-checks, etc. That's where you come in!

Otherwise, the project is still a Wordpress theme at its core, so you can still approach new templates as you normally would.

:deciduous_tree:
