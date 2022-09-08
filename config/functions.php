<?php
/* 
    Permet de mettre en forme une date enregistrée 
    selon le format d'entrée $formatInput 
    et le format de sortie $formatOuput
*/
function changeDate(string $date, string $formatInput, string $formatOutput): string
{
    $d = DateTimeImmutable::createFromFormat($formatInput, $date);
    return $d->format($formatOutput);
}
function validateDate($date, $format)
{
    $d = DateTimeImmutable::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}