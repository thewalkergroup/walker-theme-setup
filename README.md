# Walker Theme Setup for Sage-based Themes
Short order template drop-in setup

## Reqirements
1. A site theme built with [Roots/Sage](https://github.com/roots/sage) (tested with version 8)

## Usage
1) Navigate to `[your-theme-name]/lib`

2) Clone this project:
````{r, engine='bash', count_lines}
$ git clone --depth=1 git@github.com:thewalkergroup/walker-theme-setup.git && rm -rf walker-theme-setup/.git
````
3) Edit `[your-theme-name]/functions.php` and add the following to the `$sage_includes` array:
````{r, engine='php', count_lines}
  'lib/walker-theme-setup/walker_includes.php'            // Add Walker-specific theme setup
````
