<?php
$config = array(
    array(
        'field' => 'nom',
        'label' => 'nom',
        'rules' => 'required|min_length[3]|max_length[50]',
        'errors' => array(
            'required'  => 'Merci de rentrer le %s du produit',
            'min_length' => 'Le %s doit avoir au moins 3 lettres',
            'max_length' => 'Le %s doit avoir au maximum 50 lettres',
        ),
    ),
    array(
        'field' => 'description',
        'label' => 'description',
        'rules' => 'required|min_length[3]|max_length[250]',
        'errors' => array(
            'required'  => 'Merci de rentrer la %s du produit',
            'min_length' => 'La %s doit avoir au moins 3 lettres',
            'max_length' => 'La %s doit avoir au maximum 250 lettres',
        ),
    ),
    array(
        'field' => 'categorie',
        'label' => 'categorie',
        'rules' => 'required|min_length[3]|max_length[50]',
        'errors' => array(
            'required'  => 'Merci de rentrer la %s du produit',
            'min_length' => 'La %s doit avoir au moins 3 lettres',
            'max_length' => 'La %s doit avoir au maximum 50 lettres',
        ),
    ),
    array(
        'field' => 'illustration',
        'label' => 'illustration',
        'rules' => 'uploaded',
        'errors' => array(
            'uploaded'  => 'Merci d\'inserer une %s du produit'
        ),
    ),
    array(
        'field' => 'prix',
        'label' => 'prix',
        'rules' => 'required|alpha_numeric',
        'errors' => array(
            'required'  => 'Merci de rentrer le %s du produit',
            'alpha_numeric' => 'Le %s doit être un chiffre'
        ),
    )
);