# phtml-template

一个结合了PHP和Webpack的前端模块开发脚手架。

这不是一个现代流行的开发模式，但可以帮你高效的写出漂亮的静态网站。

源于帮朋友写企业站的静态模板，有10来个页面的html+css要处理，其中很多的代码在每个页面中都会出现。大量的重复的代码，想到后期有可能要修改，后怕！习惯了前后端分离的工程化写法，感觉再也回不去写一个页面一个页面的静态文件和裸奔的CSS了，于是就有了这个项目。

## 特点
1. scss写样式，结构清晰，好维护；
1. php拆分模板文件（组件化），方便后期修改维护；
3. 生成html、css和js，方便交付；

## 开发环境需求
* PHP 7+
* NodeJS 12+

## 开始使用
克隆本项目
```sh
git clone git@github.com:ziyoren/phtml-template.git
```

安装Webpack等依赖
```sh
npm install
```

启动开发
```sh
npm start
```
单独构建css、js
```sh
npm run build
```
单独构建HTML文件
```sh
npm run build:html
```
发布项目：
```sh
npm run release
```

## 目录结构
```sh
├── buildHTML                   #将PHP模板构建为HTML的主要工具
├── composer.json               #php composer配置文件
├── dist                        #构建目标目录，发布后的代码在这里
├── package.json
├── page.json                   #php模板配置文件
├── php                         #php的工作目录（含示例）
│   ├── template                #页面模板目录
│   │   ├── index.php             #默认模板（示例）
│   │   └── layout-main.php       #模板示例二
│   ├── 404.php                   
│   ├── autoload.php              #自动加载代码
│   ├── footer.php                #示例：footer部分代码
│   ├── header.php                #示例：header部分代码
│   ├── index.body.php
│   ├── index.php                 #重要：入口文件
│   ├── menu.php
│   └── news
│       └── news.body.php
├── src
│   └── assets
│       ├── css                    #样式示例代码
│       │   ├── home.scss
│       │   ├── lib
│       │   │   ├── body-box.scss
│       │   │   ├── common.scss
│       │   │   ├── footer.scss
│       │   │   ├── header.scss
│       │   │   ├── main-box.scss
│       │   │   ├── menu.scss
│       │   │   └── variable.scss
│       │   └── styles.scss
│       └── js
│           └── styles.js         #js入口文件
├── vendor
│   └── ziyoren/html-template     #php核心库                  
└── webpack.config.js             #webpack配置文件
```

## page.json

示例：
```json
{
    "template": "template/index", 
    "pages": [
        {
            "title": "首页",
            "name": "index",
            "component": "index.body",
            "template": "template/layou-main",
        },
        {
            "title": "关于我们",
            "name": "about",
            "component": "about.body"
        },
        //......
    ]
}
```

### page.json配置说明
#### template
* 类型： `string`
* 默认： `template/index`
* 说明：整个项目的基础布局模板。基于php工作目录的相对路径，即对应`php/template/index.php`文件，配置中可省略`.php`的扩展名。

#### pages
* 类型： `json[]`
* 说明：多页面配置数组。由一个或多个页面描述配置json组成。

**title**
* 类型： `string`
* 说明：页面显示的title。可由PHP代码`ziyo::title()`获取并输出在模板中。

**name**
* 类型： `string`
* 说明：每个页面唯一的名称。同时也是生成静态文件的文件名

**component**
* 类型： `string`
* 说明：指定页面的组件模板。是基于php工作目录的相对路径，`.php`扩展名可心省略。

**template**
* 类型： `string`
* 说明：指定本页面的基础模板。优先级高于根节点的template。

## PHP相关代码

### ziyo::title($default='undefined')
输出page.json指定的页面title，如果获取不到则输出$default。
```php
<?php ziyo::title(); ?>
```

### ziyo::require(String $path)
导入指定的模板文件，$path是基于php工作目录的相对路径，`.php`扩展名可心省略。

### ziyo::RouteView()
导入指定的组件模板文件。由page.json的component配置指定组件路径。

### ziyo::className(String $prefix)
输出一个由`$prefix__当前页面名称`形式的样式名称。
```php
ziyo::className('header');  //输出如：header__index  
```

### ziyo::link(String $name, $text = '', $options=[])
输出指定页面名称的超链接。开发调试时输出的为动态queryString链接，构建时输出静态链接`[name].html`。
> **$name**: `string` page.json配置页面对应的name
>
> **$text**: `string` 超链接显示的文本
>
> **$option**: `array` 其他配置项。如hash、target等

### 共享的头部代码
如果要用到以上PHP方法，请在对应的模板文件头部加上以下代码
```php
<?php
require_once __DIR__ . '/autoload.php';

use Ziyoren\HtmlTemplate\ziyo;
?>
```