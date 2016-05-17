Yii2 menu tree widget
=====================
Widget for menu displaying in tree format. Based on http://www.easyjstree.com
Optimized for yii\bootstrap\Nav

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist tolik505/yii2-easy-tree "*"
```

or add

```
"tolik505/yii2-easy-tree": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \tolik505\tree\TreeWidget::widget([
        'items' => [
                       [
                           'label' => Yii::t('app', 'Users'),
                           'items' => [
                               [
                                   'label' => Yii::t('app', 'Users'),
                                   'url' => ['/user/admin/index'],
                               ],
                               [
                                   'label' => Yii::t('app', 'Location'),
                                   'items' => [
                                       [
                                           'label' => Yii::t('app', 'Region'),
                                           'url' => ['/location/region/index'],
                                       ],
                                       [
                                           'label' => Yii::t('app', 'City'),
                                           'url' => ['/location/city/index'],
                                       ],
                                   ]
                               ],
                           ]
                       ],
                       [
                           'label' => Yii::t('app', 'Translations'),
                           'items' => [
                               [
                                   'label' => Yii::t('app', 'Translations'),
                                   'url' => ['/i18n/default/index'],
                               ],
                               [
                                   'label' => Yii::t('app', 'Language'),
                                   'url' => ['/language/language/index'],
                               ],
                           ],

                       ],
        ],
        'options' => [
            'minOpenLevels' => 5
        ]
    ]); ?>```
