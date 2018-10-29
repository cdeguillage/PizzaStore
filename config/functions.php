<?php

// Formate et stylise les prix
function formatPrice($price) {
    $price = str_replace('.', ',', $price);
    $first = substr($price, 0, -2);
    $cents = substr($price, -2);
    return $first."<sup>".$cents."</sup> €";
}
