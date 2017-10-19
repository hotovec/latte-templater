# Standalone Latte Template boilerplate

Simple standalone boilerplate for developing Latte templates without NETTE. 

## Features

- Integrated PHP server
- Template data stored in YAML
- Foundation 6.4.3
- NPM Gulp pipeline for building dev/prod versions
- Typescript compilation incl. Webpack bundling
- Linking and bundling third-party JS libs and CSS
- All JS dependencies are handled by NPM and bundled to single file (see Configs)
- Browser sync auto reload including *.latte templates

#### Requirements:
- NodeJS (>6.5)
- Php (>5.6)
- Composer (globaly or localy)


## Default modules
- Basic Layout
- Opengraph tags
- Favicons
- Device Icons
- Typekit integration
- Google Analytics Integration

## Install
Installing PHP, NODE, Composer is not a feature of this tool. See Google for help.

1) Clone repository 
2) Optionally remove GIT repository link and history (you can remove ```rm -rf .git``` folder )
3) Install dependencies (Node)
``` npm install```
4) Check your PHP & composer installed. If not - install PHP and composer.
5) Install PHP dependencies ```cd htdoc``` ```composer install```


### Run the pipeline 

##### Run Php server (default 127.0.0.1:8000)
```
> cd server
> bash ./server.sh
```

##### Run JS/SASS/TS compilation

```
# from root of the project
> gulp server
```

### Configs

```src/build``` folder contains links to libraries for bundling

```src/app``` folder contains aplication JS/TS

```src/styles``` folder contains styles (SCSS)

```data/data.yml``` structured data injected to each template

```templates/*``` latte templates

```templates/htdoc``` PHP server (public folder)


### Show different template

You can select different template to render thru GET parameter ```?t=templatename_without_latte_extension```

```
# load /templates/components.latte
http://localhost:3000?t=components
```

```index.latte``` is default.

## Notes:
- This package does not include NETTE installation. It is standalone template builder. (I never did something in NETTE)
- I do not care about handling bugs. It is first quick scaffold to make pipeline working.

## LATTE WTF
- Latte can't understand minified JS in some cases. It will throw Fatal Error. It is caused by the syntax of LATTE macros. Minified JS heavily uses the same syntax. ```<script n:syntax="off"></script>``` is solution!
