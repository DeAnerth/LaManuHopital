<?php
class Patients extends Db
{
    public int $id;
    public string $lastname;
    public string $firstname;
    public string $birthdate;
    public string $phone;
    public string $mail;
    public array $error;

    // public ?string $lastname = null;
    // public ?string $firstname = null;
    // public ?string $birthdate = null;
    // public ?string $phone = null;
    // public ?string $mail = null;



    /**
     * Méthode qui permet de récupérer la liste complète des clients.
     *
     * @return array
     */
    public function getPatientsList(): array
    {
        /**
         * Création de la requête SQL
         */
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients`';

        return $this->getQueryResult($query);
    }
    public function getPatientListByOrder(): array
    {
        /**
         * Création de la requête SQL
         */
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` ORDER BY `lastname` ASC';

        return $this->getQueryResult($query);
    }

    /**
     * Méthode qui permet d'envoyer des données d'un patient d'un formulaire pour les inclure dans la base de données.
     *
     * @return array
     */

    public function createPatient()
    {
        // : est un  marqueur nommé et ? est un marqueur interrogatif
        $query = 'INSERT INTO `patients` (`firstname`, `lastname`, `birthdate`, `phone`, `mail`) VALUES 
        (:firstname, :lastname, :birthdate, :phone, :mail)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindParam(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $stmt->bindParam(':mail', $this->mail, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function isPatientExist()
    {
        $query = 'SELECT COUNT(*) AS `number` FROM `patients` WHERE `lastname` = :lastname AND `firstname` = :firstname AND `birthdate` = :birthdate';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindParam(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result->number;
    }
    public function getPatientInfo($id): object
    {
        /**
         * Création de la requête SQL
         */
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `id`= :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function isIdTrue($id)
    {
        $query = 'SELECT `id` FROM `patients` WHERE `id`= :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function updatePatient($id) {
        $query = 'UPDATE `patients` SET `firstname` = :updateFirstname, `lastname` = :updateLastname, `birthdate` = :birthdate, `phone` = :updatePhone, `mail` = :updateMail WHERE `id` = :id' ; 
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':updateFirstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindParam(':updateLastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindParam(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $stmt->bindParam(':updatePhone', $this->phone, PDO::PARAM_STR);
        $stmt->bindParam(':updateMail', $this->mail, PDO::PARAM_STR);
        $stmt->execute();
    }

    }

