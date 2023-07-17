<?php

use App\Models\Metadata;

function get_meta_value($meta_key)
{
    $data = Metadata::where('meta_key', $meta_key)->first();
    if ($data) {
        return $data->meta_value;
    }
}

function setRenderName($name)
{
    $arr = explode(" ", $name);
    $lastName = end($arr);
    $renderName = "<span class='text-primary'>$lastName</span>";
    array_pop($arr);
    $firstName = implode(" ", $arr);
    return $firstName . " " . $renderName;
}

function setListAward($content)
{
    $content = str_replace("<ul>", '<ul class=fa-ul mb-0>', $content);
    $content = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>', $content . '</li>');
    return $content;
}

function setListWorkflow($workflow)
{
    $workflow = str_replace("<ul>", '<ul class="fa-ul mb-0">', $workflow);
    $workflow = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-check"></i></span></li>', $workflow);
    return $workflow;
}
