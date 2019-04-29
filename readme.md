# UI Loader app

The UI loader app enables you to load admin UI assets (CSS, Javascript and favicon). The app comes with zero UI assets. It just loads them for you.


## Why?

While Perch has a [built-in way](https://docs.grabaperch.com/api/custom-ui/) to allow you to load your admin UI assets to customise the control panel without the need of a third-party app, Perch (as of v3.1.4) does not load these assets in the `<head>` as [Jay George](https://github.com/JayGeorge) notes in the readme of his [Perch admin styling app](https://github.com/JayGeorge/jaygeorge_perch_admin_style#why-you-wouldnt-just-follow-the-default-ui-customisation-documentation).

> This results in a "flicker" as the stylesheet is output after the body. While this may not be an issue for small CSS modifications, if you load even a moderate amount of CSS, traversing the admin quickly becomes distracting.


## Installation
* Download the latest version of the app.
* Unzip the download
* Place the `pipit_ui_loader` folder in `perch/addons/apps`

## Requirements
* Perch or Perch Runway 3.0 or higher


## Configuration

The app does not care where you place your files as long as they can be loaded in the browser. So you need to tell the app what you want to load.

### 1. Create your UI Loader configuration file

This file can be called anything you want and can be placed any where you want. 

A good place would be `/perch/addons/plugins/ui` as this is where you would add your `_config.inc` if you were loading the UI assets in the [normal way](https://docs.grabaperch.com/api/custom-ui/).

You can add multiple CSS and JS files:

```php
return [
    'css' => [
        '/perch/addons/plugins/ui/my_css_file.css',
        '/perch/addons/plugins/ui/my_css_file_2.css'
    ],

    'js' => [
        '/perch/addons/plugins/ui/my_javascript_file.js'
    ],

    'favicon' => '/assets/img/favicon',
];
```

You can use `pipit_ui_config.php` as a template and modify it as you need.


**Note:** loading Javascript files in the way outlined in [Perch docs](https://docs.grabaperch.com/api/custom-ui/) should be adequate in most cases. Nonetheless you can choose to load your Javascript files through the app too.



### 2. Add configuration file path

Now you need to tell the app where to get your configuration file `pipit_ui_config.php` from. In your Perch config file `perch/config/config.php`:


```php
define('PIPIT_UI_LOADER_FILEPATH', PERCH_PATH . '/addons/plugins/ui/pipit_ui_config.php');
```

So you are in control over what the `pipit_ui_config.php` is named and where it is placed.