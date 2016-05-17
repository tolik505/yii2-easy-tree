<?php

namespace tolik505\tree;

use tolik505\tree\TreeAsset;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Class TreeWidget
 * @package tolik505\tree
 */
class TreeWidget extends Widget
{
    /**
     * List of categories
     * @var
     */
    public $items = [];

    /**
     * container div tag id
     * @var mixed
     */
    public $id = 'tree';

    /**
     * Plugin options
     * @var array
     */
    public $options = [];


    /**
     * Initializes the widget
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Render tree
     * @return string|void
     */
    public function run()
    {
        $this->options['data'] = $this->prepareItems();
        echo Html::tag('div', '', ['id' => $this->id]);
        $this->registerAssets();
    }

    /**
     * Register client assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        TreeAsset::register($view);
        $js = '$("#' . $this->id . '").easytree(' . $this->getOptions() . ');';
        $view->registerJs($js, $view::POS_END);
    }

    /**
     * Get plugin options
     * @return string
     */
    public function getOptions()
    {
        return Json::encode($this->options);
    }

    /**
     * @return array
     */
    function prepareItems()
    {
        $items = $this->items;
        $u = null;
        $markAsFolder = function(&$item, $key, $u) {
            if (empty($item['url']) && is_array($item)) {
                if (isset($item['label'])) {
                    $item['isFolder'] = true;
                }
                if (!empty($item['items']) && $u) {
                    array_walk($item['items'], $u, $u);
                }
            }
        };
        array_walk($items, $markAsFolder, $markAsFolder);

        return $items;
    }


}
