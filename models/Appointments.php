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
        $query = 'SELECT `id`, `dateHour`, `idPatients` FROM `appointments`';

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
    public function updateAppointment($id) {
        $query = 'UPDATE `appointments` SET `dateHour` = :updateDateHour, `idPatients` = :updateIdPatients WHERE `id` = :idAppointment' ; 
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idAppointment', $id, PDO::PARAM_INT);
        $stmt->bindParam(':updateDateHour', $this->dateHour, PDO::PARAM_STR);
        $stmt->bindParam(':updateIdPatients', $_POST['updateIdPatients'], PDO::PARAM_INT);
        $stmt->execute();
    }
    public function deleteAppointment($id) {
        $query = 'DELETE FROM `appointments`  WHERE `id` = :idAppointment' ; 
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idAppointment', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function deleteAppointmentByIdPatients($idPatients) {
        $query = 'DELETE FROM `appointments`  WHERE `idPatients` = :idPatients' ; 
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idPatients', $idPatients, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function isAppointmentExist()
    {
        $query = 'SELECT COUNT(*) AS `number` FROM `appointments` WHERE `dateHour` = :dateHour';
        //on demande à PDO de préparer la requete et de la stocker dans la variable $stmt (statement)
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result->number;
    }
    public function isIdAppointmentTrue($id)
    {
        $query = 'SELECT `id` FROM `appointments` WHERE `id`= :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function getAppointmentsListByOrderDateDateFormat(): array
    { 
            /**
             * Création de la requête SQL
             */
            $query = 'SELECT `app`.`id`, DATE_FORMAT(`app`.`dateHour`, \'%d/%m/%Y %H:%i\') AS `dateHour`, `app`.`idPatients`, `pat`.`lastname`, `pat`.`firstname` FROM `appointments` AS `app` INNER JOIN `patients` AS `pat` ON `app`.`idPatients` = `pat`.`id` ORDER BY `dateHour` DESC';

            return $this->getQueryResult($query);
        
    }
    public function getAppointmentsListByOrderDate(): array
    { 
            /**
             * Création de la requête SQL
             */
            $query = 'SELECT `app`.`id`, `app`.`dateHour`, `app`.`idPatients`, `pat`.`lastname`, `pat`.`firstname` FROM `appointments` AS `app` INNER JOIN `patients` AS `pat` ON `app`.`idPatients` = `pat`.`id` ORDER BY `dateHour` DESC';

            return $this->getQueryResult($query);
    }
    public function showAppointmentPatientInformation($idAppointment):object
    {
        $query = 'SELECT `app`.`id`, `app`.`dateHour`, `app`.`idPatients`, `pat`.`id` FROM `appointments` AS `app` INNER JOIN `patients` AS `pat` ON `app`.`idPatients` = `pat`.`id` WHERE `app`.`id` = :idAppointment';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idAppointment', $idAppointment, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function getAppointmentInfo($idAppointment): object
    {
        /**
         * Création de la requête SQL
         */
        $query = 'SELECT `id`, `dateHour`, `idPatients` FROM `appointments` WHERE `id`= :idAppointment';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idAppointment', $idAppointment, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function getAppointmentsListByOrderDateAndByIdPatients($idPatients)
    {
        $query = 'SELECT `app`.`id`, `app`.`dateHour`, `app`.`idPatients`, `pat`.`id` FROM `appointments` AS `app` INNER JOIN `patients` AS `pat` ON `app`.`idPatients` = `pat`.`id` WHERE `app`.`idPatients` = :idPatients ORDER BY `dateHour` DESC';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idPatients', $idPatients, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}
