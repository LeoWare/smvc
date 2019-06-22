<?php
/**
 * Bootstrap navbar class
 */

namespace App\Bootstrap;

/**
 * Bootstrap navbar class
 */
class Navbar implements \Countable
{
    private $items;
    private $brand;
    private $toggleButton;
    private $theme;

    /**
     *
     */
    public function __construct()
    {
        $this->items = new \SplObjectStorage();
        $this->brand = null;
        $this->toggleButton = null;
        $this->theme = null;
        $this->expand = null;
    }

    /**
     * Add a NavbarItem by reference
     *
     * @param NavbarItem &$item
     *
     * @return bool
     */
    public function addItem(NavbarItem &$item): bool
    {
        // if(!in_array($item, $this->items)) {
        //     $this->items[count($this->items)] = $item;
        //     return true;
        // }
        $this->items->attach($item);
        return false;
    }

    /**
     * Remove a NavbarItem by Reference
     *
     * @param NavbarItem &$item
     *
     * @return bool
     */
    public function removeItem(NavbarItem &$item): bool
    {
        // for($i = 0; $i < count($this->items); ++$i) {
        //     if($this->items[$i] === $item) {
        //         unset($this->items[$i]);
        //         return true;
        //     }
        // }
        $this->items->rewind();
        while($this->items->valid()) {
            $collection_item = $this->items->current();
            if($item === $collection_item) {
                $this->items->detach($item);
                unset($collection_item);
                return true;
            }
            $this->items->next();
        }
        return false;
    }

    /**
     * Returns an array of NavbarItems
     *
     * @return array
     */
    public function getItems(): Object
    {
        return $this->items;
    }

    /**
     * Returns an array of NavbarItems
     *
     * @return NavbarItem | null
     */
    public function getItemByIndex(int $index)
    {
        if(isset($this->items[$index])) {
            return $this->items[$index];
        }
        return null;
    }

    public function setBrand($brand): Navbar
    {
        $this->brand = $brand;
        return $this;
    }

    public function setToggleButton($elementId): Navbar
    {
        $this->toggleButton = $elementId;
        return $this;
    }

    public function setTheme($theme): Navbar
    {
        if($theme == "light") {
            $this->theme = "navbar-light bg-light";
        } elseif($theme == "dark") {
            $this->theme = "navbar-dark bg-dark";
        }

        return $this;
    }

    public function setExpand($expand): Navbar
    {
        if($expand == "small") {
            $this->expand = "navbar-expand-sm";
        } elseif($expand == "medium") {
            $this->expand = "navbar-expand-md";
        } elseif($expand == "large") {
            $this->expand = "navbar-expand-lg";
        } elseif($expand == "xlarge") {
            $this->expand = "navbar-expand-xl";
        }

        return $this;
    }
    public function count()
    {
        return count($this->items);
    }

    /**
     *
     * @return string
     */
    public function render($currentUri = ""): string
    {
        $output = '<nav class="navbar ' . $this->expand . ' ' . $this->theme .'">';
        $output .= $this->_renderBrand();
        $output .= $this->_renderToggleButton();
        $output .= '<div';
        $output .= (is_null($this->toggleButton)) ? "" : ' class="collapse navbar-collapse" id="' . $this->toggleButton . '"';
        $output .= '>'. "\n" .'<ul class="navbar-nav mr-auto">';
        foreach($this->items as $item) {
            $output .= '<li class="nav-item"><a class="nav-link';

            if($item->uri == $currentUri) {
                $output .= ' active';
            }
            $output .= '" href="' . $item->uri . '">' . $item->title .
                '</a></li>';
        }
        $output .= '</ul></div></nav>';

        return $output;
    }

    private function _renderBrand()
    {
        $output = "";

        if(!is_null($this->brand)) {
            $output = "<a class=\"navbar-brand\" href=\"#\">". $this->brand . "</a>";
        }

        return $output;
    }

    private function _renderToggleButton(): string
    {
        $output = "";

        if(!is_null($this->toggleButton)) {
            $output = '<button class="navbar-toggler" type="button" ' .
                'data-toggle="collapse" data-target="#' . $this->toggleButton . '" ' .
                'aria-controls="' . $this->toggleButton . '" aria-expanded="false" ' .
                'aria-label="Toggle navigation">' .
                '<span class="navbar-toggler-icon"></span>' .
                '</button>';

        }

        return $output;
    }
}
