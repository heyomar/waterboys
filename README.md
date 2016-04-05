# HLKPress
## Simple, modernized development workflow for WordPress + HLK Opinionation

hoboPress is a modernized yet versatile workflow for WordPress apps. It's set up
for easier portability of app code, better management of WordPress using
Composer, quick access to a running Vagrant box, and environment management.

It's also meant to be agnostic to deployment strategies, containing only three
small, unrequired must-use plugins. Aside from some app configuration, it
contains no major changes to core WordPress that should affect your development.

If for some reason you must work with a pre-deployed WP install instead of being
able to set it up yourself, you will have to make directory edits in
`/index.php` and `/wp-config.php`.

## Requirements
* Vagrant or the following:
  * PHP 5.5 or higher
  * MariaDB, Percona XtraDB, or MySQL
  * Composer (required for dev)

## Setup
If you have VirtualBox installed, you can use the current version, or if you
don't, Vagrant will download known-stable versions for you. Install the two
necessary Vagrant plugins also using the commands
`vagrant plugin install vagrant-triggers` and
`vagrant plugin install vagrant-hostsupdater`

App code should be stored in `/app`. When you first download the repo, a simple
`composer install` will add all of the dependencies you need. `vagrant up` will
start your VM at the address defined in `Vagrantfile` and your `.env`. You will
see a fail message when you try to boot your VM if you don't have a `.env` file.

## Vagrant Machine Actions
A halt, suspend, or destroy command will trigger an SQL dump into the
`/databases` folder to insure there is no unintentional data loss. It is not
saved in the repo and it is not recommended you do so either, although it is
just text.

## Testing Mailers
If you have a function or plugin that sends mail, you can test these using the
MailCatcher plugin that comes preinstalled on Scotch Box. SSH into your Vagrant
box and ru the command `mailcatcher --http-ip:0.0.0.0`. You can then see the
sent emails over a web interface on port 1080.

## MySQL Database Access
You can access MySQL from Vagrant SSH or through a GUI such as Sequel Pro. If
you are unsure of how to do this, review the Scotch Box documentation on the
subject here: <https://box.scotch.io/#database-access>

The database will be dumped on a potentially destructive Vagrant action, but you
should also consider using a database backup plugin in WP for extra safety and
to run regular backups.
