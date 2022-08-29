<?php
class Appointments extends Db
{
    public int $id;
    public ?string $dateHour = null;
    public ?int $idPatients = null;



    /**
     * Méthode qui permet de récupérer la liste complète des clients.
     *
     * @return array
     */
    public function getAppointmentsList(): array
    {
        /**
         * Création de la requête SQL
         */
        $query = 'SELECT `id`, `dateHour`, `idPatients` FROM `patients`';

        return $this->getQueryResult($query);
    }
    /**
     * Méthode qui permet d'envoyer des données d'entrée d'un horaire de RDV d'un patient d'un formulaire pour les inclure dans la base de données.
     *
     * @return array
     */
    public function createAppointment()
    {
        $query = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour, :idPatients)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':dateHour', $_POST['dateHour'], PDO::PARAM_STR);
        $stmt->bindParam(':idPatients', $_POST['idPatients'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function __destruct()
    {
    }
}
