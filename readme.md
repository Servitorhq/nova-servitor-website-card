# Nova Servitor Website Card
> Simple card for Laravel Nova to show your website/monitor stats from [Servitor.io](https://servitor.io)
  
 ![Servitor Website Card](https://raw.githubusercontent.com/Servitorhq/nova-servitor-website-card/master/screenshot.png)
 
 ### Installation
 First you shoudl require this package in your composer.json file, you can do this be executing the following command:
 ```
composer require servitorhq/nova-servitor-monitor-card
 ```
 
 ### Usage
 After that you need to add the card in either your `NovaServiceProvider.php` file or a resource. To show it on your dashboard you should add it to your service provider like so:
 ```php
    /**
      * Get the cards that should be displayed on the Nova dashboard.
      *
      * @return array
      */
     protected function cards()
     {
         return [
             (new NovaServitorMonitorCard())->setMonitor('servitor.io'),
         ];
     }
 ```
 
 Do not forget to set the desired website using `->setMonitor('mydomain.tld')`.
 
 > Please note: `mydomain.tld` should be a valid monitor on [Servitor.io](https://servitor.io). If you don't have an account yet you can register [here](https://servitor.io/register) for free. 😄
 
 ### Bugs / Issues / Ideas
 Please create an issue using the [issue tracker](https://github.com/Servitorhq/nova-servitor-website-card/issues) or drop us an email.