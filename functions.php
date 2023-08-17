<?php
  require "db.php";

  /**
   * formatPhone
   * Formats a 10 digit phone number
   * @param string $phone
   * @return string
   */
  function formatPhone ($phone) {
    if (strlen($phone) !== 10) {
      return $phone;
    }
    
    $area_code = substr($phone, 0, 3);
    $prefix = substr($phone, 3, 3);
    $line_number = substr($phone, 6, 4);
    return "({$area_code}) {$prefix}-{$line_number}";
  }

  /**
   * sanitize
   * Sanitizes data from a form submission
   * @param array $data
   * @return array
   */
  function sanitize ($data) {
    foreach ($data as $key => $value) {
      if ($key === 'phone') {
        $value = preg_replace('/[^0-9]/', '', $value);
      } 

      $data[$key] = htmlspecialchars(stripslashes(trim($value)));
    }

    return $data;
  }

  /**
   * getContacts
   * Retrieves all contacts from the database
   * @return array
   */
  function getContacts () {
    global $db;

    $sql = "SELECT * FROM contacts";
    $result = $db->query($sql);
    $contacts = $result->fetchAll();

    return $contacts;
  }

  /**
   * searchContacts
   * Retrieves contacts from the database that match the search term
   * @param string $search
   * @return array
   */
  function searchContacts ($search) {
    global $db;
    $sql = "SELECT * FROM contacts WHERE first_name LIKE :search OR last_name LIKE :search";
    $stmt = $db->prepare($sql);
    $stmt->execute([':search' => '%' . $search . '%']);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);   

    return $contacts;
  }

  /**
   * getContact
   * Retrieves a single contact from the database
   * @param int $id
   * @return array
   */
  function getContact ($id) {
    global $db;

    $sql = "SELECT * FROM contacts WHERE id = :id";
    $result = $db->prepare($sql);
    $result->execute([':id' => $id]);
    $contact = $result->fetch();

    return $contact;
  }

  /**
   * validate
   * Validates the data from the form
   * @param array $data
   * @return array $errors
   */
  function validate ($data) {
    $fields = ['first_name', 'last_name', 'email', 'phone', 'birthday'];
    $errors = [];

    foreach ($fields as $field) {
      
      switch ($field) {
        case 'first_name':
          
          // update the conditions to match the requirements
          if (empty($data[$field])) { // first_name cannot be empty
            $errors[$field] = 'First name is required';
          } elseif (!preg_match('/^[a-zA-Z]{1,49}$/', $data[$field])) { // first_name must be less than 50 characters and only contain letters
            $errors[$field] = 'First name must be less than 50 characters and only contain letters';
          }
          
          break;
        case 'last_name':

            // update the conditions to match the requirements
            if (empty($data[$field])) { // last_name cannot be empty
              $errors[$field] = 'Last name is required';
            } else if (!preg_match('/^[a-zA-Z]{1,99}$/', $data[$field])) { // last_name must be less than 100 characters and only contain letters
              $errors[$field] = 'First name must be less than 100 characters and only contain letters';
            } 

            break;
        case 'email':

          // update the conditions to match the requirements
          if (empty($data[$field])) { // email cannot be empty
            $errors[$field] = 'Email is required';
          } else if (!filter_var($data[$field], FILTER_VALIDATE_EMAIL)) { // email must be properly formatted
            $errors[$field] = 'Email is invalid';
          }

          break;
        case 'phone':
          
          // update the conditions to match the requirements
          if (!empty($data[$field]) && !preg_match('/^\d{10}$/', $data[$field])) { // if phone is not empty, it must contain 10 digits
            $errors[$field] = 'Phone number is invalid';
          }
          
          break;
        case 'birthday':

          // update the conditions to match the requirements
          if (!empty($data[$field]) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $data[$field])) { // if birthday is not empty, it must be a valid date
          //if (empty($data[$field])) { // if birthday is not empty, it must be a valid date  
            $errors[$field] = 'Birthday is invalid';
          }
          break;
      }
    }

    return $errors;
  }

  /**
   * createContact
   * Creates a new contact in the database
   * @param array $data
   * @return int
   */
  function createContact ($data) {
    // replace the following with a call to the database returning the new contact id
    global $db;

    $sql = "INSERT INTO contacts (first_name, last_name, email, phone, birthday)
           VALUES (:first_name, :last_name, :email, :phone, :birthday)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
      ':first_name' => $data['first_name'],
      ':last_name' => $data['last_name'],
      ':email' => $data['email'],
      ':phone' => $data['phone'],
      ':birthday' => $data['birthday']
    ]);

    $contact_id = $db->lastInsertId();

    return $contact_id; 
  }

  /**
   * updateContact
   * Updates a contact in the database
   * @param array $data
   * @return bool
   */
  function updateContact ($data) {
    // replace the following with a call to the database
    global $db;

    $sql = "UPDATE contacts SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, birthday = :birthday
            WHERE id = :id";
    $result = $db->prepare($sql);
    $result->execute([
      ':first_name' => $data['first_name'],
      ':last_name' => $data['last_name'],
      ':email' => $data['email'],
      ':phone' => $data['phone'],
      ':birthday' => $data['birthday'],
      ':id' => $data['id']
    ]);
    
    return true;
  }

  /**
   * deleteContact
   * Deletes a contact from the database
   * @param int $id
   * @return bool
   */
  function deleteContact ($id) {
    // replace the following with a call to the database
    global $db;

    $sql = "DELETE FROM contacts WHERE id = :id";
    $result = $db->prepare($sql);
    $result->execute([':id' => $id]);

    return true;
  }