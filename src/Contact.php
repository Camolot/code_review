<?php
class Contact
{
    private $contact;

    function __construct($contact_name)
    {
        $this->contact = $contact_name;
    }

    function setContact($new_contact_name)
    {
        return $this->artist;
    }

    function save()
    {
        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_contacts'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_contacts'] = array();
    }
}
?>
