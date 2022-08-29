<?php

class Form
{

    private $params;
    private $errors = [];
    /*
    public $regex = "/^[a-zâêîôûäëïöüàèìòùé]{1,50}$/"; */
    public $regex = "/^([0-9a-zA-Z]){2,20}$/:";
    private $messages = [
        'minlenght' => "Le champ %s requis minimum %d caractères",
        'maxlenght' => "Le champ %s requis maximum %d caractères",
        'email' => "Le champ %s doit être un email valide",
        'regexPassword' => "Le champ %s doit contenir au moins 1 majuscule, 1 minuscule et 1 chiffre",
    ];
    private $controls = ['minlenght', 'maxlenght', 'email', 'regexPassword'];

    public function __construct($params)
    {
        $this->params = $params;
    }

private function has($field)
{
    return array_key_exists($field, $this->params);
}
private function addError($rule, $field, $options = null)
{
    $this->errors[$field][] = sprintf($this->messages[$rule], $field, $options);
}

private function minlenght(string $field, int $min = 5)
{
    if (mb_strlen($this->params[$field]) <= $min) {
        $this->addError('minlenght', $field, $min);
    }
}

private function maxlenght(string $field, int $max = 5)
{
    if (mb_strlen($this->params[$field]) > $max) {
        $this->addError('maxlenght', $field, $max);
    }
}

private function email(string $field)
{
    if(!filter_var($this->params[$field], FILTER_VALIDATE_EMAIL)) {
        $this->addError('email', $field);
    }
}

private function regexPassword(string $field, $regex)
{
    if(!preg_match(($this->params[$field]), $regex)) {
        $this->addError('regexPassword', $field);
    }
}
private function isUnique($field, $db) 
{
    $rs = $db->find($field);
    if (!empty($rs)) {
        $this->addError('unique', $field);
    }
}

private function between(string $field, string $param) 
{
    $nbrs = explode(':', $param);
    if ($this->minlenght($field, (int) $nbrs[0]) || $this->maxlenght($field, (int) $nbrs[1])) {
        return true;
    }
}

private function valide($items) 
{
    foreach ($items['controls'] as $control => $param) {
        if (in_array($control, $this->controls)) {
            $this->$control($items['champs'], $param);
        }
    }
}

public function check($controls)
{
    foreach ($controls as $champs =>$rules) {
        if ($this->has($champs)) {
            $this->valide([
                'champs' => $champs,
                'controls' => $rules,
                'valeurs' => $this->params[$champs]
            ]);
        }
    }
}
public function getErrors()
{
    return $this->errors;
}

public function getError($name)
{
    $r = $this->errors[$name] ?? false;
    return $r;
}

}


?>