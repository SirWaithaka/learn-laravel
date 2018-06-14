<?php

function presetPrice($price)
{
    return money_format('$%i', $price / 100);
}