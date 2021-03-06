<?php

namespace App\ListCreator;

use \JensVercruysse\HtmlElements\A;
use \JensVercruysse\HtmlElements\Div;
use \JensVercruysse\HtmlElements\H4;
use \JensVercruysse\HtmlElements\I;
use \JensVercruysse\HtmlElements\Li;
use \JensVercruysse\HtmlElements\Ul;

class ListCreator
{

    public function __construct($fileRoute = "", $listIcon = "", $id = [], $title = "", $input = [])
    {
        $this->fileRoute = $fileRoute;
        $this->listIcon = $listIcon;
        $this->id = $id;
        $this->title = $title;
        $this->input = $input;
    }

    public function __toString()
    {
        $listTitleContent = new H4($this->title, ["class" => "center-align"]);
        $listTitle = new Li($listTitleContent, ["class" => "collection-header"]);

        $output = $this->createList();

        $ul = new Ul($listTitle . $output, ["class" => "collection with-header"]);
        $this->content = new Div($ul, ["class" => "container"]);

        return (string) $this->content;
    }

    private function createList()
    {
        $output = "";
        $counter = 0;

        foreach ($this->input as $listItem) 
        {
            $currentId = $this->id[$counter];

            $listIcon = new I($this->listIcon, ["class" => "material-icons"]);
            $listLink = new A($listIcon, ["href" => $this->fileRoute . $currentId, "class" => "secondary-content"]);
            $listIconDiv = new Div($listItem . $listLink);
            $li = new Li($listIconDiv, ["class" => "collection-item"]);

            $output .= $li;
            $counter++;
        }

        return $output;

    }
}
