<?php

namespace helper;
use PDO;

class Admin
{
    private ?int $id;
    private ?string $email;
    private ?string $quality ;
    private static ?Admin $admin=null;


    /**
     * @param int|null $id
     * @param string|null $email
     * @param string|null $quality
     */
    protected function __construct(?string $email, ?string $quality, ?int $id)
    {
        $this->id = $id;
        $this->email = $email;
        $this->quality = $quality;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getQuality(): ?string
    {
        return $this->quality;
    }

    /**
     * @param string|null $quality
     */
    public function setQuality(?string $quality): void
    {
        $this->quality = $quality;
    }


    public function getNav(){

          return  [
                "Darbuotojai"=>"index.php",
               "Pokalbiai"=>"conversations.php",

                ];



    }

    public static function getUser(int $id){
        $pdo=DB::getDB();
        $stm=$pdo->prepare("SELECT * FROM users WHERE id=?");
        $stm->execute([$id]);
        $user=$stm->fetch(PDO::FETCH_ASSOC);
        $use= new Admin($user['email'],$user['quality'],$user['id']);
        foreach ($use as $u => $v){
            echo $v."<br>";
        }
    }
    private static function createAdmin():Admin{
        if($_SESSION['user']['quality']=='superadmin'){
            return new SuperAdmin($_SESSION['user']['email'],$_SESSION['user']['quality'],$_SESSION['user']['id']);
        }else{
            return new Admin($_SESSION['user']['email'],$_SESSION['user']['quality'],$_SESSION['user']['id']);
        }

    }


    public static function login($email,$password):?Admin{
        $pdo=DB::getDB();
        $stm=$pdo->prepare("SELECT * FROM users WHERE email=?");
        $stm->execute([$email]);
        $users=$stm->fetch(PDO::FETCH_ASSOC);
        if ($users==null){
            return null;
        }


                if(password_verify($password,$users['password'])){
                    $_SESSION['user']['email']=$users['email'];
                    $_SESSION['user']['id']=$users['id'];
                    $_SESSION['user']['quality']=$users['quality'];
                  return self::createAdmin();
                }else{
                    return null ;
                }

            }



            public static function register($email,$password,$quality){
                $pdo=DB::getDB();
                $login = $pdo->prepare("SELECT * FROM `users` WHERE email=? "  );
                $login->execute([$email]);
                $duomenys = $login->fetch(PDO::FETCH_ASSOC);




                if($duomenys['email']== $email){

                    echo "<h2 class='alert alert-danger'>".'Negalimas El.Paštas'."</h2>" ;


                }else {
                    if(password_verify($password,$duomenys['password']) ){

                        echo "<h2 class='alert alert-danger'>".'This password already exist. Try again'."</h2>" ;
                    }else {


                        if($_POST['password'] === $_POST['reenterPassword']){
                            $passWord= password_hash($_POST['password'],PASSWORD_DEFAULT);

                            $register = $pdo->prepare("INSERT INTO `users`(email,password,quality ) VALUES (?,?,?)"  );
                            $register->execute([$_POST['email'],$passWord,$_POST['quality']]);
                            header("location: login.php");
                            die();
                        }else{
                            echo "<h1 class='alert alert-danger'>".'Jūsų slaptažodžiai nesutampa'."</h1>";
                        }
                    }
                }
            }

    public static function loginVerify(){
        if(isset($_SESSION['user'])){
         self::$admin=self::createAdmin();
        }else{
          header('location: http://localhost/php-start/crm/login.php');
            die();
        }
    }

    public function __toString(): string
    {
        return $this->email;
    }
    public static function getAdmin():?Admin{
        if (self::$admin==null){
            self::loginVerify();
        }
        return self::$admin;
    }
        public static function isLogin(){

        return isset($_SESSION['user']);
        }
    public static function logout(){
       session_destroy();
       header("location: http://localhost/php-start/crm/login.php");
        die();

    }
}