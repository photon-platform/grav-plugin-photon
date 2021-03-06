# photon ✴ COMMAND

a set of command lines tools and resources to facilitate customization of content development components for **photon**

- plugin generators
  - **DATATYPE** plugin scaffolds
  - components?

- theme generators
  - particularly for photon **child** themes

- common `languages.yaml` for generated plugins

photon Tools plugin should be a dependency

This started as a [Grav](http://github.com/getgrav/grav) `devtools` Plugin 1.2.1 that lets you quickly create a scaffolding for your new plugins and themes.  The plugin provides CLI commands that allow for the quick and easy deployment of a sample scaffolding for your new plugin.

# Installation


## GPM Installation (Preferred)

> NOTE: this plugin has not been submitted to the Grav Package Manager yet.

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm).  From the root of your Grav install type:

    bin/gpm install photon

## Manual Installation

If for some reason you can't use GPM you can manually install this plugin. Download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `photon`.

You should now have all the plugin files under

	/your/site/grav/user/plugins/photon

# Usage

## Plugin Scaffolding

To create a new plugin you simply need to run: `bin/plugin photon newplugin` and fill in the few questions at the prompts:

```
> bin/plugin photon newplugin
Enter Plugin Name: MyPlugin
Enter Plugin Description: My New Custom Plugin
Enter Developer Name: dev_name or github id
Enter Developer Email: you@yourdomain.com

SUCCESS plugin myplugin -> Created Successfully

Path: /home/johnnyr/webroot/grav-installation/user/plugins/myplugin
```

## Theme Scaffolding

To create a new theme you simply need to run: `bin/plugin photon new-theme` and fill in the few questions at the prompts:

```
> bin/plugin photon newtheme
Enter Theme Name: MyTheme
Enter Theme Description: My New Custom Theme
Enter Developer Name: dev_name or github id
Enter Developer Email: you@yourdomain.com
Please choose a template type
  [pure-blank ] Basic Theme using Pure.css
  [inheritance] Inherit from another theme
  [copy       ] Copy another theme
 > pure-blank

SUCCESS theme mytheme -> Created Successfully

Path: /home/johnnyr/webroot/grav-installation/user/themes/mytheme
```

There are **three template creation options**

1. `pure-blank` - This is a very basic blank theme that uses the [Pure CSS framework](http://purecss.io/)
2. `inheritance` - This creates a very basic template with minimal files that inherits a base theme.  To find out more about theme inheritance, [check out the subject in more details on the Grav Learn site](https://learn.getgrav.org/themes/customization#theme-inheritance).
3. 'copy' - This allows you to create a new theme based on an existing theme.  This is the simplest way to get started with a new theme by using another theme as the basis.
