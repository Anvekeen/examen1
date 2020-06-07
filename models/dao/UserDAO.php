<?php


class UserDAO extends DAO
{
    protected $table;
    protected $properties;
    protected $deleteBehaviour;
    protected $users_typeDAO;

    function __construct()
    {
        $this->table = 'users';
        $this->properties = ['userID', 'usertypeID', 'username', 'password', 'userbuildingID', 'apartment_number', 'session_token', 'session_time'];
        $this->deleteBehaviour = new HardDeleteBehaviour();
        $this->users_typeDAO = new Users_typeDAO();
        parent::__construct();
    }

    function create($data) {
        //$data['vat'] ? $data['vat] : 0  ==> condition ? si oui : si non;
        return new User(
            $data['UserID'],
            $this->users_typeDAO->fetch($data['usertypeID']),
            //$data['usertypeID'],
            $data['username'],
            $data['password'],
            $data['userbuildingID'],
            $data['apartment_number'],
            isset($data['session_token']) ? $data['session_token'] : false,
            isset($data['session_time']) ?  $data['session_time'] : false
        );
    }


    function verify($username, $password) {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE username = ?");
            $statement->execute([$username]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $user = $this->create($result);
            var_dump($user);

            if(password_verify($password, $user->__get('password'))) {
                $this->getRandomToken($user);
                return $user;
            }
            var_dump('failed password verify');
            return false;
        } catch (PDOException $e) {

            print $e->getMessage();
        }
    }

    function getRandomToken($user) {
        $token = bin2hex(random_bytes(8)) . "." . time();
        $user->__set('session_token', $token);
        $user->__set('session_time', date('Y-m-d H:i:s'));
        setcookie('session_token', $token, time()+60*60*24);
        $this->update($user);
    }

    function update($user) {
        try {
            $statement = $this->connection->prepare("UPDATE {$this->table} SET session_token = ?, session_time = ? WHERE userID = ?");
            $statement->execute([$user->__get('session_token'), $user->__get('session_time'), $user->__get('userID')]);
            var_dump('user updated');
            header('location:index.php');
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function fetchByCookie($cookie) {
        if($cookie) {
            try {
                $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE session_token = ?");
                $statement->execute([$cookie]);
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $user = $this->create($result);

                if($user && $user->__get('session_time')) {
                    $cookieDatetime = new DateTime($user->__get('session_time'));
                    $cookieDatetime = $cookieDatetime->getTimestamp();
                    $actualDatetime = new DateTime();
                    $actualDatetime = $actualDatetime->getTimestamp();
                    $expired = 1;
                    if ( $cookieDatetime+$expired >= $actualDatetime ){
                        return $user;
                    } else {
                        var_dump("Cookie périmé");
                    }
                }  else {
                    var_dump("No session time, needs to login first");
                }
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return false;
    }

}